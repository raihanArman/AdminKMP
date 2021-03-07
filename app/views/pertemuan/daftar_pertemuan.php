<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-md-10 mr-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pertemuan</h6>
            </div>
            <div class="col">
                <a href="<?= Url::URL ?>/Pertemuan/insert" class="btn btn-success btn-sm content-">
                    <i class="fas fa-fw fa-plus"></i>Data Pertemuan</a>
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
                    <th>Pertemuan Ke</th>
                    <th>Nama Pertemuan</th>
                    <th>Proker</th>
                    <th>Divisi</th>
                    <th>Tanggal</th>
                    <th class="text-right"></th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data['pertemuan'] as $kajian) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $kajian['pertemuan_ke']; ?></td>
                        <td><?= $kajian['nama_pertemuan']; ?></td>
                        <td><?= $kajian['nama_proker']; ?></td>
                        <td><?= $kajian['nama_divisi']; ?></td>
                        <td><?= $kajian['tanggal']; ?></td>
                        <td class="text-center">
                            <a href="<?= Url::URL ?>/Pertemuan/edit/<?= $kajian['id_pertemuan'] ?>" class="badge badge-success">Ubah</a>
                            <a href="<?= Url::URL ?>/Pertemuan/hapus/<?= $kajian['id_pertemuan'] ?>" class="badge badge-danger" onclick="return confirm('yakin hapus ?')">Hapus</a>
                        </td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>