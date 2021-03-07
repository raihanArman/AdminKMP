<div class="row">
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pertemuan</h6>
            </div>
            <div class="card-body">
                <form action="<?= Url::URL ?>/Pertemuan/input" method="post" enctype="multipart/form-data">
                    <!-- =============== PILIH GAMBAR =================== -->
                    <!-- ==================== Lokasi ================ -->
                    <div class="form-group col-md">
                        <label for="">Pertemuan</label>
                        <select name="id_proker" class="form-control" required>
                            <option value="">Pilih Proker</option>
                            <?php foreach ($data['proker'] as $kategori) : ?>
                                <option value="<?= $kategori['id_proker'] ?>"><?= $kategori['nama_proker'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group col-md">
                        <label for="">Pertemuan Ke</label>
                        <input type="text" name="pertemuan_ke" class="form-control" placeholder="Pertemuan Ke..." required>
                    </div>
                    <div class="form-group col-md">
                        <label for="">Nama Pertemuan</label>
                        <input type="text" name="nama_pertemuan" class="form-control" placeholder="Pertemuan Ke..." required>
                    </div>
                    <div class="form-group col-md">
                        <label for="">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" placeholder="Input tanggal..." required>
                    </div>
                    <!-- ===================== STOK BARANG =============== -->
                    <!-- ================== TOMBOL ======================== -->
                    <div class="form-group col-md">
                        <button type="submit" class="btn btn-primary btn-block">Tambah Pertemuan</button>
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