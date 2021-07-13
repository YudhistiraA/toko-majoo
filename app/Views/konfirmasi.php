<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
    <div class="container">
    <h3>Pembelian Lists</h3>
 <!-- data pengambilan-->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Pembelian</th>
                    <th>Name</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($belanja as $row):?>
                <tr>
                  <td><?= $row->product_name;?></td>
                    <td><?= $row->nama;?></td>
                    <td><?= $row->alamat;?></td>
                    <td><?= $row->telepon;?></td>
                    <td><?= $row->status;?></td>
                     <td>
                        <a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?= $row->id_belanja;?>"data-status="<?= $row->status;?>">Confrim</a>
                        <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->id_belanja;?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
 <!-- end data pengambilan-->
    </div>
     
   
 
    <!-- Modal Edit Product-->
    <form action="/konfirmasi/update" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">confrim</h5>
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
               <h4>confrim pembelian product</h4>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_belanja" class="id_belanja">
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Edit Product-->
 
    <!-- Modal Delete Product-->
    <form action="/konfirmasi/delete" method="post" enctype="multipart/form-data">
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
                <input type="hidden" name="id_belanja" class="productID">
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->
 
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function(){
 
        // get Edit Product
        $('.btn-edit').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const status = $(this).data('status');
            $('.id_belanja').val(id);  
            $('#editModal').modal('show');
        });
 
        // get Delete Product
        $('.btn-delete').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            $('.productID').val(id);
            $('#deleteModal').modal('show');
        });
          
    });
</script>
<?= $this->endSection() ?>
</body>
</html>