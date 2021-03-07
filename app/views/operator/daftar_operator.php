<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-md-10 mr-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Operator</h6>
            </div>
            <div class="col">
                <a href="<?= Url::URL ?>/Operator/insert" class="btn btn-success btn-sm content-">
                    <i class="fas fa-fw fa-plus"></i>Operator</a>
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
                    <th>Username</th>
                    <th>Alamat</th>
                    <th>Telp.</th>
                    <th class="text-right">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data['operator'] as $operator) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $operator['username']; ?></td>
                        <td><?= $operator['alamat']; ?></td>
                        <td><?= $operator['no_telp']; ?></td>
                        
                        <?php if ($operator['status'] == 'Aktif') : ?>
                            <td class="text-right"><a href="<?= Url::URL ?>/Operator/edit/<?= $operator['id_user'] ?>/Aktif" class="btn btn-sm btn-primary" onclick="return confirm('Non Aktifkan <?= $operator['nama'] ?>?');"><?= $operator['status']; ?></a></td>
                        <?php else : ?>
                            <td class="text-right"><a href="<?= Url::URL ?>/Operator/edit/<?= $operator['id_user'] ?>/TidakAktif" class="btn btn-sm btn-danger" onclick="return confirm('Aktifkan <?= $operator['nama'] ?>?');"><?= $operator['status']; ?></a></td>
                        <?php endif; ?>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>