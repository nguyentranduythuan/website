<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BenefitTitle extends Model
{
    protected $table = 'benefit_titles';

    public function content()
    {
    	return $this->hasMany(BenefitContent::class,'benefit_title_id');
    }
}
