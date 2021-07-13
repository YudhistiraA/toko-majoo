<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\Product_model;
use App\Models\Belanja_model;
class Belanja extends Controller
{
    // mengambil product
    public function index()
    {
        $model = new Product_model();
        $data['product']  = $model->getProduct()->getResult();
        echo view('belanja', $data);
    }
 

    public function save()
    {
        $model = new Belanja_model();
            $data = array(
                'nama'        => $this->request->getPost('name'),
                'alamat'       => $this->request->getPost('alamat'),
                'telepon'        => $this->request->getPost('telepon'),
                'id_product'        => $this->request->getPost('product_id'),
                'status'        => "belum dikonfirmasi"
               
            ); 
        
        $model->saveBelanja($data);
        return redirect()->to('/belanja');
        }

}