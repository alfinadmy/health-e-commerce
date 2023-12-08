<!-- hero area -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<h1>DETAIL ORDER</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end hero area -->

<div class="product-section mt-150 mb-150">
    <div class="container mt-3">
        <?php $this->load->view('layouts/_alerts') ?>
        <div class="row">

            <div class="col-lg-4 col-sm-12 my-2">
                <img src="<?=$content->image ? base_url("images/product/$content->image") : base_url("images/product/default.jpg") ?>" alt="" class="img-fluid">
            </div>
            <div class="col-lg-8 col-sm-12">
                <h4 class="title-product"><?= $content->product_title ?></h4>
                <h5 class="price-product">IDR <?= number_format($content->price, 0, ',', '.') ?></h5>
                <h5 class="price-product mt-3">Stock : <?= $content->is_available == 1 ? '<span class="badge badge-pill badge-success">Tersedia</span>' : '<span class="badge badge-pill badge-danger">Kosong</span>' ?></h5>
                <div class="mt-3">
                    <form action="<?= base_url('cart/add') ?>" method="POST">
                        <input type="hidden" name="id_product" value="<?= $content->id ?>">
                        <div class="form-group">
                            <label for="">Jumlah</label>
                            <input type="number" name="quantity" size="5" class="form-control" value="1">
                        </div>
                        <div class="form-group">
                            <label for="">Pesan</label>
                            <textarea name="message" id="" cols="30" rows="5" class="form-control" placeholder="(Opsional) Tinggalkan pesan ke penjual"></textarea>
                        </div>
                        <input type="submit"  value="Add to Cart" class="btn btn-xs"></input>
                    </form>
                </div>
            </div>
        </div>
        <div class="card shadow-lg mt-3">
            <div class="card-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item product-info">
                        <h5>Detail Produk</h4>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-detail" role="tabpanel" aria-labelledby="pills-detail-tab">
                        <p><?= $content->description ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>