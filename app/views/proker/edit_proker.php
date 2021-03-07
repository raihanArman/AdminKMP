<div class="row">
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Proker</h6>
            </div>
            <div class="card-body">
                <form action="<?= Url::URL ?>/Proker/update" method="post" enctype="multipart/form-data">
                    <!-- ================ id kajian =================== -->
                    <input type="hidden" name="id_proker" value="<?= $data['proker']['id_proker'] ?>">
                    <!-- =============== PILIH GAMBAR =================== -->
                    <!-- ============= Judul kajian =================== -->
                    <div class="form-group col-md">
                        <label for="">Nama Proker</label>
                        <input type="text" name="nama_proker" class="form-control" placeholder="Nama Proker..." value="<?= $data['proker']['nama_proker'] ?>">
                    </div>
                    <!-- ==================== Lokasi ================ -->
                    <div class="form-group col-md">
                        <label for="">Divisi</label>
                        <select name="id_divisi" class="form-control">
                            <?php foreach ($data['divisi'] as $kategori) : ?>
                                <?php if ($kategori['id_divisi'] == $data['proker']['id_divisi']) : ?>
                                    <option value="<?= $kategori['id_divisi'] ?>" selected><?= $kategori['nama_divisi'] ?></option>
                                    <?php continue; ?>
                                <?php endif; ?>
                                <option value="<?= $kategori['id_divisi'] ?>"><?= $kategori['nama_divisi'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group col-md">
                        <label for="">Bobot</label>
                        <input type="number" name="bobot" placeholder="1 - 100" class="form-control" placeholder="Bobot Proker..." value="<?= $data['proker']['bobot'] ?>" required>
                    </div>
                    
                    <!-- ================== TOMBOL ======================== -->
                    <div class="form-group col-md">
                        <button type="submit" class="btn btn-primary btn-block">Edit Proker</button>
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