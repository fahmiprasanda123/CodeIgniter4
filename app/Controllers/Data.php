<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
 
class Data extends ResourceController
{
    protected $format       = 'json';
    protected $modelName    = 'App\Models\Data_model';
 
    public function index(){
        return $this->respond($this->model->findAll(), 200);
    }
    public function show($id = NULL){
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

        public function create(){
        $validation =  \Config\Services::validation();
    
        $name   = $this->request->getPost('name');
        $phone = $this->request->getPost('phone');
        $address = $this->request->getPost('address');
        
        $data = [
            'name' => $name,
            'phone' => $phone,
            'address' => $address
        ];
        
            if($validation->run($data, 'data') == FALSE){
                $response = [
                    'status' => 500,
                    'error' => true,
                    'data' => $validation->getErrors(),
                ];
                return $this->respond($response, 500);
            } else {
                $simpan = $this->model->saveData($data);
                if($simpan){
                    $msg = ['message' => 'Created data successfully'];
                    $response = [
                        'status' => 200,
                        'error' => false,
                        'data' => $msg,
                    ];
                    return $this->respond($response, 200);
            }
        }
    }
       
    public function edit($id = NULL){
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
    public function update($id = NULL){
        $validation =  \Config\Services::validation();
        $name   = $this->request->getRawInput('name');
        $phone = $this->request->getRawInput('phone');
        $address = $this->request->getRawInput('address');
        $data = [
            'name' => $name,
            'phone' => $phone,
            'address' => $address
        ];
        if($validation->run($data, 'data') == FALSE){
            $response = [
                'status' => 500,
                'error' => true,
                'data' => $validation->getErrors(),
            ];
            return $this->respond($response, 500);
        } else {
            $simpan = $this->model->updateData($data,$id);
            if($simpan){
                $msg = ['message' => 'Updated Data successfully'];
                $response = [
                    'status' => 200,
                    'error' => false,
                    'data' => $msg,
                ];
                return $this->respond($response, 200);
            }
        }
    }
    public function delete($id = NULL){
        $hapus = $this->model->deleteData($id);
        if($hapus){
            $msg = ['message' => 'Deleted Data successfully'];
            $response = [
                'status' => 200,
                'error' => false,
                'data' => $msg,
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