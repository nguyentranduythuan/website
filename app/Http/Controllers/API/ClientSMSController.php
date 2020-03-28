<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\APICampaignSMS;
use App\Models\Member;
use App\Models\DataCampaignSMSAPI;

class ClientSMSController extends Controller
{
    public function view_send_sms()
    {

    }

    public function send_sms(Request $request)
    {
    	$result = new \stdClass();
        $result->message_code 	= 1;

    	if (request()->isXml()) {
		    $data = request()->xml();
		    if($data)
		    {
		    	if(isset($data['soap:Body']))
		    	{
		    		if(isset($data['soap:Body']['SendSMS']))
			    	{
			    		$SendSMS 		= $data['soap:Body']['SendSMS'];
			    		$APP_KEY 		= isset($SendSMS['APP_KEY']) ? $SendSMS['APP_KEY'] : "";
			    		$APP_SECRET 	= isset($SendSMS['APP_SECRET']) ? $SendSMS['APP_SECRET'] : "";
			    		$USER_ID 		= isset($SendSMS['USER_ID']) ? $SendSMS['USER_ID'] : "";
			    		$CAMPAIGN_ID 	= isset($SendSMS['CAMPAIGN_ID']) ? $SendSMS['CAMPAIGN_ID'] : "";
			    		$phone 			= isset($SendSMS['Phone']) ? $SendSMS['Phone'] : '';
			    		$Content 		= isset($SendSMS['Content']) ? $SendSMS['Content'] : '';
			    		$Content_Type 	= isset($SendSMS['Content_Type']) ? $SendSMS['Content_Type'] : 0;

			    		if(!empty($APP_KEY) && !empty($APP_SECRET) && !empty($USER_ID) && !empty($CAMPAIGN_ID) && !empty($phone) && !empty($Content))
			    		{
			    			$phone = getPhoneNumber($phone);
			    			if(!empty($phone))
			    			{
				    			$checkAccount = APICampaignSMS::where("member_id", $USER_ID)->where("campaign_id", $CAMPAIGN_ID)->where("app_key", $APP_KEY)->where("app_scret", $APP_SECRET)->first();
				    			if($checkAccount)
				    			{
				    				if($checkAccount->status)
				    				{
				    					$campaign = $checkAccount->getCampaign;
				    					if($campaign && $campaign->is_active)
				    					{
				    						if(strtotime($campaign->start_run) < time() && strtotime($campaign->end_run) > time())
					    					{
					    						if($campaign->amount_used < $campaign->budget_limit)
					    						{
					    							$member = $checkAccount->getMember;



					    							$dt = new DataCampaignSMSAPI;
					    							$dt->member_id          = $member->id;
								                    $dt->campaign_id        = $campaign->id;
								                    $dt->phone              = $phone;
								                    $dt->content_sms        = $Content;

								                    $carrier 				= getCarrier($dt->phone);
								                    $dt->carrier 			= $carrier;
								                    $dt->save();

								                    $callback = "";
								                    $result_send = $this->sendDataToServer($phone, $content, $callback);
					    						}
					    						else
					    						{
					    							$result->message_code 	= 9;
					    						}
					    					}
					    					else
					    					{
					    						$campaign->is_active = 0;
					    						$campaign->save();

					    						$result->message_code 	= 11;
					    					}
				    					}
				    					else
				    					{
				    						$result->message_code 	= 10;
				    					}
				    				}
				    				else
				    				{
				    					$result->message_code 	= 8;
				    				}
				    			}
				    			else
				    			{
				    				$result->message_code 	= 3;
				    			}
				    		}
				    		else
				    		{
				    			$result->message_code 	= 7;
				    		}
			    		}
			    		else
			    		{
			    			$result->message_code 	= 1;
			    		}

 			    	}
		    	}
		    }
		}

		$result->message = getMessagErrorWithCode($result->message_code);

		return response()->json($result);
    }

    private function sendDataToServer($phone, $content, $callback)
    {
    	$client = new \GuzzleHttp\Client();
                    
        $res = $client->request('POST', \Config::get('constants.LINK_SERVER_GSM_SMS_API'), [
            'multipart' => [
                [
                    'name'     => 'username',
                    'contents' => \Config::get('constants.USERNAME_GSM'),
                ],
                [
                    'name'     => 'key',
                    'contents' => \Config::get('constants.KEY_GSM'),
                ],
                [
                    'name'     => 'phone',
                    'contents' => $phone,
                ],
                [
                    'name'     => 'content',
                    'contents' => $content,
                ],
                [
                    'name'     => 'callback',
                    'contents' => $callback,
                ]
            ],
            'http_errors' => false
        ]);

        $result = json_decode($res->getBody()->getContents());
        
        return $result;
    }
}
