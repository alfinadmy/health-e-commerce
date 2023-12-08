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
    
<!-- Slide -->
<div id="owl-demo" class="owl-carousel owl-theme">
    
    <?php foreach($slider as $slide): ?>
        <div class="item"><img src="<?=$slide->image ? base_url("images/slider/$slide->image") : base_url("images/slider/default.jpg") ?>" alt=""></div>
    <?php endforeach ?>

</div>
<!-- End Slide -->

<!-- Product -->
<div class="product-section mt-150 mb-150">
	<div class="container">
       <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">	
                    <h3><span class="orange-text">Our</span> Products</h3>
				</div>
			</div>
       </div>

       <div class="mt-3">
           <h4>Obat</h4>
           <p class="product-description">Kebutuhan obat dan vitamin</p>
           <div class="row text-center mt-3 mb-4">
                <?php foreach($productL as $rowL): ?>
                <div class="col-6 col-lg-3 col-sm-6">
                    <figure class="figure">
                        <div class="figure-img">
                            <img src="<?=$rowL->image ? base_url("images/product/$rowL->image") : base_url("images/product/default.jpg") ?>" class="figure-img img-fluid" alt="">
                        </div>
                        <figcaption class="figure-caption">
                            <h5><?= $rowL->title ?></h5>
                            <p>IDR <?= number_format($rowL->price, 0, ',', '.') ?></p>
                        </figcaption>
                        <br>
                        <a href="<?= base_url("shop/detail/$rowL->slug") ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i>Add to Cart</a>
                    </figure>
                </div>
                <?php endforeach ?>
            </div>
            <h4>Alat</h4>
            <p class="product-description">Alat Kesehatan</p>
            <div class="row text-center mt-3 mb-4">
                <?php foreach($productW as $rowW): ?>
                <div class="col-6 col-lg-3 col-sm-6">
                    <figure class="figure">
                        <div class="figure-img">
                            <img src="<?=$rowW->image ? base_url("images/product/$rowW->image") : base_url("images/product/default.jpg") ?>" class="figure-img img-fluid" alt="">
                        </div>
                        <figcaption class="figure-caption">
                            <h5><?= $rowW->title ?></h5>
                            <p>IDR <?= number_format($rowW->price, 0, ',', '.') ?></p>
                        </figcaption>
                        <br>
                        <a href="<?= base_url("shop/detail/$rowW->slug") ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i>Add to Cart</a>
                    </figure>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>