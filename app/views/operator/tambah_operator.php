<div class="row">
   <div class="col-md-8">
      <div class="card shadow mb-4">
         <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Operator</h6>
         </div>
         <div class="card-body">
            <form action="<?= Url::URL ?>/Operator/input" method="post" enctype="multipart/form-data">
               <!-- =============== PILIH GAMBAR =================== -->
               <div class="form-group col-md">
                  <label for="file">Pilih Foto Profile</label>
                  <br><img src="" id="file-field" width="200">
                  <input type="file" id="file-field" name="gambar" class="form-control" placeholder="pilih gambar" onchange="previewImage(event)">
               </div>
               <!-- ============= Nama =================== -->
               <div class="form-group col-md">
                  <label for="">Nama</label>
                  <input type="text" name="nama" class="form-control" placeholder="Input Nama..." required>
               </div>
               
               <!-- ==================== Password ================ -->
               <div class="form-group col-md">
                  <label for="">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Input Passoword..." required>
               </div>

               <!-- ===================== Alamat =============== -->
               <div class="form-group col-md">
                  <label for="">Alamat</label>
                  <input type="text" name="alamat" class="form-control" placeholder="input nama Alamat..." required>
               </div>

               <!-- ===================== Alamat =============== -->
               <div class="form-group col-md">
                  <label for="">Nomor Telpon</label>
                  <input type="text" maxlength="12" name="telp" class="form-control" placeholder="Input Nomor Telpon..." required>
               </div>


               <!-- ================== TOMBOL ======================== -->
               <div class="form-group col-md">
                  <button type="submit" class="btn btn-primary btn-block">Tambah Operator</button>
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
</script>

<div>

</div>