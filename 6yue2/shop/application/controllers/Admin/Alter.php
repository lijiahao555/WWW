<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alter extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/Attribute_model','attribute');
	}
	/** 根据商品类型ID查内容 */
	public function alter(){
		$alter_id = $this->input->post('alter');
		$res = $this->attribute->get_sel_many("goods_type_id = '$alter_id'");
		$data = $this->alter_dispose($res);
		// pri($data);die;
		echo json_encode($data);die;
	}
	/** 处理规格 单品数据 */
	public function alter_dispose($res){
		// pri($res);die;
		$tr="<tr>";
		$th="<tr>";
		foreach ($res as $key => $v) {
			$th .= "<th>{$v['attribute_name']}</th>";
			$option = "<td align='center'><select name='alter[0][".$v['attribute_id']."]'>";
			$result = explode("\r\n",$v['attribute_values']);
			foreach ($result as $key => $value) {

				$option .= "<option value='$value'>".$value."</option>";
			}
			$option .= "</select>";
			$tr.=$option;
		}
		$th .= "<th>价格</th><th>库存（SKU）</th><th>操作</th></tr>";
		$tr .= '<td align="center">
	          	<input type="text" name="price[]" placeholder="请输入价格" />
	          </td>
	          <td align="center">
	          	<input type="text" name="sku[]" placeholder="请输入库存" />
	          </td>
	          <td align="center">
	          	<a href="javascript:;"  title="复制"><img src="images/icon_copy.gif" id="copy" width="16" height="16" border="0"></a>
	          	<a href="javascript:;"  title="移除"><img src="images/icon_drop.gif" id="del" border="0" height="16" width="16"></a>
	          </td>
	        </tr>';
		return $th.$tr;
	}
	
}