<?php
class Admin extends CI_Controller {
 function __construct()
 {
  parent::__construct();
  $this->load->helper('url');
  $this->load->library('someclass');
  $this->load->library('session');
  $this->load->model('manage_model');
  $this->load->model('m_enpei');
  $this->load->library('email');

 }

 public function index()
 {
  	$this->someclass->some_function();
 }
 //登录首页
 public function login(){
 	$this->load->view('login');
 }
//添加登陆账号、密码session
 public function make_session($name,$pass){
 	$newdata = array('share_name' => $name,'share_pass' => $pass );
	$this->session->set_userdata($newdata);
 }
 //删除登陆账号、密码session
 public function del_session(){
 	$this->session->unset_userdata('share_name');
 	$this->session->unset_userdata('share_pass');
  $this->login();

 }
 //判断登陆账号、密码session是否存在以及是否与数据库一致
 public function get_session(){
 	$session_name = $this->session->userdata('share_name');
 	$session_pass = $this->session->userdata('share_pass');
 	$return = $this->manage_model->login_admin($session_name,$session_pass);
 	if ($session_name&&$session_pass&&$return) {
 		$data = 1;
 		return $data;
 	}else{
 		$data = 0;
 		return $data;
 	}
 }
//管理员登录检测
 public function login_admin(){
 	$name = strip_tags(trim($this->input->post('name_input')));
 	$pass = md5(strip_tags(trim($this->input->post('password_input'))));
 	$return = $this->manage_model->login_admin($name,$pass);
 	if ($return) {
 		$this->make_session($name,$pass);
 		echo json_encode($name);
 	}else{
 		$flag= 0;
 		echo json_encode($flag);
 	}
 }
 //加载后台首页
 public function admin_main(){
 	$flag = $this->get_session();
 	if ($flag>0) {
 		$this->load->view('admin');
 	}else{
 		$this->load->view('login');
 	}
 }
//加载后台统计页面
 public function admin_tongji(){
 	$flag = $this->get_session();
 	if ($flag>0) {
 		$this->load->view('tongji');
 	}else{
 		$this->load->view('login');
 	}
 }
//加载后台基本设置
 public function admin_basic_set(){
 	$flag = $this->get_session();
 	if ($flag>0) {
 		$this->load->view('basic_set');
 	}else{
 		$this->load->view('login');
 	}
 }
 //加载后台管理员管理页面
 public function admin_manager_set(){
 	$flag = $this->get_session();
 	if ($flag>0) {
 		$this->load->view('manager_set');
 	}else{
 		$this->load->view('login');
 	}
 }
 
 //用户管理页面
 public function admin_user_mana(){
 	$flag = $this->get_session();
 	if ($flag>0) {
 		$this->load->view('user_mana');
 	}else{
 		$this->load->view('login');
 	}
 }
 //申请提现页面
 /****
  $thispage :当前页

 **/
 public function applay_cash($thispage){
  $flag = $this->get_session();
  if ($flag>0) {
    $words=-1;
  if (isset($_GET['words'])) {
    $words=$_GET['words'];
  }
    $data['applay_info']=$this->manage_model->get_applay_info($thispage,$words);
    $data['total_item'] = $this->manage_model->get_total_item($words,0);
    $data['thispage'] = $thispage;
    $data['words'] = $words;
    $this->load->view('admin_cash_applay',$data);
  }else{
    $this->load->view('login');
  }
 }
 //文章列表页面
  /****
  $thispage :当前页

 **/
 public function admin_admin_article($thispage){
 	$flag = $this->get_session();
 	if ($flag>0) {
    $words=-1;
    if (isset($_GET['words'])) {
      $words=$_GET['words'];
    }
 		$data['article'] = $this->manage_model->all_article($thispage,$words);
    $data['total_item'] = $this->manage_model->get_total_article($words);
    $data['thispage'] = $thispage;
    $data['words'] = $words;
 		$this->load->view('admin_article',$data);
 	}else{
 		$this->load->view('login');
 	}
 }
//编辑文章页面
 /****
  $arid ：文章id

 **/
 public function text_edit($arid){
 	$flag = $this->get_session();
 	if (!isset($arid)) {
 		$arid=0;
 	}

 	if ($flag>0) {
 		if ($arid==0) {
 			$data['style']=0;
 			$data['article']="请输入要添加的内容";
 			$this->load->view('edit/index',$data);
 		}else{
 			$data['style']=$arid;
			$data['article']=$this->manage_model->get_article($arid);
      $data['limit']=$this->m_enpei->get_share_article_attr($arid);
 			$this->load->view('edit/index',$data);
 		}   
 		 
 	}else{
 		$this->load->view('login');
 	}
   
 }
 //增加文章页面
 public function add_article(){
 	$title = strip_tags(trim($this->input->post('title')));
 	$remark = strip_tags(trim($this->input->post('remark')));
 	$article = $this->input->post('article');
 	$style = $this->input->post('style');
  $src_logo = $this->input->post('src_logo');
  $author_id = $this->input->post('author_id');
  $one_limit = $this->input->post('one_limit');
  $total_limit = $this->input->post('total_limit');
 	$article_array = array('ar_title' =>$title ,'ar_content' =>$article,'ar_remark'=>$remark,'ar_author' =>$author_id,'ar_author_pic' =>$src_logo);
  $return = false;
 	if ($style>0) {
    $this->m_enpei->update_article_limit($style,$total_limit,$one_limit);

 		$return = $this->manage_model->up_article($style,$article_array);

 	}else{

 		$return = $this->manage_model->add_article($article_array);
    if ($return) {
      $this->m_enpei->insert_share_article_attr($return, $total_limit, $one_limit);
    }
 	}
  if ($return) {
    echo json_encode($title);
  }
 }
 //可视化添加文章内容
 public function visual_add_article(){
  $title = $this->input->post('title');
  $content = $this->input->post('content');
  $author = $this->input->post('author');
  $pic = $this->input->post('pic');
  $article_array = array('ar_title' =>$title ,'ar_content' =>$content,'ar_author'=>$author,'ar_author_pic'=>$pic);

    $return = $this->manage_model->visual_add_article($article_array);
  
  if ($return) {
    echo json_encode($title);
  }
 }

 //增加文章页面分页测试
 public function add_article_palge_test(){
  $title = 1;
  $remark = 1;
  $article = 1;
  $article_array = array('ar_title' =>$title ,'ar_content' =>$article,'ar_remark'=>$remark);
  for ($i=0; $i < 100; $i++) { 
    $return = $this->manage_model->add_article($article_array);
  }
  
  
 }

//删除文章操作
 public function dele_article(){
 	$id = $this->input->post('id');
  $this->m_enpei->delete_article_attr($id);  
 	$return = $this->manage_model->dele_article($id);
 	if ($return) {
 		echo json_encode($id);   
 	}
 }
//调用文章接口
 /****
  $id:文章id
  返回值为 $article 数组
  数组字段：
          文章id:ar_id;文章标题：ar_title;文章内容：ar_content；文章备注：ar_remark；文章作者：ar_author；作者头像：ar_author_pic；文章添加时间：time；
 **/
 public function find_article($id=1){
 	$article = $this->manage_model->find_article($id);
 	var_dump($article);
 }

//提现成功页面
  /****
  $thispage:当前页

 **/
public function ok_cash($thispage){
  $flag = $this->get_session();
  if ($flag>0) {
    $words=-1;
  if (isset($_GET['words'])) {
    $words=$_GET['words'];
  }
    $data['applay_info']=$this->manage_model->get_applay_ok($thispage,$words);
    $data['total_item'] = $this->manage_model->get_total_item($words,1);
    $data['thispage'] = $thispage;
    $data['words'] = $words;
    $this->load->view('admin_cash_ok',$data);  
  }else{
    $this->load->view('login');
  }
 }
 /****
  站内信通知
  $uid:用户u_id
  $cash：提现金额
 ******/
  public function web_cash_inform($uid,$cash){
    $data = array('u_id' => $uid, 'cash' => $cash);
    $return = $this->manage_model->web_cash_inform($data);
    // var_dump($return);
  }
  /****
  获取用户站内信所用信息
  $uid:用户u_id
  返回数组
  数组中style：0代表未阅读，1代表已经阅读
 ******/
  public function get_web_cash_inform($uid){
    $return = $this->manage_model->get_web_cash_inform($uid);
    var_dump($return);
  }
  /***
    更新用户站内信状态（已查看）
  **/
  public function up_web_cash_style($id){
    $return = $this->manage_model->up_web_cash_style($id);
    var_dump($return);
  }
  /***
    二维码在线生成
  ***/
  public function two_dimension($content){
    $api = 'http://qr.liantu.com/api.php?text=';
    $img = $api.$content;
    echo '<img src='.$img.'/>';
  }

 //通知用户提现完成
 public function tell_user_ok(){
 	$tel = strip_tags(trim($this->input->post('tel')));
 	$email = strip_tags(trim($this->input->post('email')));
 	$uid = strip_tags(trim($this->input->post('uid')));
  $id = strip_tags(trim($this->input->post('id')));
 	$cash = strip_tags(trim($this->input->post('cash')));
 	$name = strip_tags(trim($this->input->post('name')));

 	$this->send_msm($tel,$name,$cash);  
 	$this->send_email($email,$cash,$name);  
  $this->web_cash_inform($uid,$cash);

  $this->m_enpei->update_withdraw_profit($uid, $cash);

 	$return = $this->manage_model->update_user_cash($id,$uid,$cash);

 	if($return){
 		echo json_encode($uid);
 	}

 }
 public function test(){
 	$uid = 1;
 	$cash = 1;
 	$data = $this->manage_model->update_user_cash($uid,$cash);
 	var_dump($data);
 }

//提现验证码短信接口
 public function send_msm_verify(){

        // $tel=15515390436;
        // $tel = intval(strip_tags(trim($this->input->post('tel'))));
        $tel = $this->input->post('tel');
        $str='';
        $tpl_id =2793;
        // $send_name = "小黑";
        $rand = mt_rand(111111,999999);
        // $tpl_value=urlencode('#code#='.$code);
        $tpl_value=urlencode('#code#='.$rand);
        $appkey ='fc4ce81c8f641a8f25f48c87f9acb7a2';   
        $api_url ='http://v.juhe.cn/sms/send?mobile='.$tel.'&tpl_id='.$tpl_id.'&tpl_value='.$tpl_value.'&key='.$appkey;
        $json_content = file_get_contents($api_url);

        $newdata = array('tel_num' => $tel,'tel_verify' => $rand);
        $this->session->set_userdata($newdata);
        // echo $json_content;
        echo json_encode($tel);
 }
 //提取短信验证码session
 /***
  返回一个字符串（手机号+验证码）
 **/
 public function get_tel_session(){
  $session_name = $this->session->userdata('tel_num');
  $session_pass = $this->session->userdata('tel_verify');
  // echo $session_name.$session_pass;
  return $session_name.$session_pass;
 }


//提现通知发短信接口
 /***
  $tel:手机号
  $send_name：接受信息者用户名
  $send_cash：提现金额
 ***/
 public function send_msm($tel,$send_name,$send_cash){

        // $tel=15515390436;
        $str='';
        $tpl_id =2688;
        // $send_name = "小黑";
        $cash = $send_cash."元";
        // $tpl_value=urlencode('#code#='.$code);
        $tpl_value=urlencode('#name#='.$send_name.'&#code#='.$cash);
        $appkey ='fc4ce81c8f641a8f25f48c87f9acb7a2';   
        $api_url ='http://v.juhe.cn/sms/send?mobile='.$tel.'&tpl_id='.$tpl_id.'&tpl_value='.$tpl_value.'&key='.$appkey;
        $json_content = file_get_contents($api_url);
        // echo $json_content;
        return true;
 }
 //邮件发送接口
  /***
  $email:邮箱
  $name：接受信息者用户名
  $cash：提现金额
 ***/
 public function send_email($email,$cash,$name){

  $send_user = '亲爱的'.$name.'您好，您申请的提现已充值到您的微信账号，提现金额为'.$cash.'元,请查收。如非本人操作请忽略！';
  $send_admin = '嗨~~~，，，用户：'.$name.'申请提现啦！提现金额为：'.$cash.'元。';

 	$config['protocol'] = 'smtp'; 
  $config['smtp_host'] = 'smtp.163.com'; // given server 
  $config['smtp_user'] = 'lanmayigzs@163.com'; 
  $config['smtp_pass'] = 'lanmayi888'; 
  $config['smtp_port'] = '25'; // given port. 
  $config['smtp_timeout'] = '5'; 
  $config['newline'] = "/r/n"; 
  $config['crlf'] = "/r/n"; 
  $config['charset']='utf-8';  // Encoding type 
  $this->email->initialize($config);
  $this->email->from('lanmayigzs@163.com', 'lanmayigzs');
  $this->email->to($email); 
  $this->email->subject('三果儿网络科技提现通知');
  if ($email == 'lanmayigzs@163.com') {
    $this->email->message($send_admin); 
  }else{  
    $this->email->message($send_user); 
  }
  $this->email->send();
  // echo $this->email->print_debugger();  
  return true;
 }
 //获取用户总金额
 /***
  $u_id:用户id
 ***/
 public function get_user_total_cash($u_id){
 	$total_cash = $this->manage_model->get_total_cash($u_id);  
 	return $total_cash;
 }
 //测试
 public function page_list_test(){

  $u_id = 1;
  $u_name = 11111;
  $u_tel = 1;
  $u_cash = 1;
  $u_email = 1;  
  $style = 0;

  $applay_info = array('u_id' => $u_id,'u_name' => $u_name,'u_tel' => $u_tel,'u_email' => $u_email,'u_cash' => $u_cash); 
   for ($i=0; $i < 100; $i++) { 
     $this->manage_model->insert_applay_info($applay_info);
   }
  
 }

 //提现资料添加
 public function accept_applay(){
 	$u_id = intval($this->input->post('u_id'));
 	// $u_name = strip_tags(trim($this->input->post('u_name')));
 	$u_tel = strip_tags(trim($this->input->post('tel')));
 	$u_cash = strip_tags(trim($this->input->post('take_num')));
 	$verify = strip_tags(trim($this->input->post('phone_code')));
 	// $style = $this->input->post('style');//0代表添加，1代表修改  

 	$u_name=1;
 	// // $style = 0;//0代表验证码不符，1代表修改 ,-1代表申请金额超过总金额 
  // $verify = 564399;

  $tel_session = $this->get_tel_session();
  if ($u_tel.$verify!=$tel_session) {
      $style = 0;//0代表验证码不符
      echo json_encode($style);
      return false;
   }
   //清除session
   $this->session->unset_userdata('tel_num');
   $this->session->unset_userdata('tel_verify');
   $total_profit = $this->m_enpei->get_share_user_total_profit($u_id);
   $total_cash = $total_profit['total_profit'];
 	
 	if ($total_cash < $u_cash) {
 		$style = -1;  //-1代表申请金额超过总金额 
 		echo json_encode($style);
    return false;
 	}

 	  $applay_info = array('u_id' => $u_id,'u_tel' => $u_tel,'u_cash' => $u_cash); 

    //提现通知管理员  
    $email='lanmayigzs@163.com';
    $this->send_email($email,$u_cash,$u_name);

		$return = $this->manage_model->insert_applay_info($applay_info);
		// var_dump($return); 
	 if ($return) {
     $style = 1;  //1代表申请金额插入成功
     echo json_encode($style);
     return true;
   }

 	
 }
  //添加新用户
 //返回插入的id
   public function add_user(){

    $new_user = array(
      'open_id' => 1,
      'u_name' => 1,
      'u_name' => 1,
      'u_email' => 1,
      'u_tel' => 1,
      'session_id' => 1,
      'ip_address' => 1,
      'user_agent' => 1,
      'u_total_cash' => 1,
      'last_activity' => 1,
      'subscribe' => 1,
      'nickname' => 1,
      'sex' => 1,
      'language' => 1,
      'city' => 1,
      'province' => 1,
      'country' => 1,
      'headimgurl' => 1, 
      );
    $return = $this->manage_model->add_user($new_user);
    // return $return;
    var_dump($return); 
   }

   //更新用户信息
   /***
    传入的$id为要更新的用户id
    返回值$return代表时候更新成功（true/false）
   **/
   public function up_user_info($id=2){
    $up_user = array(
      'open_id' => 2,
      'u_name' => 1,
      'u_name' => 1,
      'u_email' => 2,
      'u_tel' => 1,
      'session_id' => 2,
      'ip_address' => 1,
      'user_agent' => 1,
      'u_total_cash' => 1,
      'last_activity' => 1,
      'subscribe' => 1,
      'nickname' => 1,
      'sex' => 1,
      'language' => 1,
      'city' => 1,
      'province' => 1,
      'country' => 1,
      'headimgurl' => 1, 
      );
    $return = $this->manage_model->up_user_info($id,$up_user);
    // return $return;
    var_dump($return); 
   }

   public function ckedit(){
    $this->load->view('ckeditor/samples/inlineall');
   }
   public function add_article_edit(){
    $data =  $this->input->post('data');
    $return = $this->manage_model->add_article_edit($data);
    var_dump($return); 
   }



}
?>