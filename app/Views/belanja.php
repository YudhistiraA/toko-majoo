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
      <a class="nav-link" href="/login">Login</a>
      </span>
    </div>
  </div>
</nav>
<!-- end navbar -->
</br>
</br>
</div>
            
    <!-- Tampilkan semua produk -->
    <div class="container">
    <h3>Product</h3>
</br>
        <div class="container">
        <div class="row">
        <?php foreach($product as $row) : ?>
        <div class="col-md-3">
        <div class="thumbnail">
        <img src="<?php echo base_url('./assets/'.$row->gambar);?>" alt="Image" style="max-width: 300%; max-height:300%; height:100px">  
        <div class="caption text-center p-4">
        <h3><strong><?=$row->product_name?></strong></h3>
        <p><strong>Rp. <?=$row->product_price?></strong></p>
        <p><strong><?=$row->product_description?></strong></p>
        </br>
        <p>
        <a href="#" class="btn  btn-sm btn-add" data-id="<?= $row->product_id;?>" data-name="<?= $row->product_name;?>">Beli</a>
        </p>
        </div>
         </div>
         </div>
         <?php endforeach; ?>
        <!-- end looping -->
        <!-- footer -->
        </div>
          </div>
          </div>
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 :
    <a class="text-reset fw-bold" href="/toko">PT Majoo Indonesia</a>
  </div>
<!-- end footer -->
   <!-- Modal beli-->
   <form action="/belanja/save" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Masukan Data</h5>
               
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                </div>
                <div class="form-group">
                    <label>telepon</label>
                    <input type="text" class="form-control" name="telepon"placeholder="telepon">
                </div>

             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="product_id" class="product_id">
                <button type="submit" class="btn btn-primary">Beli</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal beli-->


    <script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function(){
 
        // get  belanja
        $('.btn-add').on('click',function(){
            const id = $(this).data('id');  
            $('.product_id').val(id);
          
            // Call Modal Edit
            $('#addModal').modal('show');
        });
    });
</script>
</body>
</html>