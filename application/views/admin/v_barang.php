<?php $this->load->view('admin/header'); ?>

<h2>Manajemen Data Barang</h2>
<p>Kelola data laporan kehilangan dan penemuan barang di lingkungan Universitas Nurul Jadid.</p>

<button class="btn btn-add"><i class="fas fa-plus"></i> Tambah Laporan Barang</button>

<table class="table-data">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Lokasi</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($barang)): ?>
            <?php $no=1; foreach($barang as $b): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><b><?php echo htmlspecialchars($b->nama_barang); ?></b></td>
                <td><?php echo $b->nama_kategori; ?></td>
                <td><?php echo htmlspecialchars($b->lokasi); ?></td>
                <td><span style="color: <?php echo ($b->status == 'Hilang') ? '#fca5a5':'#10b981'; ?>; font-weight:bold;"><?php echo $b->status; ?></span></td>
                <td>
                    <a href="#" class="btn btn-edit"><i class="fas fa-edit"></i></a>
                    <a href="<?php echo site_url('barang/hapus/'.$b->id); ?>" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" style="text-align:center; color:#9ca3af;">Data barang masih kosong.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php $this->load->view('admin/footer'); ?>