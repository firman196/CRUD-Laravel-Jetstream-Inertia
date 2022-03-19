<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepLikes extends Model
{
    use HasFactory;

    protected $table    = 'resep_likes';
    protected $fillable = [
        'resep_makanan_id',
        'user_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function resepMakanan(){
        return $this->belongsTo('App\Models\ResepMakanan', 'resep_makanan_id', 'id');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
