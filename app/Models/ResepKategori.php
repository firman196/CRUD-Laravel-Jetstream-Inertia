<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepKategori extends Model
{
    use HasFactory;

    protected $table    = 'resep_kategoris';
    protected $fillable = [
        'nama_kategori'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function resepMakanan(){
        return $this->hasMany('App\Models\ResepMakanan', 'kategori_id', 'id');
    }
}
