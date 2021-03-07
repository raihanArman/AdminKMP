<div class="card shadow mb-4">
   <div class="card-header py-3">
      <div class="row">
         <div class="col-md-10 mr-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Usulan</h6>
         </div>
      </div>
   </div>
   <div class="card-body">
      <!-- flash message -->
      <div class="row">
         <div class="col-md-12">
            <?= Flasher::flash(); ?>
         </div>
      </div>
      <table class="table table-hover">
         <thead>
            <tr>
               <th>#</th>
               <th>Judul Kajian</th>
               <th>Masjid</th>
               <th>Lokasi</th>
               <th class="text-right">Ubah Status</th>
            </tr>
         </thead>
         <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data['usulan'] as $usulan) : ?>
               <tr>
                  <td><?= $no; ?></td>
                  <td><?= $usulan['judul_kajian']; ?></td>
                  <td><?= $usulan['lokasi']; ?></td>
                  <form action="<?= Url::URL?>/Usulan/update" method="post">
                     <!-- id_kajian -->
                     <input type="hidden" name="id_kajian" value="<?=$usulan['id_kajian']?>">
                     <input type="hidden" name="id_usulan" value="<?=$usulan['id_usulan']?>">
                     <td>
                        <div class="row">
                           <div class="col ">
                              <input type="text" name="lat" class="form-control" placeholder="latitude" required>
                           </div>
                           <div class="col">
                              <input type="text" name="long" class="form-control" placeholder="Longitude" required>
                           </div>
                        </div>
                     </td>
                     <td class="text-center">
                        <button type="submit" class="btn btn-sm btn-danger">Belum Publish</button>
                     </td>
                  </form>
               </tr>
               <?php $no++; ?>
            <?php endforeach; ?>
         </tbody>
      </table>
   </div>
</div>