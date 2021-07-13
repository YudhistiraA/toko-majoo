<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
    <div class="container">
    <h3>Product Lists</h3>
    <button type="button" class="btn btn-success mb-2 btn-ADD" data-toggle="modal" data-target="#">Add New</button>
 
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
             <!-- ambil data-->
            <?php foreach($product as $row):?>
                <tr>
                    <td><?= $row->product_name;?></td>
                    <td><?= $row->product_price;?></td>
                    <td><?= $row->product_description;?></td>
                    <td><img src="<?php echo base_url('./assets/'.$row->gambar);?>" alt="Image" height="100" width="100"></td>
                     <td>
                        <a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?= $row->product_id;?>" data-name="<?= $row->product_name;?>"data-description="<?= $row->product_description;?>"data-price="<?= $row->product_price;?>">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->product_id;?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
  <!--end  ambil data-->
    </div>
     
 
    <!-- Modal Edit Product-->
    <form action="/product/update" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control product_name" name="product_name" placeholder="Product Name">
                </div>
                <div class="form-group">
                    <label>Product price</label>
                    <input type="text" class="form-control product_price" name="product_price" placeholder="Product price">
                </div>
                <div class="form-group">
                    <label>description</label>
                    <input type="text" class="form-control product_description"  rows="4" name="product_description"placeholder="Product description">
                </div>
 
                <div class="form-group">
                    <label>gambar</label>
                    <input type="file" class="form-control" name="file">
                </div>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="product_id" class="product_id">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Edit Product-->
 
    <!-- Modal Delete Product-->
    <form action="/product/delete" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
               <h4>Are you sure want to delete this product?</h4>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="product_id" class="productID">
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->
     <!-- Modal Add Product-->
     <form action="/product/save" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text"  name="product_name"class="form-control" placeholder="Product Name" required>
                </div>
                <div class="form-group">
                    <label>Product price</label>
                    <input type="text" class="form-control" name="product_price" placeholder="Product price">
                </div>
                <div class="form-group">
                    <label>description</label>
                    <input type="text" class="form-control"  rows="4" name="product_description" placeholder="Product description" required>
                    
                </div>
 
                
                <div class="form-group">
                    <label>gambar</label>
                    <input type="file" class="form-control" name="file" require>
                </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" name="product_id" class="product_id">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Add Product-->
 
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function(){
 
        // get Edit Product
        $('.btn-edit').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const name = $(this).data('name');
            const description = $(this).data('description');
            const price = $(this).data('price');
            // Set data to Form Edit
            $('.product_id').val(id);
            $('.product_name').val(name);
            $('.product_description').val(description);
            $('.product_price').val(price);
            // Call Modal Edit
            $('#editModal').modal('show');
        });
 
        // get Delete Product
        $('.btn-delete').on('click',function(){

            const id = $(this).data('id');
            $('.productID').val(id);

            $('#deleteModal').modal('show');
        });
        $('.btn-ADD').on('click',function(){
            // Call Modal add
            $('#addModal').modal('show');
        });
    });
</script>

    <?= $this->endSection() ?>
</body>
</html>