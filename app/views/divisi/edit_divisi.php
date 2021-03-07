<div class="row">
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Divisi</h6>
            </div>
            <div class="card-body">
                <form action="<?= Url::URL ?>/Divisi/update" method="post" enctype="multipart/form-data">
                    <!-- ================ id kajian =================== -->
                    <input type="hidden" name="id_divisi" value="<?= $data['divisi']['id_divisi'] ?>">
                    <div class="form-group col-md">
                        <label for="">Nama Divisi</label>
                        <input type="text" name="nama_divisi" value ="<?=$data['divisi']['nama_divisi']?>" class="form-control" placeholder="Nama Divisi..." required>
                    </div>
                    <!-- ==================== Lokasi ================ -->
                    <div class="form-group col-md">
                        <label for="">Nama Ketua</label>
                        <input type="text" name="nama_ketua" class="form-control" value="<?=$data['divisi']['nama_ketua']?>" placeholder="Nama Ketua..." required>
                    </div>
                    <!-- ==================== kordinat ================ -->
                    <!-- ===================== STOK BARANG =============== -->
                    <div class="form-group col-md">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username..." value="<?=$data['divisi']['username']?>" required>
                    </div>

                    <div class="form-group col-md">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password..." value="<?=$data['divisi']['password']?>" required>
                    </div>
                    <!-- ================== TOMBOL ======================== -->
                    
                    <!-- ================== TOMBOL ======================== -->
                    <div class="form-group col-md">
                        <button type="submit" class="btn btn-primary btn-block">Edit Divisi</button>
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
            var link = '<div class="form-group col-md"><label for="">Link (gunakan format http:// atau https://)</label><input type="url" name="link" class="form-control" placeholder="input link kajian..." value="<?= $data['kajian']['link'] ?>"></div>';
            document.getElementById('link').innerHTML = link;
        } else {
            var link = '<input type="hidden" value="-" name="link">';
            document.getElementById('link').innerHTML = link;
        }
    }
</script>

<div>

</div>