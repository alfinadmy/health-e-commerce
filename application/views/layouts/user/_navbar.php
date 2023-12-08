<!-- header -->
<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="<?= base_url(); ?>">
								<img src="<?= base_url('assets_2/'); ?>img/bbb.png" alt="">
							</a>
						</div>
                        <!-- menu start -->
						<nav class="main-menu">
							<ul>
                                <li>
                                    <form action="<?= base_url('shop/search') ?>" method="POST" class="form-inline">
                                        <div class="input-group input-navbar">
                                            <input type="text" name="keyword" class="form-control" size="40" placeholder="Search for...">
                                            <div class="input-group-append button-navbar">
                                                <button class="btn btn-light" type="submit"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                                <?php if (! $this->session->userdata('is_login')) : ?>
                                    <li><a href="<?= base_url('register') ?>" class="nav-link">Register</a></li>
                                    <li>
                                        <a href="<?= base_url('login') ?>" class="nav-link">Login</a>
                                    </li>
                                <?php else : ?>
                                    <li><a href="#" class="nav-link dropdown-toggle" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('name') ?></a>
                                        <ul class="sub-menu">
                                            <li><a href="<?= base_url('/profile') ?>" class="dropdown-item">Profile</a></li>
                                            <li><a href="<?= base_url("/myorder") ?>" class="dropdown-item">Orders</a></li>
                                            <li><a href="<?= base_url('/logout') ?>" class="dropdown-item">Logout</a></li>
                                        </ul>
                                    </li>
                                <?php endif ?>
                                <li>
                                    <a href="<?= base_url('cart') ?>" class="nav-link"><i class="fas fa-shopping-cart"></i> <span>(<?= getCart() ?> Produk)</span></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>