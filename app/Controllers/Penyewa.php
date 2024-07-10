<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Penyewa extends ResourceController
{
    protected $modelName = "App\Models\Penyewa";
    protected $format = "json";

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
    
        $penyewa = new \App\Entities\Penyewa();
        $penyewa->fill($data);
    
        if (!$this->validate($this->model->validationRules, $this->model->validationMessages)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }
    
        $penyewa->password = password_hash($penyewa->password, PASSWORD_DEFAULT);
    
        if ($this->model->insert($penyewa)) {
            return $this->respondCreated($penyewa, 'Akun berhasil dibuat');
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
        $penyewa = $this->model->find($id);
        if (!$penyewa) {
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

    public function tambahPenyewa()
{
    $data = $this->request->getPost();
    
    if (!$data) {
        return $this->fail('Invalid JSON data', 400);
    }
    
    // Validasi input
    $validationRules = [
        'nama_lengkap' => 'required',
        'alamat' => 'required',
        'no_telephone' => 'required'
    ];
    
    if (!$this->validate($validationRules)) {
        return $this->failValidationErrors($this->validator->getErrors());
    }
    
    // Simpan data penyewa
    $penyewaData = [
        'nama_lengkap' => $data['nama_lengkap'],
        'alamat' => $data['alamat'],
        'no_telephone' => $data['no_telephone'],
    ];
    
    if ($this->model->insert($penyewaData)) {
        return $this->respondCreated($penyewaData, 'Penyewa berhasil ditambahkan');
    } else {
        return $this->fail('Gagal menambahkan penyewa', 500);
    }
}

}
