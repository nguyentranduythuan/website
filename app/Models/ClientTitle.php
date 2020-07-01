<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientTitle extends Model
{
    protected $table = 'client_titles';

    public function content()
    {
    	return $this->hasMany(ClientContent::class,'client_title_id');
    }
}
