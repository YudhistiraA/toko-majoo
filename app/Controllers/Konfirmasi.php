<?php namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\Product_model;
use App\Models\Belanja_model;
class Konfirmasi extends Controller
{
    // mengambil belanja
    public function index()
    {
        $model = new Belanja_model();
        $data['belanja']  = $model->getKonfirmasi()->getResult();
        echo view('konfirmasi', $data);
    }
 // konfrim belanja
        public function update()
        {
            $model = new Belanja_model();
            $id = $this->request->getPost('id_belanja');
            $data = array(
                'status'        => "confrim"
            );

        $model->updateBelanja($data, $id);
        return redirect()->to('/konfirmasi');
        }
       
        
     //menghapus belanja
        public function delete()
        {
            $model = new Belanja_model();
            $id = $this->request->getPost('id_belanja');
            $model->deleteBelanja($id);
            return redirect()->to('/konfirmasi');
        }
}