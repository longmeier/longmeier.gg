<?php
namespace Home\Controller;

use Think\Controller;

class CommonController extends Controller
{

    /**
     * 获取code方法
     */
    public function getcode()
    {
        file_put_contents(dirname(__FILE__) . '/model.log', "获取code方法\n", FILE_APPEND);
        //发送请求参数
        $url = C('code_url');
        $appkey = C('APP_KEY');                                          //网站分配的AppID
        $appsecret = C('APP_Secret');                                    //网站分配的AppSecret
        $call_url = urlencode(C('callback_url'));                        //回调地址、  回调域名必须要设置-->【我的应用】
        list ($usec, $sec) = explode(" ", microtime());
        $date = date('YmdHis', time());
        $date .= sprintf("%03d", $usec * 1000);
        $secret = md5($appkey . $date . $appsecret);
        $str = 'response_type=code&AppID=' . $appkey . '&AppSecret=' . $secret . '&request_time=' . $date . '&callback=' . $call_url;             //获取code
        file_put_contents(dirname(__FILE__) . '/model.log', "code传参信息{" . $url . "}{" . $str . "}\n", FILE_APPEND);
        $msg = $this->do_curl($url, $str, 'get');
        file_put_contents(dirname(__FILE__) . '/model.log', "code回调信息：" . $msg . "\n", FILE_APPEND);
        return $msg;
    }
    public function gettoken($code){
        $appsecret=C('APP_Secret');                                                           //网站的
        $callbcak=urlencode(C('callback_url'));   //自己回调的地址
        $url=C('token_url');                             //获取taken  url
        if($code){
            file_put_contents(dirname( __FILE__ ).'/model.log',"回调信息code：[post]".$code."\n", FILE_APPEND );
            $str="grant_type=authorization_code&code=".md5($code.$appsecret)."&callback=".$callbcak;
            file_put_contents(dirname( __FILE__ ).'/model.log',"token参数信息：".$str."\n", FILE_APPEND );
            $msg=$this->do_curl($url,$str,'get');
            file_put_contents(dirname( __FILE__ ).'/model.log',"token回调信息：".$msg."\n", FILE_APPEND );
        }
    }
    /**
     * @param $url                 请求地址
     * @param $str                 请求参数
     * @param string $method       请求方法
     * @return mixed|string        返回数据
     */
    public function do_curl($url, $str, $method = 'post')
    {

        $ch = curl_init();
        if ($method == 'get') {
            curl_setopt($ch, CURLOPT_URL, $url . '?' . $str);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
        } else {
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // post数据
            curl_setopt($ch, CURLOPT_POST, 1);
            // post的变量
            curl_setopt($ch, CURLOPT_POSTFIELDS, $str);
        }
        $returndata = curl_exec($ch);
        $curl_errno = curl_errno($ch);
        $curl_error = curl_error($ch);
        curl_close($ch);
        if ($curl_errno > 0) {
            //echo "cURL Error ($curl_errno): $curl_error\n";  如果需要可以记录日志
            $returndata = '{"error","timeout"}';
        }
        return $returndata;
    }

}