<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataCampaignSMSAPI extends Model
{
    public function getCampaign()
    {
        return $this->belongsTo('App\Models\Campaign', 'campaign_id');
    }
}
