<div class="container-fluid">

    <!-- Page Heading --> 
    <h1 class="h3 mb-2 text-gray-800">Produk</h1>

    <div class="card shadow my-3">
        <div class="card-body">
            <div class="row my-2">
                <div class="col-md-8 col-sm-12">
                    <a href="<?= base_url('admin/product/create') ?>" class="btn btn-primary">Tambah Produk</a>
                </div>
                <div class="col-md-2 col-sm-12">
                    <?= form_open('admin/product/search', ['method' => 'POST', 'class' => 'form-inline']) ?>
                        <div class="form-group">
                            <input type="text" name="keyword" class="form-control form-control-sm text-center" placeholder="Cari Produk" value="<?= $this->session->userdata('keyword') ?>">
                            <button type="submit" class="btn btn-sm btn-secondary"><i class="fa fa-fw fa-search"></i></button>
                        </div>
                    <?= form_close() ?>
                </div>
            </div>

            <?php $this->load->view('layouts/_alerts') ?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Ketersediaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=0; foreach($content as $row) : $no++ ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td>
                                <p>
                                    <img src="<?=$row->image ? base_url("images/product/$row->image") : base_url("images/product/default.jpg") ?>" alt="" height="100" class="img-responsive">
                                    <?= $row->product_title ?>
                                </p>
                            </td>
                            <td>
                                <span class="badge badge-primary"><i class="fas fa-tags"></i> <?= $row->category_title ?></span>
                            </td>
                            <td>Rp<?= number_format($row->price, 0, ',', '.') ?></td>
                            <td><?= $row->is_available ? '<span class="badge badge-success">Tersedia</span>' : '<span class="badge badge-danger">Kosong</span>' ?></td>
                            <td style="text-align:center">
                                <?= form_open(base_url("admin/product/delete/$row->id"), ['method' => 'POST']) ?>
                                    <?= form_hidden('id', $row->id) ?>
                                    <a href="<?= base_url("admin/product/edit/$row->id") ?>" class="btn btn-sm"><i class="fas fa-fw fa-edit text-info"></i></a>
                                    <button class="btn btn-sm" type="submit" onclick="return confirm('Apakah yakin ingin menghapus?')">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>
                                <?= form_close() ?>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

            <nav arial-label="Page navigation example" class="mt-2">
                <?= $pagination ?>
            </nav>
        </div>
    </div>
</div>