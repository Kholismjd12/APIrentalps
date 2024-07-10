<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengembalian extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengembalian';
    protected $primaryKey       = 'id_pengembalian';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\Pengembalian';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_pengembalian',
        'id_sewa',
        'tanggal_pengembalian',
        'keterangan_tepat_waktu',
        'pelunasan_pembayaran',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'id_pengembalian'=>'required',
        'id_sewa'=>'required',
        'tanggal_pengembalian'=>'required',
        'keterangan_tepat_waktu'=>'required',
        'pelunasan_pembayaran'=>'required',
    ];
    protected $validationMessages   = [
        'id_pengembalian'=>[
            'required'=>'Silahkan masukan id konsol',
        ],  
        'id_sewa'=>[
            'required'=>'Silahkan masukan nama',
        ],  
        'tanggal_pengembalian'=>[
            'required'=>'silahkan Masukkan tanggal',
        ],
        'keterangan_tepat_waktu'=>[
            'required'=>'silahkan masukkan keterangan',
        ],
        'pelunasan_pembayaran'=>[
            'required'=>'Masukkan pelunasan',
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
