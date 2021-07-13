<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class Product_model extends Model
{
     //ambil data
    public function getProduct()
    {
        $builder = $this->db->table('product');
        $builder->select('*');
        return $builder->get();
    }
 //save data
    public function saveProduct($data){
        $query = $this->db->table('product')->insert($data);
        return $query;
    }
 //edit data
    public function updateProduct($data, $id)
    {
        $query = $this->db->table('product')->update($data, array('product_id' => $id));
        return $query;
    }
 // delete data
    public function deleteProduct($id)
    {
        $query = $this->db->table('product')->delete(array('product_id' => $id));
        return $query;
    } 
    //get berdasar id
    public function getID($id)
    {
         $query = $this->db->table('product')->getWhere(['product_id' => $id]);
         return $query;
    }
    //ger berdasar nama
    public function getName($name)
    {
         $query = $this->db->table('product')->getWhere(['product_name' => $name]);
         return $query;
    }
   
}