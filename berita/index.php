<?php
include('../template/head.php');
?>
<body>
    <div class="container">
        <h2 class="my-4">Kelola Berita</h2>
        <div class="text-right mb-3">
            <button class="btn btn-success" onclick="showAddberitaForm()">Tambah Berita</button>
        </div>
        <table class="table table-striped" id="berita-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul Berita</th>
                    <th>Kategori</th>
                    <th>Konten</th>
                    <th>Gambar</th>
                    <th>Updated At</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <?php 
        // while ($row = mysqli_fetch_assoc($result)) {
        //     echo "<tr>";
        //     echo "<th scope='row'>$id_berita</th>";
        //     echo "<td>{$row['judul']}</td>";
        //     echo "<td>{$row['deskripsi']}</td>";
        //     echo "<td><img src='{$row['gambar']}' alt='{$row['nama']}' style='width: 100px; height: 100px;'></td>";
        //     echo "<td>{$row['updated_at']}</td>";
        //     echo "<td>
        //           <a href='#' class='btn btn-sm btn-primary'>Edit</a>
        //           <a href='#' class='btn btn-sm btn-danger'>Hapus</a>
        //           </td>";
        //     echo "</tr>";
        //     $nomor++;
        // }
        ?>

        <!-- Modal Tambah berita -->
        <div class="modal fade" id="add-berita-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Berita</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form tambah berita -->
                        <form id="form-add-berita">
                            <div class="form-group">
                                <label for="judul">Judul Berita:</label>
                                <input type="text" class="form-control" id="judul" name="judul" required>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori:</label>
                                <input class="form-control" id="kategori" name="kategori" required></input>
                            </div>
                            <div class="form-group">
                                <label for="konten">Konten:</label>
                                <textarea type="text" class="form-control" id="konten" name="konten" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="text" class="form-control" id="gambar" name="gambar" required>
                            </div>
                            
                        </form>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary" onclick="saveberita()">Simpan</button>
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
                    <h5 class="modal-title" id="editModalLabel">Edit berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="editId" name="id_berita">
                        <div class="form-group">
                            <label for="editJudul">Judul Berita</label>
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
        // Memuat data dari server saat halaman dimuat
        $(document).ready(function() {
            fetchData();
        });

        // Memuat data dari server dengan Ajax
        function fetchData() {
            $.ajax({
                url: 'get_berita.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    displayData(data);
                },
                error: function(xhr, status, error) {
                    console.error('Terjadi kesalahan: ' + error);
                }
            });
        }

        // Menampilkan data dalam tabel
        function displayData(data) {
            var table = $('#berita-table tbody');
            table.empty();
            $.each(data, function(index, berita) {
                var row = $('<tr>');
                row.append($('<td>').text(berita.id_berita));
                row.append($('<td>').text(berita.judul));
                row.append($('<td>').text(berita.kategoti));
                row.append($('<td>').text(berita.konten));
                row.append($('<td>').text(berita.url_gambar));
                row.append($('<td>').text(berita.updated_at));
                row.append($('<td>').html('<button class="btn btn-warning" onclick="editberita(' + berita.id_berita + ')">Edit</button> <button class="btn btn-danger" onclick="deleteberita(' + berita.id_berita + ')">Hapus</button>'));
                table.append(row);
            });
        }

        // Mengedit data
        function editberita(id) {
            $.ajax({
                url: 'get_single_berita.php?id=' + id,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#editId').val(data.id_berita);
                    $('#editJudul').val(data.judul);
                    $('#editkategori').val(data.kategori);
                    $('#editkonten').val(data.konten);
                    $('#editurl_gambar').val(data.url_gambar);
                    $('#editModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error('Terjadi kesalahan: ' + error);
                }
            });
        }

        $('#editForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: 'update_berita.php',
                type: 'POST',
                data: $('#editForm').serialize(),
                success: function(response) {
                    $('#editModal').modal('hide');
                    fetchData();
                },
                error: function(xhr, status, error) {
                    console.error('Terjadi kesalahan: ' + error);
                }
            });
        });

        // Menghapus data dengan Ajax
        function deleteberita(id) {
            if (confirm('Anda yakin ingin menghapus berita ini?')) {
                $.ajax({
                    url: 'delete_berita.php?id=' + id,
                    type: 'GET',
                    success: function(response) {
                        // Memuat ulang data setelah penghapusan
                        fetchData();
                    },
                    error: function(xhr, status, error) {
                        console.error('Terjadi kesalahan: ' + error);
                    }
                });
            }
        }
        function showAddberitaForm() {
            $('#add-berita-modal').modal('show');
        }

        function saveberita() {
            // Tangkap nilai input dari formulir tambah berita
            var judul = $('#judul').val();
            var kategori = $('#kategori').val();
            var konten = $('#konten').val();
            var gambar = $('#url_gambar').val();

            // Kirim data ke server menggunakan AJAX
            $.ajax({
                url: 'tambah_berita.php',
                type: 'POST',
                data: {
                    judul: judul,
                    kategori: kategori,
                    konten: konten,
                    gambar: gambar,
                },
                dataType: 'json',
                success: function(response) {
                    // Jika respons dari server adalah sukses
                    if (response.status == 'success') {
                        // Sembunyikan modal tambah berita
                        $('#add-berita-modal').modal('hide');
                        // Tampilkan pesan sukses
                        alert(response.message);
                        // Muat ulang data berita
                        fetchData();
                    } else {
                        // Jika respons dari server adalah error, tampilkan pesan error
                        alert('Error: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    // Jika terjadi kesalahan dalam koneksi, tampilkan pesan error
                    console.error('Terjadi kesalahan: ' + error);
                }
            });
        }

    </script>
</body>

<?php
include('../template/foot.php');
?>
