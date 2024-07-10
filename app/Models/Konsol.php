<?php

namespace App\Models;

use CodeIgniter\Model;

class Konsol extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'konsol';
    protected $primaryKey       = 'id_konsol';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\Konsol';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_konsol',
        'jenis_konsol',
        'stok',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [  
        'id_konsol'=>'required',
        'Jenis_konsol'=>'required',
        'stok'=>'required',
    ];
    protected $validationMessages   = [
        'id_konsol'=>[
            'required'=>'Silahkan masukan id konsol',
        ],  
        'Jenis_konsol'=>[
            'required'=>'Silahkan masukan nama',
        ],  
        'stok'=>[
            'required'=>'Masukkan stok',
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
