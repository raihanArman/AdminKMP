<div class="row">
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kajian</h6>
            </div>
            <div class="card-body">
                <form action="<?= Url::URL ?>/Divisi/input" method="post" enctype="multipart/form-data">
                    <!-- =============== PILIH GAMBAR =================== -->
                    <div class="form-group col-md">
                        <label for="">Nama Divisi</label>
                        <input type="text" name="nama_divisi" class="form-control" placeholder="Nama Divisi..." required>
                    </div>
                    <!-- ==================== Lokasi ================ -->
                    <div class="form-group col-md">
                        <label for="">Nama Ketua</label>
                        <input type="text" name="nama_ketua" class="form-control" placeholder="Nama Ketua..." required>
                    </div>
                    <!-- ==================== kordinat ================ -->
                    <!-- ===================== STOK BARANG =============== -->
                    <div class="form-group col-md">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username..." required>
                    </div>

                    <div class="form-group col-md">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password..." required>
                    </div>
                    <!-- ================== TOMBOL ======================== -->
                    <div class="form-group col-md">
                        <button type="submit" class="btn btn-primary btn-block">Tambah Divisi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        var imageField = document.getElementById("file-field");

        reader.onload = function() {
            if (reader.readyState == 2) {
                imageField.src = reader.result;
            }
        }
        reader.readAsDataURL(event.target.files[0]);
    }



    function getkategori() {
        var kategori = document.getElementById('kategori').value;
        if (kategori == 1) {
            var link = '<div class="form-group col-md"><label for="">Link (gunakan format http:// atau https://)</label><input type="url" name="link" class="form-control" placeholder="input link kajian..."></div>';
            document.getElementById('linking').innerHTML = link;
        } else {
            var link = '<input type="hidden" value="-" name="link">';
            document.getElementById('linking').innerHTML = link;
        }
    }
</script>

<div>

</div>