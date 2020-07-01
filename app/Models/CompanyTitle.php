<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyTitle extends Model
{
    protected $table = 'company_titles';

    public function content()
    {
    	return $this->hasMany(CompanyContent::class,'company_title_id');
    }
}
