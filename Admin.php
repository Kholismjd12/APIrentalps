<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Admin extends ResourceController
{
    protected $modelName = 'App\Models\AdminModel';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function create()
    {
        $data = $this->request->getPost();
        log_message('debug', 'Data received: ' . json_encode($data));
    
        if ($data === null) {
            return $this->fail('Invalid JSON data', 400);
        }
    
        $admin = new \App\Entities\Admin();
        $admin->fill($data);
    
        if (!$this->validate($this->model->validationRules, $this->model->validationMessages)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }
    
        $admin->password = password_hash($admin->password, PASSWORD_DEFAULT);
    
        if ($this->model->insert($admin)) {
            return $this->respondCreated($admin, 'Akun berhasil dibuat');
        } else {
            return $this->fail('Gagal membuat akun', 500);
        }
    }
    
    public function show($id = null)
    {
        $data = $this->model->find($id);
        if (!$data) {
            return $this->failNotFound('Data tidak ditemukan');
        }
        return $this->respond($data);
    }

    public function update($id = null)
    {
        $data = $this->request->getJSON();
        
        if (!$data) {
            return $this->fail('Invalid JSON data', 400);
        }
    
        // Validasi data
        if (!$this->validate($this->model->validationRules, $this->model->validationMessages)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }
    
        // Memastikan bahwa $id tidak kosong dan memanggil update model
        $admin = $this->model->find($id);
        if (!$admin) {
            return $this->failNotFound('Data admin tidak ditemukan');
        }
    
        if (!$this->model->update($id, $data)) {
            return $this->fail($this->model->errors());
        }
    
        // Jika berhasil, kirim respons berhasil diupdate
        return $this->respondUpdated($data, 'Data berhasil diupdate');
    }

    public function delete($id = null)
    {
        $data = $this->model->find($id);
        if (!$data) {
            return $this->failNotFound('Data tidak ditemukan');
        }

        $this->model->delete($id);
        return $this->respondDeleted($data, 'Data berhasil dihapus');
    }
}
