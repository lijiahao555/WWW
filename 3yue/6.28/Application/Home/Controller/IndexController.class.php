<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function show(){
    	$this->display('show');
    }

    public function ajax(){
        $page=I('get.p',1);
        // echo $page;
    	$sou=I('get.sou','');
        // echo $sou;die;
    	$size=3;
    	$list=page('goods',$page,$size,"name like '%$sou%'");

        $this->assign('list',$list);
    	$this->assign('page',$page);
    	$this->display('ajax');
    }
    public function chang(){

        $id=I('get.id');
        $ids=trim($id,',');

        $Goods=D('Goods');
        $sql=$Goods->del($ids);
        if ($sql) {
          $this->ajax();
        }
        
    }
    public function stop(){
         $id=I('get.id');
        $ids=trim($ida,',');
        $Goods=D('Goods');
        $sql=$Goods->stop($ids);  
        // var_dump($sql);die; 
        $this->ajax();
    }

}