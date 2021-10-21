  <h5 class="card-header-title">Detail Karya</h5>
  <table class="table table-borderless mb-0">
    <tr>
      <td width="10%" class="font-weight-bold pl-0">Judul</td>
      <td width="50%" class="text-body">: <?= $berkas->JUDUL;?></td>
      <td width="20%" class="font-weight-bold">Status</td>
      <td width="20%" class="text-body">: <span class="badge badge-<?= $status_nilai == false ? 'danger' : 'success';?>"><?= $status_nilai == false ? 'belum' : 'sudah';?> dinilai</span> </td>
    </tr>
  </table>