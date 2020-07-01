<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AchievementTitle extends Model
{
    protected $table = 'achievement_titles';

    public function content()
    {
    	return $this->hasMany(AchievementContent::class,'achievement_title_id');
    }
}
