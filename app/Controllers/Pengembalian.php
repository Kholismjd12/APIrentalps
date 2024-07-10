<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Pengembalian extends ResourceController
{
    protected $modelName = "App\Models\Pengembalian";
    protected $format = "json";

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function show($id = null)
    {
        //
    }


    public function create()
    {
        $data=$this->request->getPost();
        $pengembalian=new \App\Entities\Pengembalian();
        $pengembalian->fill($data);

        if (!$this->validate($this->model->validationRules,$this->model->validationMessages)) {
           return $this->fail($this-> validator->getErrors());
        }

        if ($this->model->save($Pengembalian)) {
            return $this->respondCreated($data, "Berhasil");
        }
    }

    public function update($id = null)
    {
        //
    }

    public function delete($id = null)
    {
        //
    }
}
