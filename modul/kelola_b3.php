<?php
include('../template/head.php');
?>
<body>
    <div class="container">
        <h2 class="my-4">Kelola sampah</h2>
        <div class="text-right mb-3">
            <button class="btn btn-success" onclick="showTambahSampah()">Tambah sampah</button>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Gambar</th>
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
            $query = "SELECT * FROM modul_detail_sampah WHERE id_kategori = 3";
            $result = mysqli_query($koneksi, $query);

            // Membuat nomor urut
            $nomor = 1;

            // Looping untuk menampilkan data dalam tabel
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<th scope='row'>$nomor</th>";
                echo "<td>{$row['nama']}</td>";
                echo "<td>{$row['deskripsi']}</td>";
                echo "<td><img src='{$row['url_gambar']}' alt='{$row['nama']}' style='width: 100px; height: 100px;'></td>";
                echo "<td>{$row['updated_at']}</td>";
                echo "<td>
                    <button class='btn btn-warning' onclick='editModul(" . $row['id_detail_sampah'] . ")'>Edit</button> 
                    <button class='btn btn-danger' onclick='deleteModul(" . $row['id_detail_sampah'] . ")'>Hapus</button>
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
                                <label for="nama">Nama Sampah</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Sampah</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar Sampah</label>
                                <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*" required>
                                <br>
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
                            <label for="editJudul">Judul sampah</label>
                            <input type="text" class="form-control" id="editJudul" name="judul" required>
                        </div>
                        <div class="form-group">
                            <label for="editkategori">Kategori</label>
                            <input type="text" class="form-control" id="editkategori" name="kategori" required>
                        </div>
                        <div class="form-group">
                            <label for="editkonten">Konten</label>
                            <textarea type="text" class="form-control" id="editkonten" name="konten" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="editurl_gambar">Gambar</label>
                            <input type="text" class="form-control" id="editurl_gambar" name="url_gambar" required>
                        </div>
                        <br>
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
        function showTambahSampah() {
            $('#add-sampah-modal').modal('show');
        }

        function editModul() {
            $('#add-sampah-modal').modal('show');
        }

    </script>
</body>

<?php
include('../template/foot.php');
?>
