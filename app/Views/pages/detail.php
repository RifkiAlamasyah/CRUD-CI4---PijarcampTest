<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Produk</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-8 pl-3">
                        <div class="card-body">
                            <h5 class="card-title"><?= $produkDetail['nama_produk']; ?></h5>
                            <p class="card-text"><?= $produkDetail['keterangan']; ?></p>
                            <a href="/produk/edit/<?= $produkDetail['id']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/delete/<?= $produkDetail['id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ?');">Hapus</button>
                            </form>
                            <br><br>
                            <a href="/">Kembali ke daftar produk</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->endSection(); ?>