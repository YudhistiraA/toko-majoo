<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>toko</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    <!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/belanja">Majoo Indonesia</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-12 mb-lg-12">
      <span class="navbar-text">
      <a class="nav-link" href="/product">Produk</a>
      </span>
      <span class="navbar-text">
      <a class="nav-link" href="/konfirmasi">Penjualan</a>
      </span>
      <span class="navbar-text">
      <a class="nav-link" href="login/logout">Logout</a>
      </span>
    </div>
  </div>
</nav>
  <!-- end navbar -->
<?= $this->renderSection('content') ?>

  <!-- footer -->
  </div>
          </div>
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);position:absolute;bottom:0;width:100%">
    © 2021 :
    <a class="text-reset fw-bold" href="/toko">PT Majoo Indonesia</a>
  </div>
<!-- end footer -->
