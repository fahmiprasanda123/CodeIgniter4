<?php namespace App\Database\Seeds;
  
class DataSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data1 = [
            'name'     => 'fahmi',
            'phone'   => '081',
            'address'   => 'depok'
        ];
        $data2 = [
            'name'     => 'prasanda',
            'phone'   => '021',
            'address'   => 'bogor'
        ];
        $this->db->table('data')->insert($data1);
        $this->db->table('data')->insert($data2);
    }
} 