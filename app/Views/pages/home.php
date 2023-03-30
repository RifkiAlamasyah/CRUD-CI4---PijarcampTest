<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/produk/create" class="btn btn-primary mt-3">Tambah data produk</a>
            <h1 class="mt-2">Daftar Produk</h1>
            <?php if (session()->getFlashdata('error')) : ?>
                <div id="flash-message" class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php elseif (session()->getFlashdata('success')) : ?>
                <div id ="flash-message" class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <!-- Tampilkan hasil pencarian -->

            <form action="<?= base_url('/search') ?>" method="get" class="form-inline my-2 mx-2 d-flex">
                <input class="form-control me-sm-2" type="text" name="keyword" placeholder="Cari Produk" aria-label="Cari Produk" value="<?= $keyword ?? '' ?>">
                <button class="btn btn-outline-success my-2 my-sm-0 p-3" type="submit">Cari</button>
            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Total unit</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($produk as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $p['nama_produk'] ?></td>
                            <td><?= "Rp " . number_format($p['harga'], 0, ',', '.'); ?></td>
                            <td><?= $p['jumlah']; ?></td>
                            <td>
                                <a href="/produk/<?= $p['id']; ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>