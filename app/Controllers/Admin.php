<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Admin extends ResourceController
{
    protected $modelName = 'App\Models\Admin';
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
    public function login()
{
    $data = $this->request->getPost();
    
    if (!$data) {
        return $this->fail('Invalid JSON data', 400);
    }
    
    // Validasi input
    $validationRules = [
        'username' => 'required',
        'password' => 'required'
    ];
    
    if (!$this->validate($validationRules)) {
        return $this->failValidationErrors($this->validator->getErrors());
    }
    
    // Cari user berdasarkan username
    $admin = $this->model->where('username', $data['username'])->first();
    
    if (!$admin) {
        return $this->failNotFound('Username tidak ditemukan');
    }
    
    // Verifikasi password
    if (!password_verify($data['password'], $admin->password)) {
        return $this->fail('Password salah', 401);
    }
    
    // Berikan respons berhasil login
    $response = [
        'message' => 'Login berhasil',
        'user' => $admin
    ];
    
    return $this->respond($response);
}
public function register()
{
    $data = $this->request->getPost();
    
    
    // Validasi input
    $validationRules = [
        'username' => 'required',
        'password' => 'required'
    ];
    
    if (!$this->validate($validationRules)) {
        return $this->failValidationErrors($this->validator->getErrors());
    }
    
    // Hash password
    $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);
    
    // Simpan data pengguna
    $userData = [
        'username' => $data['username'],
        'password' => $hashedPassword,
    ];
    
    $this->model->save($userData);
    
    // Berikan respons berhasil registrasi
    $response = [
        'message' => 'Registrasi berhasil',
        'user' => $userData
    ];
    
    return $this->respondCreated($response);
}

}