
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Users</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_user ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Product</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_product ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cubes fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Order</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_orders ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cart-arrow-down fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>   
<!-- Content Row -->

<div class="row">

    <!-- Menunggu Pembayaran -->
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Menunggu Pembayaran</h6>  
            </div>
            <!-- Card Body -->
            <div class="card-body">
                
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($order_waiting as $row_waiting) : ?>
                                <tr>
                                    <td><a href="<?= base_url("admin/order/detail/$row_waiting->id") ?>" ><strong>#<?= $row_waiting->invoice ?></strong></a></td>
                                    <td><?= str_replace('-', '/', date("d-m-Y", strtotime($row_waiting->date))) ?></td>
                                    <td>Rp<?= number_format($row_waiting->total + $row_waiting->cost_courier, 0, ',', '.') ?>,-</td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- Order Dibayar -->
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Order Dibayar</h6>  
            </div>
            <!-- Card Body -->
            <div class="card-body">
                
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($order_paid as $row_paid) : ?>
                                <tr>
                                    <td><a href="<?= base_url("admin/order/detail/$row_paid->id") ?>" ><strong>#<?= $row_paid->invoice ?></strong></a></td>
                                    <td><?= str_replace('-', '/', date("d-m-Y", strtotime($row_paid->date))) ?></td>
                                    <td>Rp<?= number_format($row_paid->total + $row_paid->cost_courier, 0, ',', '.') ?>,-</td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- Order Diproses -->
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Order Diproses</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($order_process as $row_process) : ?>
                                <tr>
                                    <td><a href="<?= base_url("admin/order/detail/$row_process->id") ?>" ><strong>#<?= $row_process->invoice ?></strong></a></td>
                                    <td><?= str_replace('-', '/', date("d-m-Y", strtotime($row_process->date))) ?></td>
                                    <td>Rp<?= number_format($row_process->total + $row_process->cost_courier, 0, ',', '.') ?>,-</td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Dikirim -->
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Order Dikirim</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($order_delivered as $row_delivered) : ?>
                                <tr>
                                    <td><a href="<?= base_url("admin/order/detail/$row_delivered->id") ?>" ><strong>#<?= $row_delivered->invoice ?></strong></a></td>
                                    <td><?= str_replace('-', '/', date("d-m-Y", strtotime($row_delivered->date))) ?></td>
                                    <td>Rp<?= number_format($row_delivered->total + $row_delivered->cost_courier, 0, ',', '.') ?>,-</td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Dikirim -->
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Order Dibatalkan</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($order_cancel as $row_cancel) : ?>
                                <tr>
                                    <td><a href="<?= base_url("admin/order/detail/$row_cancel->id") ?>" ><strong>#<?= $row_cancel->invoice ?></strong></a></td>
                                    <td><?= str_replace('-', '/', date("d-m-Y", strtotime($row_cancel->date))) ?></td>
                                    <td>Rp<?= number_format($row_cancel->total + $row_process->cost_courier, 0, ',', '.') ?>,-</td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>