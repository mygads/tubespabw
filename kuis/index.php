<?php
include('../template/head.php');
?>
<body>
    <div class="container">
        <h2 class="my-4">Kelola Kuis </h2>
        <div class="text-right mb-3">
            <button class="btn btn-success" onclick="showAddkuisForm()">Tambah Kuis</button>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Kuis</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Pertanyaan</th>
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
            $query = "SELECT * FROM kuis";
            $result = mysqli_query($koneksi, $query);

            // Membuat nomor urut
            $nomor = 1;

            // Looping untuk menampilkan data dalam tabel
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<th scope='row'>$nomor</th>";
                echo "<td>{$row['judul']}</td>";
                echo "<td>{$row['deskripsi']}</td>";
                echo "<td>{$row['updated_at']}</td>";
                echo "<td>
                    <button class='btn btn-primary' onclick='lihatPertanyaan(" . $row['id_kuis'] . ")'>Lihat Pertanyaan</button>
                    </td>";
                echo "<td>
                    <button class='btn btn-warning' onclick='editModul(" . $row['id_kuis'] . ")'>Edit</button> 
                    <button class='btn btn-danger' onclick='deleteModul(" . $row['id_kuis'] . ")'>Hapus</button>
                    </td>";
                echo "</tr>";
                $nomor++;
            }
            

            // Menutup koneksi
            mysqli_close($koneksi);
            ?>
            </tbody>
        </table>

        <!-- Modal Tambah sampah -->
        <div class="modal fade" id="add-sampah-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Sampah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <!-- Form tambah sampah -->
                        <form id="tambahSampahForm">
                            <div class="form-group">
                                <label for="nama">Nama Kuis</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nama">Pertanyaan 1</label>
                                <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Jawaban 1</label>
                                <input type="text" class="form-control" id="jawaban" name="jawaban" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Pertanyaan 2</label>
                                <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Jawaban 2</label>
                                <input type="text" class="form-control" id="jawaban" name="jawaban" required>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" onclick="savesampah()">Simpan</button>
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
                    <h5 class="modal-title" id="editModalLabel">Edit sampah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="editId" name="id_sampah">
                        <div class="form-group">
                                <label for="nama">Nama Kuis</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nama">Pertanyaan 1</label>
                                <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Jawaban 1</label>
                                <input type="text" class="form-control" id="jawaban" name="jawaban" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Pertanyaan 2</label>
                                <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Jawaban 2</label>
                                <input type="text" class="form-control" id="jawaban" name="jawaban" required>
                            </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <!-- Modal untuk melihat pertanyaan kuis -->
        <div class="modal fade" id="pertanyaanModal" tabindex="-1" role="dialog" aria-labelledby="lihatPertanyaanModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lihatPertanyaanModalLabel">Detail Pertanyaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="pertanyaanDetail">
                    <!-- Konten pertanyaan akan dimuat di sini -->
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Pastikan jQuery dimuat di sini -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        function showAddkuisForm() {
            $('#add-sampah-modal').modal('show');
        }

        function editModul() {
            $('#editModal').modal('show');
        }    

        function lihatPertanyaan() {
            $('#pertanyaanModal').modal('show');
        }
    </script>
</body>

<?php
include('../template/foot.php');
?>