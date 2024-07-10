<?php

namespace App\Models;

use CodeIgniter\Model;

class Penyewa extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'penyewa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\Penyewa';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_lengkap',
        'alamat',
        'no_telephone',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama_lengkap'=>'required',
        'alamat'=>'required',
        'no_telephone'=>'required',
    ];
    protected $validationMessages   = [
        'nama_lengkap'=>[
            'required'=>'Silahkan masukan nama',
        ],  
        'alamat'=>[
            'required'=>'Silahkan masukan alamat',
        ],
        'no_telephone'=>[
            'required'=>'Silahkan masukan no telephone',
        ],
    ];
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
