<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artikel extends Model
{
    use SoftDeletes, Uuids;

    protected $table = 'artikel';
    protected $casts = ['id' => 'string'];
    protected $guarded = [];
    protected $with = ['kategori'];
    protected $appends = ['gambar_url'];

    public function kategori() {
        return $this->belongsToMany('App\Models\Kategori', 'artikel_kategori', 'artikel_id', 'kategori_id');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function komentar() {
        return $this->hasMany('App\Models\Komentar');
    }

    public function getGambarUrlAttribute() {
        if(isset($this->gambar)) {
            return url('upload/artikel/' . $this->gambar);
        } else {
            return url('images/user.png');
        }
    }
}
