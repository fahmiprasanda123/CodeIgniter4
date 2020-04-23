<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Data_model;


class First extends Controller
{
	public function index()
	{
		$model = new Data_model();
        $data['data'] = $model->getData();
        $data['title'] = "Hello World";
		return view('first_view',$data);
	}
	public function add_new()
    {
		$data['title'] = "Add Data";
        return view('add_data_view', $data);
    }
 
    public function save()
    {
        $model = new Data_model();
        $data = array(
            'name'  => $this->request->getPost('name'),
			'phone' => $this->request->getPost('phone'),
			'address' => $this->request->getPost('address'),
        );
        $model->saveData($data);
        return redirect()->to('/first');
	}
	public function edit($id){
		$data['title'] = "Edit Data";
		$model = new Data_model();
        $data['data'] = $model->getData($id)->getRow();
        return view('edit_data_view', $data);
	}
	public function update()
    {
        $model = new Data_model();
        $id = $this->request->getPost('id');
        $data = array(
            'name'  => $this->request->getPost('name'),
			'phone' => $this->request->getPost('phone'),
			'address' => $this->request->getPost('address'),
        );
        $model->updateData($data, $id);
        return redirect()->to('/first');
	}
	public function delete($id)
    {
        $model = new Data_model();
        $model->deleteData($id);
        return redirect()->to('/first');
	}
}
