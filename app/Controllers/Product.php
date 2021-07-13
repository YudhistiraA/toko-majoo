<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\Product_model;
 
class Product extends Controller
{
    // mengambil product
    public function index()
    {
        $model = new Product_model();
        $data['product']  = $model->getProduct()->getResult();
        echo view('product_view', $data);
    }
 //menyimpan product
    public function save()
    {
        $model = new Product_model();
        $name = $this->request->getPost('product_name');
        $dt   = $model->getName($name)->getRow();
        if($dt !== null){
            print_r('data sudah ada');
        }else{
        $input = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/png]',
                'max_size[file,1024]',
            ]
        ]);
        
        if (!$input) {
            print_r('masukan gambar');
        } else {
            $upload = $this->request->getFile('file');
            $upload->move(WRITEPATH . '../public/assets');
            $data = array(
                'product_name'        => $this->request->getPost('product_name'),
                'product_description'       => $this->request->getPost('product_description'),
                'product_price'        => $this->request->getPost('product_price'),
                'gambar'              => $upload->getName()
            ); 
        
        $model->saveProduct($data);
        return redirect()->to('/product');
        }
}
    }

 //mengedit product
    public function update()
    {
        $model = new Product_model();
        $id = $this->request->getPost('product_id');
        $validation = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/png]',
                'max_size[file,1024]',
            ]
        ]);
    
        if (!$validation) {
        $data = array(
            'product_name'        => $this->request->getPost('product_name'),
            'product_description'       => $this->request->getPost('product_description'),
            'product_price'        => $this->request->getPost('product_price')
        );
    } else {
        $dt = $model->getID($id)->getRow();
        $gambar = $dt->gambar;
        $path = '../public/assets/';
        @unlink($path.$gambar);
        $upload = $this->request->getFile('file');
        $upload->move(WRITEPATH . '../public/assets');
        $data = array(
            'product_name'        => $this->request->getPost('product_name'),
            'product_description'       => $this->request->getPost('product_description'),
            'product_price'        => $this->request->getPost('product_price'),
            'gambar'              => $upload->getName()
        );
        
    }
    $model->updateProduct($data, $id);
    return redirect()->to('/product');
    }
   
    
 //menghapus product
    public function delete()
    {
        $model = new Product_model();
        $id = $this->request->getPost('product_id');
        $dt = $model->getID($id)->getRow();
        $gambar = $dt->gambar;
        $path = '../public/assets/';
        @unlink($path.$gambar);
        $model->deleteProduct($id);
        return redirect()->to('/product');
    }
}