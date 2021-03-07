<div class="row">
    <!-- ===================== DAFTAR GAMBAR SEPATU ===================== -->
    <div class="col-md-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Gambar</h6>
            </div>
            <div class="card-body">
                <img src="<?= Url::URL ?>/img/pamflet/<?= $data['detail']['gambar'] ?>" alt="<?= $data['detail']['gambar'] ?>" width="320">
            </div>
        </div>
    </div>
    <!-- ========================== DETAIL SEPATU =========================== -->
    <div class="col-md-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Kajian</h6>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="font-weight:bold;">Judul Kajian</td>
                            <td class="text-center">:</td>
                            <td class="text-center"> <?= $data['detail']['judul_kajian'] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;">Pemateri</td>
                            <td class="text-center">:</td>
                            <td class="text-center"><?= $data['detail']['pemateri'] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;">Tanggal Kajian</td>
                            <td class="text-center">:</td>
                            <td class="text-center"><?= $data['detail']['tanggal'] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;">Tanggal Upload</td>
                            <td class="text-center">:</td>
                            <td class="text-center"><?= $data['detail']['tanggal_upload'] ?></td>
                        </tr>
                        <?php if ($data['detail']['link'] == '-' || $data['detail']['link'] == '') : ?>
                            <tr>
                                <td style="font-weight:bold;">Link</td>
                                <td class="text-center">:</td>
                                <td class="text-center">
                                    <?= $data['detail']['link'] ?>
                                </td>
                            </tr>
                        <?php else : ?>
                            <tr>
                                <td style="font-weight:bold;">Link</td>
                                <td class="text-center">:</td>

                                <td class="text-center">
                                    <a href="<?= $data['detail']['link'] ?>" target="_blank"><?= $data['detail']['link'] ?></a>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <td style="font-weight:bold;">Lokasi</td>
                            <td class="text-center">:</td>
                            <td class="text-center"><?= $data['detail']['lokasi'] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold;">Status</td>
                            <td class="text-center">:</td>
                            <td class="text-center"><?= $data['detail']['status'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>