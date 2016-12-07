<?php
namespace Home\Controller;
use Think\Model;
use Think\Controller;

class AskController extends CommonController
{
    //充值
    public function index()
    {
        file_put_contents(dirname(__FILE__) . '/model.log', "充值方法\n", FILE_APPEND);
        $phone = $_POST['txt_phone'];
        $model=M('sys');
        $map=' id=1 and create_time>'.(time()-86400);
        $num=$model->field('value')->where($map)->find();     //取一天之内 token 值
        $x=count($num);
        file_put_contents(dirname(__FILE__) . '/model.log', "token数量[".$x."]\n", FILE_APPEND);
        file_put_contents(dirname(__FILE__) . '/model.log', "token值[".$num['value']."]\n", FILE_APPEND);
        if($x<1){
            file_put_contents(dirname(__FILE__) . '/model.log', "重新获取token\n", FILE_APPEND);
            $msg = parent::getcode();
        }
        file_put_contents(dirname(__FILE__) . '/model.log', "读取数据库\n", FILE_APPEND);
        $string=' id=1 and create_time>'.(time()-86400);
        $list=$model->field('value')->where($string)->find();     //取一天之内 token 值
        $token=trim($list['value']);
        file_put_contents(dirname(__FILE__) . '/model.log', "数据库".$token."\n", FILE_APPEND);
        $secret=C('APP_Secret');
        $action=substr($token,0,16).md5($token.$secret);
        file_put_contents(dirname(__FILE__) . '/model.log', "充值标识【".$action."】\n", FILE_APPEND);
        list ($usec, $sec) = explode(" ", microtime());
        $orderno = date('YmdHis', time());
        $orderno .= sprintf("%03d", $usec * 1000);     //订单号唯一性
        $package='YD01';                              //套餐编码
        $ope=1;                                       //运营商
        $callback=urlencode(C('back_url'));                      //回调地址
        $url=C('plat_oper_url');
        $str="token=".$action."&package_code=".$package."&phonenum=".$phone."&operator=".$ope."&ordersn=".$orderno."&callback=".$callback;
        file_put_contents(dirname(__FILE__) . '/model.log', "充值信息：" .$url.'?'. $str . "\n", FILE_APPEND);
        $inert=" insert into dc_details (ordersn,state,error_code) values('".$orderno."','0','')";
        $order=new Model();
        $i=$order->execute($inert);
        file_put_contents(dirname(__FILE__) . '/model.log', "插入数据库记录[".$i."]\n", FILE_APPEND);
        $oer=parent::do_curl($url,$str,'get');
        file_put_contents(dirname(__FILE__) . '/model.log', "请求info[".$oer."]\n", FILE_APPEND);
        $this->display();
    }
    //充值页面
    public function phone()
    {
        $this->display();
    }

    public function callback()
    {
        $code = $_POST['code'];   //接受code
        file_put_contents(dirname(__FILE__) . '/model.log', "code回调方法【".$code."】\n", FILE_APPEND);
        if ($code) {
            $msg = parent::gettoken($code);
        }
        $token = $_POST['token'];  //接受token;
        if ($token) {
            file_put_contents(dirname(__FILE__) . '/model.log', "回调信息token：[post]" . $token . "\n", FILE_APPEND);
            $mode=new Model();
            $str="update dc_sys set value='".$token."',create_time=".time()." where id=1";
            file_put_contents(dirname(__FILE__) . '/model.log', "存储token：[" . $str. "]\n", FILE_APPEND);
            $i=$mode->execute($str);
            file_put_contents(dirname(__FILE__) . '/model.log', "执行：[" . $i. "]\n", FILE_APPEND);
        }
    }
}