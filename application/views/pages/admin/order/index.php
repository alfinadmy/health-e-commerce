<div class="container-fluid">

    <!-- Page Heading --> 
    <h1 class="h3 mb-2 text-gray-800">ORDER</h1>

    <div class="card shadow my-3">
        <div class="card-body">
            <div class="row my-2">
                <div class="col-md-8 col-sm-12">
                    
                </div>
                <div class="col-md-2 col-sm-12">
                    <?= form_open('admin/order/search', ['method' => 'POST', 'class' => 'form-inline']) ?>
                        <div class="form-group">
                            <input type="text" name="keyword" class="form-control form-control-sm text-center" placeholder="Cari Invoice" value="<?= $this->session->userdata('keyword') ?>">
                            <button type="submit" class="btn btn-sm btn-secondary"><i class="fa fa-fw fa-search"></i></button>
                        </div>
                    <?= form_close() ?>
                </div>
            </div>

            <?php $this->load->view('layouts/_alerts') ?>

            <div class="table-responsive">
                <table  class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-dark">
                        <tr>
                            <th style="text-align:center">Nomor</th>
                            <th style="text-align:center">Tanggal</th>
                            <th style="text-align:center">Total</th>
                            <th style="text-align:center">Status</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=0; foreach($content as $row) : $no++ ?>
                        <tr>
                            <td><strong>#<?= $row->invoice ?></strong></td>
                            <td style="text-align:center"><?= str_replace('-', '/', date("d-m-Y", strtotime($row->date))) ?></td>
                            <td>Rp<?= number_format($row->total + $row->cost_courier, 0, ',', '.') ?>,-</td>
                            <td>
                                <?php $this->load->view('layouts/_status', ['status' => $row->status ]);  ?>
                            </td>
                            <td style="text-align:center">
                                <a href="<?= base_url("admin/order/detail/$row->id") ?>" class="btn"><i class="fas fa-fw fa-info-circle text-info"></i></a>
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