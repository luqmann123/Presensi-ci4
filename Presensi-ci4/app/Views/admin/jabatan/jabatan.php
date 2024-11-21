<?= $this->extend('admin/layout.php') ?>

<?= $this->section('content') ?>

<a href="<?= base_url('admin/jabatan/create') ?>" class="btn btn-primary mb-2">
    <i class="lni lni-circle-plus"></i> Tambah Data
</a>


    <table class="table" id="datatables">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        
            <tbody>
                <?php $no = 1; foreach ($jabatan as $jab) : ?>
                
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($jab['jabatan']) ?></td>
                        <td>
                            <a href="<?= base_url('admin/jabatan/edit/' . $jab['id']) ?>" class="badge bg-warning text-decoration-sm mb-2">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="<?= base_url('admin/jabatan/delete/' . $jab['id']) ?>" class="badge bg-danger text-decoration-sm mb-2 tombol-hapus">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>

    </table>


<?= $this->endSection() ?>