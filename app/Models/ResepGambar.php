<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepGambar extends Model
{
    use HasFactory;

    protected $table    = 'resep_gambars';
    protected $fillable = [
        'resep_makanan_id',
        'gambar_makanan'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function resepMakanan(){
        return $this->belongsTo('App\Models\ResepMakanan', 'resep_makanan_id', 'id');
    }

}
