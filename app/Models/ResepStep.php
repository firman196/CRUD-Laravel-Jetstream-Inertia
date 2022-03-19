<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepStep extends Model
{
    use HasFactory;

    protected $table    = 'resep_steps';
    protected $fillable = [
        'resep_makanan_id',
        'instruksi',
        'waktu',
        'gambar'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function resepMakanan(){
        return $this->belongsTo('App\Models\ResepMakanan', 'resep_makanan_id', 'id');
    }

}
