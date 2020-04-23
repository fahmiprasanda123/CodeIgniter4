<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
 
class Data extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\Data_model';
 
    public function index()
    {
        return $this->respond($this->model->findAll(), 200);
    }
    public function show($id = NULL)
    {
        $get = $this->model->getDataAPI($id);
        if($get){
            $response = [
                'status' => 200,
                'error' => false,
                'data' => $get,
            ];
            return $this->respond($response, 200);
        } else {
            $msg = ['message' => 'Not Found'];
            $response = [
                'status' => 404,
                'error' => false,
                'data' => $msg,
            ];
        }
    }
}