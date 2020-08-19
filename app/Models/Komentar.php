<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use Uuids;

    protected $table = 'komentar';
    protected $casts = ['id' => 'string'];
    protected $fillable = ['artikel_id', 'komentar', 'nama', 'email', 'website'];

    public function artikel() {
        return $this->belongsTo('App\Models\Artikel');
    }
}
