<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobContent extends Model
{
    protected $table = 'job_contents';
    protected $fillable = ['id','title','content'];
}
