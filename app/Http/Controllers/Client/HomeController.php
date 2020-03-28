<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\Member;
use App\Models\Campaign;
use App\Models\DataTopUpMember;
use App\Models\DataCampaignSMS;
use App\Models\DataCampaignCheckPhone;
use App\Models\DataHistoryMember;

class HomeController extends Controller
{
    public function index()
    {
    	if(!Session::has("client_id"))
        {
            return Redirect::to("/client/login");
        }
        else
        {
            $data = new \stdClass;
            $member             = Member::where("id", Session::get('client_id'))->first();
            $list_all_campaign  = Campaign::where("member_id", Session::get('client_id'))->get();
            $total_campaign     = count($list_all_campaign);
            $campaign_running   = Campaign::where("member_id", Session::get('client_id'))->where("is_active", 1)->count();
            $campaign_stop      = Campaign::where("member_id", Session::get('client_id'))->where("is_active", 0)->count();

            $member->total_campaign         = $total_campaign;
            $member->save();

            $data->tong_tien_nap            = $member->total_money;
            $data->tong_tien_da_dung        = $member->left_money;
            $data->tong_campaign            = $member->total_campaign;
            $data->tong_campaign_running    = $campaign_running;
            $data->tong_campaign_stop       = $campaign_stop;

            $tmp = $this->getDataSMS($list_all_campaign);
            $data->tien_su_dung_sms                 = $tmp->tien_su_dung_sms;
            $data->sms_da_gui                       = $tmp->sms_da_gui;
            $data->sms_dang_cho                     = $tmp->sms_dang_cho;
            $data->sms_gui_khong_thanh_cong         = $tmp->sms_gui_khong_thanh_cong;

            $tmp = $this->getDataCheckPhone($list_all_campaign);
            $data->tien_su_dung_check                 = $tmp->tien_su_dung_check;
            $data->check_da_gui                       = $tmp->check_da_gui;
            $data->check_dang_cho                     = $tmp->check_dang_cho;
            $data->check_gui_khong_thanh_cong         = $tmp->check_gui_khong_thanh_cong;

            return view("clients.index", compact('data'));
        }
    }

    private function getDataSMS($list_all_campaign)
    {
        $data = new \stdClass;
        $data->tien_su_dung_sms         = 0;
        $data->sms_da_gui               = 0;
        $data->sms_dang_cho             = 0;
        $data->sms_gui_khong_thanh_cong = 0;

        foreach ($list_all_campaign as $dt)
        {
            $data->sms_da_gui               += DataCampaignSMS::where("status", 1)->where("campaign_id", $dt->id)->count();
            $data->sms_dang_cho             += DataCampaignSMS::where("status", 0)->where("campaign_id", $dt->id)->count();
            $data->sms_gui_khong_thanh_cong += DataCampaignSMS::where("status", 2)->where("campaign_id", $dt->id)->count();

            $data->tien_su_dung_sms         += ($data->sms_da_gui + $data->sms_gui_khong_thanh_cong) * $dt->price_sms;
        }
        return $data;
    }

    private function getDataCheckPhone($list_all_campaign)
    {
        $data = new \stdClass;
        $data->tien_su_dung_check         = 0;
        $data->check_da_gui               = 0;
        $data->check_dang_cho             = 0;
        $data->check_gui_khong_thanh_cong = 0;

        foreach ($list_all_campaign as $dt)
        {
            $data->check_da_gui               += DataCampaignCheckPhone::whereIn("status", ["OK", "BUSY", "NO ANSWER"])->where("campaign_id", $dt->id)->count();
            $data->check_dang_cho             += DataCampaignCheckPhone::whereNull("status")->where("campaign_id", $dt->id)->count();
            $data->check_gui_khong_thanh_cong += DataCampaignCheckPhone::where("status", "NO CARRIER")->where("campaign_id", $dt->id)->count();

            $data->tien_su_dung_check         += $data->check_da_gui * $dt->price_call + $data->check_gui_khong_thanh_cong * 20;
        }
        return $data;
    }
}
