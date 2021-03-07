<div class="row">
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Proker</h6>
            </div>
            <div class="card-body">
                <form action="<?= Url::URL ?>/Proker/input" method="post" enctype="multipart/form-data">
                    <!-- =============== PILIH GAMBAR =================== -->
                    <div class="form-group col-md">
                        <label for="">Nama Proker</label>
                        <input type="text" name="nama_proker" class="form-control" placeholder="Nama Proker..." required>
                    </div>
                    <!-- ==================== Lokasi ================ -->
                    <div class="form-group col-md">
                        <label for="">Divisi</label>
                        <select name="id_divisi" class="form-control" required>
                            <option value="">Pilih Divisi</option>
                            <?php foreach ($data['divisi'] as $kategori) : ?>
                                <option value="<?= $kategori['id_divisi'] ?>"><?= $kategori['nama_divisi'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md">
                        <label for="">Kepanitian</label><br>
                        <label>
                            <input type="radio" name="panitia" value="ya" required>
                            Ya
                        </label><br>

                        <label>
                            <input type="radio" name="panitia" value="tidak">
                            Tidak
                        </label><br>
                    </div>
                    <div class="form-group col-md">
                        <label for="">Bobot</label>
                        <input type="number" name="bobot" placeholder="1 - 100"  class="form-control" placeholder="Bobot Proker..." required>
                    </div>
                    <!-- ===================== STOK BARANG =============== -->
                    <!-- ================== TOMBOL ======================== -->
                    <div class="form-group col-md">
                        <button type="submit" class="btn btn-primary btn-block">Tambah Proker</button>
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