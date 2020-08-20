<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Webinar extends Model
{
    use SoftDeletes, Uuids;

    protected $table = 'webinar';
    protected $casts = ['id' => 'string'];
    protected $guarded = [];
    protected $appends = ['gambar_url'];

    public function getGambarUrlAttribute() {
        if(isset($this->poster)) {
            return url('upload/webinar/' . $this->poster);
        } else {
            return url('images/user.png');
        }
    }
}
