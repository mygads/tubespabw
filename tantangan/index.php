<?php
include('../template/head.php');
?>
<body>
    <div class="container">
        <h2 class="my-4">Tantangan Saya</h2>
        <div class="text-right mb-3">
            <button class="btn btn-success" onclick="showAddChallengeForm()">Tambah Tantangan</button>
        </div>
        <!-- <table class="table table-striped" id="challenge-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul Tantangan</th>
                    <th>Deskripsi</th>
                    <th>Hadiah</th>
                    <th>Batas Waktu</th>
                    <th>Updated At</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table> -->

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Tantangan</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Hadiah</th>
                    <th scope="col">Detail Misi</th>
                    <th scope="col">Batas Waktu</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // Koneksi ke database
            $koneksi = mysqli_connect("localhost", "root", "", "edutes");

            // Periksa koneksi
            if (mysqli_connect_errno()) {
                echo "Koneksi database gagal: " . mysqli_connect_error();
                exit();
            }

            // Query untuk mengambil data sampah organik
            $query = "SELECT * FROM tantangan";
            $result = mysqli_query($koneksi, $query);

            // Membuat nomor urut
            $nomor = 1;

            // Looping untuk menampilkan data dalam tabel
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<th scope='row'>$nomor</th>";
                echo "<td>{$row['judul']}</td>";
                echo "<td>{$row['deskripsi']}</td>";
                echo "<td>{$row['hadiah']}</td>";
                echo "<td>
                    <button class='btn btn-primary' onclick='lihatMisi(" . $row['id_tantangan'] . ")'>Detail Misi</button>
                    </td>";
                echo "<td>{$row['batas_waktu']}</td>";
                echo "<td>{$row['updated_at']}</td>";
                echo "<td>
                    <button class='btn btn-warning' onclick='editTantangan(" . $row['id_tantangan'] . ")'>Edit</button> 
                    <button class='btn btn-danger' onclick='deleteTantangan(" . $row['id_tantangan'] . ")'>Hapus</button>
                    </td>";
                echo "</tr>";
                $nomor++;
            }
            

            // Menutup koneksi
            mysqli_close($koneksi);
            ?>
        </table>

        <!-- Modal Tambah Tantangan -->
        <div class="modal fade" id="add-challenge-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Tantangan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form tambah tantangan -->
                        <form id="form-add-challenge">
                            <div class="form-group">
                                <label for="judul">Judul Tantangan:</label>
                                <input type="text" class="form-control" id="judul" name="judul" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi:</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="batas_waktu">Batas Waktu:</label>
                                <input type="datetime-local" class="form-control" id="batas_waktu" name="batas_waktu" required>
                            </div>
                            <div class="form-group">
                                <label for="hadiah">Hadiah:</label>
                                <input type="text" class="form-control" id="hadiah" name="hadiah">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" onclick="saveChallenge()">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Tantangan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="editId" name="id_tantangan">
                        <div class="form-group">
                            <label for="editJudul">Judul Tantangan</label>
                            <input type="text" class="form-control" id="editJudul" name="judul">
                        </div>
                        <div class="form-group">
                            <label for="editDeskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="editDeskripsi" name="deskripsi">
                        </div>
                        <div class="form-group">
                            <label for="editHadiah">Hadiah</label>
                            <input type="text" class="form-control" id="editHadiah" name="hadiah">
                        </div>
                        <div class="form-group">
                            <label for="editBatasWaktu">Batas Waktu</label>
                            <input type="date" class="form-control" id="editBatasWaktu" name="batas_waktu">
                            <br>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Pastikan jQuery dimuat di sini -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        // Memuat data dari server saat halaman dimuat
        $(document).ready(function() {
            fetchData();
        });

        function showAddChallengeForm() {
            $('#add-challenge-modal').modal('show');
        }

        function editTantangan() {
            $('#editModal').modal('show');
        }

    </script>
</body>

<?php
include('../template/foot.php');
?>
