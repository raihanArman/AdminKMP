<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
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
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Telp.</th>
                    <th class="text-right">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data['user'] as $user) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $user['nama']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td><?= $user['alamat']; ?></td>
                        <td><?= $user['no_telp']; ?></td>
                        
                        <?php if ($user['status'] == 'Aktif') : ?>
                            <td class="text-right"><a href="<?= Url::URL ?>/User/edit/<?= $user['id_user'] ?>/Aktif" class="btn btn-sm btn-primary" onclick="return confirm('Non Aktifkan <?= $user['nama'] ?>?');"><?= $user['status']; ?></a></td>
                        <?php else : ?>
                            <td class="text-right"><a href="<?= Url::URL ?>/User/edit/<?= $user['id_user'] ?>/TidakAktif" class="btn btn-sm btn-danger" onclick="return confirm('Aktifkan <?= $user['nama'] ?>?');"><?= $user['status']; ?></a></td>
                        <?php endif; ?>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>