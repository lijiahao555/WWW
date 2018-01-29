<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	 //即点即改
        $(document).on("click",".role_name",function(){
            //让自己隐藏
            $(this).css("display","none");
            //让文本框显示
            $(this).next().css("display","block");
            //给文本框设置焦点
            var role_name = $(this).next().val();//获取到value值
            $(this).next().val("");//先清空
            $(this).next().focus();//获取焦点
            $(this).next().val(role_name);//再把值赋进去，光标会落在文字后面
        })
        //失去焦点，修改角色名称
        $(document).on("blur",".new_role_name",function(){
            var role_id = $(this).attr("role_id");//接收要修改的角色id
            var role_name = $(this).val();//接收要修改的角色名称
            var _this = $(this);

            $.ajax({
                type:"post",
                url:"{:U('Role/changeRoleName')}",
                data:{role_id:role_id,role_name:role_name},
                success:function(msg){
                    _this.val(role_name);//把新值赋给自己
                    _this.css("display","none");//让自己隐藏
                    _this.prev().html(role_name);//让span元素显示新值
                    _this.prev().css("display","block");//让span显示
                }
            })

}
