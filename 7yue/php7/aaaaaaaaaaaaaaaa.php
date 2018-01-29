<?php
/**
 * @Author: Marte
 * @Date:   2017-10-26 10:50:19
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-10-26 10:55:47
 */
class a
{
    private function mycall($var)
    {
        return 'hello:'.$var;
    }

    function __call($method, $var)
    {
        if($method=='mycall'){
            return $var;
            return $this->$method($var);
            //这里处理$var
            //调用$this->$method($var)
            //处理返回结果并返回
        }else{
            //其他不需要监听的private方法
        }
    }

}
echo "111";
$aobj = new a();
var_dump($aobj->mycall('abc'));