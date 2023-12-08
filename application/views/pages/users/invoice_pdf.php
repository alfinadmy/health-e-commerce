<!-- pages/users/pdf_example.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Invoice</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <!-- Add any additional CSS styles if needed -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .invoice-header {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }

        .invoice-details {
            margin-top: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table,
        .table th,
        .table td {
            border: 1px solid #dee2e6;
        }

        .table th,
        .table td {
            padding: 10px;
            text-align: left;
        }

        .table th {
            background-color: #007bff;
            color: #fff;
        }

        .invoice-total {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="invoice-header">
            <h1>Order Invoice</h1>
        </div>

        <div class="invoice-details">
            <p><strong>Order Number:</strong> <?= $order->invoice ?></p>
            <p><strong>Date:</strong> <?= date("d-m-Y", strtotime($order->date)) ?></p>
            <!-- Add other details as needed -->
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Message</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($order_detail as $row) : ?>
                        <tr>
                            <td>
                                <p>
                                    <img src="<?= $row->image ? base_url("images/product/$row->image") : base_url("images/product/default.jpg") ?>" alt="" height="50" class="img-responsive"> <br>
                                    <?= $row->title ?>
                                </p>
                            </td>
                            <td>Rp<?= number_format($row->price, 0, ',', '.') ?></td>
                            <td><?= $row->quantity ?></td>
                            <td><?= $row->message ?></td>
                            <td>Rp<?= number_format($row->sub_total, 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">Total</td>
                        <td>Rp<?= number_format(array_sum(array_column($order_detail, 'sub_total')), 0, ',', '.') ?></td>
                    </tr>
                    <!-- Add other totals as needed -->
                </tfoot>
            </table>
        </div>

        <?php if ($order->status == 'waiting') : ?>
            <div class="alert alert-warning" role="alert">
                <strong>Payment Confirmation:</strong> Please confirm your payment by clicking the link provided in your email.
            </div>
        <?php endif ?>

        <div class="invoice-total">
            <p><strong>Shipping Cost:</strong> Rp<?= number_format($order->cost_courier, 0, ',', '.') ?></p>
            <p><strong>Grand Total:</strong> Rp<?= number_format($order->total + $order->cost_courier, 0, ',', '.') ?></p>
        </div>
    </div>
</body>

</html>
