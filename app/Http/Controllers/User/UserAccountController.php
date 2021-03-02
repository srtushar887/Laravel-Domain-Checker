<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\user_api_account;
use App\Models\user_transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Stripe;
class UserAccountController extends Controller
{
    public function api_accounts()
    {
        return view('user.accounts.apiAccounts');
    }

    public function api_accounts_create()
    {
        return view('user.accounts.apiAccountCreate');
    }


    public function api_accounts_save(Request $request)
    {



        $API_KEY = "e5CYUvugiyZ1_BXr8VKPFsUqu9ZoFR1x8Hv";
        $API_SECRET = "5qcqZfauNQnZ4eyeKmQmq9";


        $url = "https://api.godaddy.com/v1/domains/?statuses=ACTIVE&limit=5";

        $header = array(
            'Authorization: sso-key '.$API_KEY.':'.$API_SECRET.''
        );
        $ch = curl_init();
        $timeout=60;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $result = curl_exec($ch);
        curl_close($ch);
        $domainList = json_decode($result, true);

        return $domainList;

//        $new_acc = new user_api_account();
//        $new_acc->user_id = Auth::user()->id;
//        $new_acc->account_type = $request->account_type;
//        $new_acc->account_name = $request->account_name;
//        $new_acc->user_name = $request->user_name;
//        $new_acc->api_key = $request->api_key;
//        $new_acc->api_secret = $request->api_secret;
//        $new_acc->save();



        return back()->with('success','Account Successfully Added');
    }


    public function user_upgrade_account(){
        return view('user.accounts.upgradeAccount');
    }


    public function user_upgrade_account_payment(Request $request)
    {
        if ($request->pay_type == 1){
            $type = $request->pay_type;
            $amount = $request->amount;
            return redirect(route('user.payment.stripe',['type'=>$type,'amount'=>$amount]));
        }elseif ($request->pay_type == 2){
            $type = $request->pay_type;
            $amount = $request->amount;
            return redirect(route('user.payment.paypal',['type'=>$type,'amount'=>$amount]));
        }
    }

    public function user_payment_stripe($type,$amount)
    {
        $plan_type = $type;
        $t_am = $amount;
        return view('user.payment.stripe',compact('plan_type','t_am'));
    }

    public function user_payment_stripe_save(Request $request)
    {
        $total_am = $request->total_amount;
        $cc = $request->cardNumber;
        $exp = $request->cardExpiry;
        $cvc = $request->cardCVC;


        $exp = $pieces = explode("/", $_POST['cardExpiry']);
        $emo = trim($exp[0]);
        $eyr = trim($exp[1]);
        $cnts = round($total_am,2) * 100;
        Stripe\Stripe::setApiKey('sk_test_Rc3ItpcRMziLqT8XyLO0qesh00RYg0WFJi');
        $token = Stripe\Token::create(array(
            "card" => array(
                "number" => "$cc",
                "exp_month" => $emo,
                "exp_year" => $eyr,
                "cvc" => "$cvc"
            )
        ));

        $data = Stripe\Charge::create ([
            'card' => $token['id'],
            'currency' => 'USD',
            'amount' => $cnts,
            'description' => 'item',
        ]);


        if ($data['status'] == "succeeded"){
            $new_user_trans = new user_transaction();
            $new_user_trans->tran_id = Str::random(10).Auth::user()->id;
            $new_user_trans->user_id = Auth::user()->id;
            $new_user_trans->plan_type = $request->plan_type;
            $new_user_trans->plan_amount = $request->total_amount;
            $new_user_trans->plan_create_date = Carbon::now()->format('Y-m-d');
            $new_user_trans->plan_exp_date = Carbon::now()->addMinutes(1)->format('Y-m-d');
            $new_user_trans->status = 1;
            $new_user_trans->save();

            return back()->with('success','Payment Successfully Completed');
        }else{
            return back()->with('alert','Please try again');
        }







    }


    public function user_payment_paypal($type,$amount)
    {
        $plan_type = $type;
        $t_am = $amount;
        return view('user.payment.paypal',compact('plan_type','t_am'));
    }





}
