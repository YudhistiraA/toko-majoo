<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Belanja_model extends Model
{
     //ambil data
    public function getbelanja()
    {
        $builder = $this->db->table('product');
        $builder->select('*');
        return $builder->get();
    }
 //save data
    public function saveBelanja($data){
        $query = $this->db->table('belanja')->insert($data);
        return $query;
    }
    //update
    public function updateBelanja($data, $id)
    {
        $query = $this->db->table('belanja')->update($data, array('id_belanja' => $id));
        return $query;
    }
 // delete data
    public function deleteBelanja($id)
    {
        $query = $this->db->table('belanja')->delete(array('id_belanja' => $id));
        return $query;
    } 
    public function getKonfirmasi()
    {
        $builder = $this->db->table('belanja');
        $builder->select('*');
        $builder->join('product', 'product_id = id_product','left');
        return $builder->get();
    }
}