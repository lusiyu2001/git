<?php

namespace App\Http\Controllers\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Support\Facades\DB;
use Validator;
use function GuzzleHttp\json_encode;
use App\Common;
class LoginController extends Controller
{
    //登录
    public function login(){
       return view("login/login");
    }
        //登录执行
    public function loginadd(Request $request){
        // echo 111;
        
        $user_tel=$request->user_tel;
        // dd($user_tel);
        $user_pwd=$request->user_pwd;
        // dd($user_pwd);
         //查询账号
         $where=[
             'user_tel'=>$user_tel,
             'user_pwd'=>md5($user_pwd)
         ];
            //  dd($where);
            // dd($where);
         $user=user::where($where)->first();
        if($user){
             $user_id=$user->user_id;
             $user_tel=$user->user_tel;
             session(['user_id'=>$user_id,'user_tel'=>$user_tel]);
             // $user_tel=session('user_tel');
             // dd($user_tel);die;
             return redirect('shopcart');
        }else{
             echo '登录失败';
        }
         
     }
    //注册
    public function register(Request $request){
        // $code=$request->code;
        $ser=$this->sendMobile($mobile=18738202912);
        return view("login/register");
    }
    //注册添加
    public function registeradd(Request $request){
        //验证
        // $validate=$User->validated();
        // dd($validate->errors());
        //注册添加
        // dd($user_pwd);
        $data=$request->all();
        unset($data['_token']);
        $res=user::insert($data);
        if($res){
            return 'ok';
        }else{
            return 'no';
        }
    }
    public function sendMobile($mobile)
    {
        $host = "https://cdcxdxjk.market.alicloudapi.com";
        $path = "/chuangxin/dxjk";
        $method = "POST";
        $appcode = "f140e48c25844f509a579aa37530a91a";
        $headers = array();
        $code=Common::createcode(4);
        session(['mobilecode'=>$code]);
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "content=【创信】你的验证码是：".$code."，3分钟内有效！&mobile=".$mobile;
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        return curl_exec($curl);
    }
}
