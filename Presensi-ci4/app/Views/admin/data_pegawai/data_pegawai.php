<?= $this->extend('admin/layout.php') ?>

<?= $this->section('content') ?>

<style>
    .table th {
    background-color:#d6d8db; /* Warna gelap */
}
</style>

<a href="<?= base_url('admin/data_pegawai/create') ?>" class="btn btn-primary mb-2">
    <i class="lni lni-circle-plus"></i> Tambah Data
</a>


    <table class="table table-responsive" id="datatables">
        <thead>
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Lokasi Presensi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        
        <tbody>
            <?php $no = 1; foreach ($pegawai as $peg) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= esc($peg['nip']) ?></td>
                    <td><?= esc($peg['nama']) ?></td>
                    <td><?= esc($peg['jabatan']) ?></td>
                    <td><?= esc($peg['lokasi_presensi']) ?></td>
                    <td>
                        <a href="<?= base_url('admin/data_pegawai/detail/' . $peg['id']) ?>" class="badge bg-success text-decoration-sm mb-2">
                            <i class="fas fa-edit"></i> Detail
                        </a>
                        <a href="<?= base_url('admin/data_pegawai/edit/' . $peg['id']) ?>" class="badge bg-primary text-decoration-sm mb-2">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="<?= base_url('admin/data_pegawai/delete/' . $peg['id']) ?>" class="badge bg-danger text-decoration-sm mb-2 tombol-hapus">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>

    </table>


<?= $this->endSection() ?>