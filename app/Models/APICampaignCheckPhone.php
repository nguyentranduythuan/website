<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class APICampaignCheckPhone extends Model
{
    public function getCampaign()
    {
        return $this->belongsTo('App\Models\Campaign', 'campaign_id');
    }
}
