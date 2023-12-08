<!-- hero area -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<h1>Belanja Sesuai Kategori</h1>
					<div class="hero-btns">
						<a href="<?= base_url('shop/obat') ?>" class="boxed-btn">Obat</a>
						<a href="<?= base_url('shop/alat') ?>" class="bordered-btn">Alat</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end hero area -->

<div class="product-section mt-150 mb-150">
    <div class="container my-3">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">	
                    <h3>ALAT</h3>
                </div>
            </div>
            <div class="col-md-9 col sm-12">
                <div class="row text-center mt-3 mb-4">
                    <?php foreach($content as $row): ?>
                    <div class="col-6 col-lg-3 col-sm-6">
                        <figure class="figure">
                            <div class="figure-img">
                                <img src="<?=$row->image ? base_url("images/product/$row->image") : base_url("images/product/default.jpg") ?>" class="figure-img img-fluid" alt="">
                                <a href="<?= base_url("shop/detail/$row->slug") ?>" class="d-flex justify-content-center">
                                    <img src="<?= base_url() ?>assets/img/detail.png" alt="" class="align-self-center">
                                </a>
                            </div>
                            <figcaption class="figure-caption">
                                <h5><?= $row->title ?></h5>
                                <p>IDR <?= number_format($row->price, 0, ',', '.') ?></p>
                            </figcaption>
                        </figure>
                    </div>
                    <?php endforeach ?>
                </div>

                <nav arial-label="Page navigation example" class="mt-2">
                    <?= $pagination ?>
                </nav>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="card mt-5">
                    <div class="card-header">
                        Kategori
                    </div>
                    <div class="card-body">
                        <?php foreach(getCategories() as $category) : ?>
                            <a href="<?= base_url("/shop/category/$category->slug") ?>" class=""><?= $category->title ?></a>
                            <hr>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>