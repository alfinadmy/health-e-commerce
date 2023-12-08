 <!-- Sidebar -->
<ul class="navbar-nav bg-gradient-light sidebar sidebar-light accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon">
      <img src="<?= base_url('assets/img/nn.png'); ?>" width="200px">
    </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Beranda</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Produk
  </div>

  <li class="nav-item <?= $this->uri->segment(2) == "category" ? 'active' : '' ?>">
    <a class="nav-link" href="<?= base_url('admin/category') ?>">
      <i class="fas fa-fw fa-bars"></i>
      <span>Kategori</span></a>
  </li>

  <li class="nav-item <?= $this->uri->segment(2) == "product" ? 'active' : '' ?>">
    <a class="nav-link" href="<?= base_url('admin/product') ?>">
      <i class="fas fa-fw fa-cubes"></i>
      <span>Produk</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Order
  </div>

  <li class="nav-item <?= $this->uri->segment(2) == "order" ? 'active' : '' ?>">
    <a class="nav-link" href="<?= base_url('admin/order') ?>">
      <i class="fas fa-fw fa-cart-arrow-down"></i>
      <span>Order</span></a>
  </li>

  <hr class="sidebar-divider">

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->