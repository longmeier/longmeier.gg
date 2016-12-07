<?php
namespace Home\Controller;

use Think\Controller;
use Think\Model;

class ReturndataController extends CommonController
{
    public function index()
    {
        file_put_contents(dirname(__FILE__) . '/model.log', "回调结果\n", FILE_APPEND);
        $posts='';
        $arr=array();$map=array();
        foreach ($_POST as $key=>$val)
        {
            $posts.=$key.':'.$val.', ';
            $arr[$key]=$val;
        }
        file_put_contents(dirname(__FILE__) . '/model.log', "回调restul->【".$posts."】\n", FILE_APPEND);
        if(count($arr)>0){
            $model=new Model();
            $str="update dc_details set state='".$arr['state']."',error_code=' ".$arr['error_code']."' where ordersn='".$arr['ordersn']."'";
            $i=$model->execute($str);
            file_put_contents(dirname(__FILE__) . '/model.log', "更新数据库状态记录->【".$i."】\n", FILE_APPEND);
        }

        $this->display();
    }
}