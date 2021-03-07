<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-md-10 mr-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Divisi</h6>
            </div>
            <div class="col">
                <a href="<?= Url::URL ?>/Divisi/insert" class="btn btn-success btn-sm content-">
                    <i class="fas fa-fw fa-plus"></i>Data Divisi</a>
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
                    <th>Nama Divisi</th>
                    <th>Nama Ketua</th>
                    <th>Username</th>
                    <th class="text-right"></th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data['kajian'] as $kajian) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $kajian['nama_divisi']; ?></td>
                        <td><?= $kajian['nama_ketua']; ?></td>
                        <td><?= $kajian['username']; ?></td>
                        <td class="text-center">
                            <a href="<?= Url::URL ?>/Divisi/edit/<?= $kajian['id_divisi'] ?>" class="badge badge-success">Ubah</a>
                            <a href="<?= Url::URL ?>/Divisi/hapus/<?= $kajian['id_divisi'] ?>" class="badge badge-danger" onclick="return confirm('yakin hapus ?')">Hapus</a>
                        </td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>