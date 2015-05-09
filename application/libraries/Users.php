<!-- 
 * 转发系统
 * www.sanguoer.cn
 * 用户数据
 * @author longmao <6740228268@gmail.com>
 * @2015.05.01
 *-->
<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Users {
	public function return_ci()
	{
	$CI =& get_instance();
	$CI->load->helper('url');
	$CI->load->library('session');
	$CI->config->item('base_url');	
	return $CI;	
}
	//判断用户是否存在
    public function check_user()
    {
    	$this = $this->return_ci();
    	$session_id = $this->session->userdata('session_id');
    	var_dump($session_id);
    	// if(isset($openid)){
    	// 	echo $this->session->userdata('openid');
    	// }else{
    	// 	// $newdata['openid']='龙飞';
    	// 	// $this->session->set_userdata($newdata);
    	// };
    }
}
