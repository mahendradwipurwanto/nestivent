<?php if ($anggota == false) { ?>
    <center>
        <div class="alert alert-soft-danger" role="alert">
            Ketua Tim belum melengkapi formulir anggota.
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Peran</th>
                    <th>Nama</th>
                    <th>E-mail</th>
                    <th>No HP</th>
                    <th>Whatsapp</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Ketua</strong></td>
                    <td><?= $tim->NAMA ?></td>
                    <td><a href="mailto:<?= $tim->EMAIL ?>"><?= $tim->EMAIL ?></a></td>
                    <td>
                        <?= $hp = "+62" . $tim->HP;  ?>
                    </td>
                    <td>
                        <a href="https://api.whatsapp.com/send?phone=<?= $hp ?>&text=Hallo%20<?= $tim->NAMA ?>" target="_blank" class="btn btn-xs btn-success"><i class="tio-whatsapp"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </center>
<?php } else { ?>
    <table class="table">
        <thead>
            <tr>
                <th>Peran</th>
                <th>Nama</th>
                <th>NIDN/NIM</th>
                <th>E-mail</th>
                <th>No HP</th>
                <th>Whatsapp</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($anggota as $row) {
                if ($row->PERAN == 1) {
                    $peran = '<strong>Ketua</strong>';
                } elseif ($row->PERAN == 2) {
                    $peran = '<strong>Dosen Pembimbing</strong>';
                } elseif ($row->PERAN == 3) {
                    $peran = 'Anggota';
                }

                // reaplace first char
                $ptn = "/^0/";
                $str = $row->HP;
                $rpltxt = "+62";
                $hp = preg_replace($ptn, $rpltxt, $str);
            ?>
                <tr>
                    <td><?= $peran ?></td>
                    <td><?= $row->NAMA ?></td>
                    <td><?= ($row->NIM != "") ? $row->NIM : "-" ?></td>
                    <td><a href="mailto:<?= $row->EMAIL ?>"><?= $row->EMAIL ?></a></td>
                    <td>
                        <?= $hp ?>
                    </td>
                    <td>
                        <a href="https://api.whatsapp.com/send?phone=<?= $hp ?>&text=Hallo%20<?= $row->NAMA ?>" target="_blank" id="btn-anggota<?= $no ?>" class="btn btn-xs btn-success"><i class="tio-whatsapp"></i></a>
                    </td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
    </table>
<?php } ?>