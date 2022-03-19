<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepBahan extends Model
{
    use HasFactory;

    protected $table    = 'resep_bahans';
    protected $fillable = [
        'resep_makanan_id',
        'nama_bahan',
        'takaran'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function resepMakanan(){
        return $this->belongsTo('App\Models\ResepMakanan', 'resep_makanan_id', 'id');
    }

}
