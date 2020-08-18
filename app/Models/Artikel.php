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

    public function kategori() {
        return $this->belongsToMany('App\Models\Kategori', 'artikel_kategori', 'artikel_id', 'kategori_id');
    }
}
