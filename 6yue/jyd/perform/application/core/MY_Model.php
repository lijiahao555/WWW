<?php

class MY_Model extends CI_Model
{
    public $table_name = null;
    function __construct()
    {
        parent::__construct();
    }
    //获取总条数
    // public function data_num()
    // {
    //     return $this->db->count_all_results($this->table_name);
    // }
     /*字段过滤
     * @param $param array
     * @return $data array
     * */
     public function field_filter($param)
     {
        //获取表中的所有列名
        $fields=$this->db->list_fields($this->table_name);
        foreach ($param as $key => $value)
        {
            if (!in_array($key, $fields))
            {
                unset($param[$key]);
            }
        }
        return $param;
     }
    /*
     * @param 插入数据 array 一条记录数组
     * @return bool 成功返回true
     * */
    public function insert($array)
    {
        return $this->db->insert($this->table_name,$this->field_filter($array));
    }
    /*
     *  替换多个字段，$where=array('主键'=>修改的值); 数组里必须放主键ID
     *  @return int 成功返回true，失败返回false
     *
     * */
    public function update_field($where)
    {
        $this->db->replace($this->table_name,$where);
        return ($this->db->affected_rows()?true:false);
    }

    /*
     * 根据id删除单条记录
     * @param string id
     * @return int 成功返回true，失败返回false
     * */
    public function delete($where)
    {
        $this->db->delete($this->table_name,$where);
        return ($this->db->affected_rows()?true:false);
    }
     /*
     * 根据多个条件获得数据
     */
    public function get_list($wheresql=0,$field='*',$limit=-1,$orderby='')
    {
        if (count($wheresql) == 0 || $wheresql == 0 ) {
            return $this->db->get($this->table_name)->result_array();
        }

        $sql = "SELECT " . $field . " FROM " . $this->table_name . " WHERE ";

        foreach ($wheresql as $key => $val ) {
            if (isset($key) && (0 < strlen($key))) {
                $sql .= $key.'=';
            }

            if (isset($val) && (0 < strlen($val))) {
                $sql .= $this->db->escape($val);
            }
            // if (count($wheresql)>1) {
            //     $sql .= 'and';
            // }
        }
        // $sql = rtrim($sql,'and');

        if ($orderby != "") {
            $sql .= " order by " . $orderby;
        }

        if ($limit != -1) {
            $sql .= " limit " . $limit;
        }

        $query = $this->db->query($sql);
        return $query;
    }


    /*
     * 判断记录是否存在
     * @return bool 存在返回true，不存在返回false，
     */
    public function exists($field,$value)
    {
        $this->db->where($field, $value);
        $this->db->from($this->table_name);
        return $this->db->count_all_results()==0?false:true;
    }

    /*
     * 根据一个条件获得数据
     * @return array 有找到返回结果数组，否则返回空数组
     */
    public function get_where($onewhere)
    {
        if(count($onewhere)==0)
        {
            return array();
        }
        $result = $this->get_list($onewhere);
        return $result;
    }

    /*
     * 获得单条记录单字段
     * @return string
     */
    public function get_field($wheresql,$field='')
    {
        $result=$this->get_list($wheresql,$field,1,'');
        if(count($result)==0)
            return '';

        return $result[0]->$field;
    }

    /**
     * [get_list_page 根据多个条件获得分页数据]
     * @param  [type]  $search    [搜索条件 = array()]
     * @param  string  $field     [查询的字段]
     * @param  integer $pagesize  [每页显示条数]
     * @param  integer $pageindex [当前页]
     * @param  string  $orderby   [排序条件]
     * @param  integer &$count    [description]
     * @return [type]             [$cresult 数据]
     */
    public function get_list_page($search,$field='*',$pagesize=200,$pageindex=1,$orderby='',&$count=0)
    {
        if ($pageindex <= 0) {
            $pageindex = 1;
        }

        if ($pagesize <= 0) {
            $pagesize = 200;
        }

        if (count($search) == 0) {
            return array();
        }

        $sql = "SELECT " . $field . " FROM " . $this->table_name . " WHERE ";
        $wheresql = "";

        foreach ($search as $key => $val ) {
            if (isset($key) && (0 < strlen($key))) {
                $wheresql .= $key.'=';
            }

            if (isset($val) && (0 < strlen($val))) {
                $wheresql .= $this->db->escape($val);
            }

        }

        $sql .= $wheresql;

        if ($orderby != "") {
            $sql .= " order by " . $orderby;
        }

        $sql .= " limit " . (($pageindex - 1) * $pagesize) . "," . $pagesize;
        $query = $this->db->query($sql);
        $result = $query->result();
        $cquery = $this->db->query("SELECT count(0) as counts FROM " . $this->table_name . " WHERE " . $wheresql);
        $cresult = $cquery->result();
        $count = $cresult[0]->counts;
        return $result;
    }
/**
 * [data_list 查询数据]
 * @param  [type] $data [array(where)]
 * @return [type]       [result]
 */
    public function data_list($data=null)
    {
        if(!is_array($data))
        {
            return $this->db->get($this->table_name)->result_array();
        }
        $order = empty($data['order']) ? null : $data['order'][0];

        $type  = empty($data['order']) ? null : $data['order'][1];

        $field = empty($data['in']) ? null : $data['in'][0];

        $scope = empty($data['in']) ? null : $data['in'][1];

        $where = empty($data['where']) ? array() : $data['where'];

        $like  = empty($data['like']) ? array() : $data['like'];

        $page  = empty($data['page']) ? 0 : $data['page'];

        $this->db->order_by($order,$type);

        $this->db->where($where);

        $this->db->where_in($field,$scope);

        $this->db->like($like);

        $this->db->limit($this->config->item('page_size'),$page);

        return $this->db->get($this->table_name)->result_array();
    }

}