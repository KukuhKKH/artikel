<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use SoftDeletes, Uuids;

    protected $table = 'kategori';
    protected $casts = ['id' => 'string'];
    protected $guarded = [];

    public function artikel() {
        return $this->belongsToMany('App\Models\Artikel');
    }
}
