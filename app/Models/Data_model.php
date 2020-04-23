<?php namespace App\Models;
use CodeIgniter\Model;
 
class Data_model extends Model
{
    protected $table = 'data';
     
    public function getData($id = false)
    {
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['id' => $id]);
        }   
    }
    public function getDataAPI($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id])->getRowArray();
        }  
    }
    public function saveData($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
    public function updateData($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }
    public function deleteData($id)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id));
        return $query;
    }
}