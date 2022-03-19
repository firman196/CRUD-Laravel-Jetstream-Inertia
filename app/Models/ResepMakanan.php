<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepMakanan extends Model
{
    use HasFactory;

    protected $table    = 'resep_makanans';
    protected $fillable = [
        'nama_resep',
        'kategori_id',
        'deskripsi',
        'user_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function resepGambar(){
        return $this->hasMany('App\Models\ResepGambar', 'resep_makanan_id', 'id');
    }


     /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function resepLikes(){
        return $this->hasMany('App\Models\ResepLikes', 'resep_makanan_id', 'id');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
