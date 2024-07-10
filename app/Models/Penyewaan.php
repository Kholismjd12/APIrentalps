<?php

namespace App\Models;

use CodeIgniter\Model;

class Penyewaan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'penyewaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\Penyewaan';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tanggal_sewa',
        'tanggal_kembali',
        'total_harga',
        'pembayaran_awal',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'tanggal_sewa'=>'required',
        'tanggal_kembali'=>'required',
        'total_harga'=>'required',
        'pembayaran_awal'=>'required',
    ];
    protected $validationMessages   = [ 
        'tanggal_sewa'=>[
            'required'=>'Silahkan masukan tanggal sewa',
        ],
        'tanggal_kembali'=>[
            'required'=>'Silahkan masukan tanggal kembali',
        ],
        'total_harga'=>[
            'required'=>'Silahkan masukan total harga',
        ],
        'pembayaran_awal'=>[
            'required'=>'Silahkan pembayaran awal',
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
