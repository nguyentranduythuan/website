<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class APICampaignSMS extends Model
{
    public function getCampaign()
    {
        return $this->belongsTo('App\Models\Campaign', 'campaign_id');
    }

    public function getMember()
    {
        return $this->belongsTo('App\Models\Member', 'member_id');
    }
}
