<?php

namespace App\Models;

use CodeIgniter\Model;

class Penyewa extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'penyewas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
use App\Models\PenyewaModel;

class PenyewaController extends \CodeIgniter\Controller
{
    public function index()
    {
        $model = new PenyewaModel();
        $data['penyewas'] = $model->findAll();

        return view('penyewa/index', $data);
    }

    public function create()
    {
        $model = new PenyewaModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telephone' => $this->request->getPost('no_telephone'),
        ];

        if (!$model->save($data)) {
            // Handle validation errors
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/penyewa');
    }
}
