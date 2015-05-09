<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Share extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	private $open_article_register = TRUE;
	function __construct()
	{
	 parent::__construct();
	 $this->load->helper('url');
	 $this->load->library('someclass');
	 $this->load->library('session');
	 $this->load->model('manage_model');
	 $this->load->library('email');
    $this->load->model('m_enpei');

}

	public function index()
	{
		$data['detail_link'] ='/index.php/share/article_center/';
		$this->load->view('index',$data);
		

	}
	private function js_sdk(){
		 require_once "/wxshare/jssdk.php";
    	$jssdk = new JSSDK("wxa832dc06778e6011", "a88d1b39ca8319fbba602ed240e29945");
    	$signPackage = $jssdk->GetSignPackage();
		return $signPackage;
	}
	/**
	 *get参数说明
	 *	
	 *@param f  分享人父亲 
	 *@param g  分享人祖父
	 *@param p  文章id
	 *@return $url  srting
	 */
	public function article_center(){
		$this->weixin_agent(true);
		$back ='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'';
		$users =$this->user_login($back);
		$article =$this->find_article();
		$a= $this->direct_register($users);
		if (intval($a)>0) {
			$uid = $a;
		}
		$p = $article[0]['ar_id'];
		$openid = $users['open_id'];
		// $openid="sfasfsf";
		$ids = $this->get_user_info("",$openid);
		var_dump($ids);
		//是否领取过任务
		// $article_profit_data  = $this->m_enpei->get_single_article_user_profit($pid,$uid);
		// 根据openid获取父id和祖父id
		$f=$ids['u_id'];
		$g=$ids['grand_id'];
		$url = '/index.php/share/user_get_article?p='.$p.'&f='.$f.'&g='.$g.'';
		echo '<h1 style="margin-top:100px;text-align:cenrter;"><a href='.$url.'>领取任务</a></h1>';
	}
	public function user_get_article(){
		$this->weixin_agent(true);
		$back ='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'';
		$users =$this->user_login($back);
		$data['signPackage'] = $this->js_sdk();
		$data['f'] = $_GET['f'];//父id
		$data['g'] =$_GET['g'];//根id
		$data['p'] =$_GET['p'];//文章id
		$data['back'] = $back;
		$farther_id = $data['f'];
		$grand_id = $data['g'];
		// exit;
		$pid = $data['p'];
		$data['share_url'] = 'http://share.kejixi.com/index.php/share/show_detail?p='.$data['p'].'&f='.$data['f'].'&g='.$data['g'].'';
		$user_info=  $this->get_user_info("",$users['open_id']);
		$uid = $user_info['u_id'];
		$user_total_profit = $this->get_user_total_profit($uid);
		$data['user_total_profit'] = $user_total_profit['total_profit'];
		$article_profit_data  = $this->get_single_article_user_profit_data($pid,$uid);
		// var_dump($article_profit_data );
		// exit;
		// $this->m_enpei->insert_share_article_attr($pid, 1000, 20);
		$get_article = $this->get_article($user_info,$pid);
		
		if($article_profit_data!=NULL){
			$data['is_get'] = 'yes';
			$data['profit']  = 	$article_profit_data['article_profit'];
		}else{
			$data['is_get'] = 'no';
		}
		$article =$this->find_article();
		// var_dump($article);
		// exit;
		if (empty($article)) {
			$article[0]['ar_title']="对不起暂无文章信息";
			$article[0]['ar_author_pic']="../frozenui/1.2.1/img/face_default.png";
			$article[0]['ar_author']="三果儿网络科技";
			$article[0]['time']="2015--5-05";
			$article[0]['ar_content']="<p>抱歉暂无文章信息</p>";
		}
		if ($article[0]['ar_author']=="") {
			$article[0]['ar_author_pic']="/resources/frozenui/1.2.1/img/face_default.png";
			$article[0]['ar_author']="三果儿网络科技";
		}
		$article[0]['time'] = date('Y-m-d',strtotime($article[0]['time']));
		$data['users']=$users;
		$data['article'] =$article[0];
		$data['o'] = $this->encode_get($uid);
		$this->load->view('user_get_article',$data);

	} 

	public function show_detail(){
		$this->weixin_agent(true);
		$back ='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'';
		$users =$this->user_login($back);
		$data['signPackage'] = $this->js_sdk();
		$uid ="";
		$data['f'] = $_GET['f'];//父id
		$data['g'] = $_GET['g'];//根id
		$data['p'] =$_GET['p'];//文章id
		$data['back'] = $back;
		$farther_id = $data['f'];
		$grand_id = $data['g'];
		var_dump($grand_id);
		$pid = $data['p'];
		$user_info = $users;
		$a= $this->accept_invite($user_info, $farther_id, $grand_id) ;
		if (intval($a)>0) {
			$uid = $a;
		}
		$user_info['u_id'] =$uid;
		$user_total_profit = $this->get_user_total_profit($uid);
		$data['user_total_profit'] = $user_total_profit['total_profit'];
		$article_profit_data  = $this->get_single_article_user_profit_data($pid,$uid);
        $this->user_read_article($user_info, $farther_id, $grand_id, $pid);
		if($article_profit_data!=NULL){
			$data['is_get'] = 'yes';
			$data['profit']  = $article_profit_data['article_profit'];
		}else{
			$data['is_get'] = 'no';
		}
		
		$article =$this->find_article();
		if (empty($article)) {
			$article[0]['ar_title']="对不起暂无文章信息";
			$article[0]['ar_author_pic']="../frozenui/1.2.1/img/face_default.png";
			$article[0]['ar_author']="三果儿网络科技";
			$article[0]['time']="2015--5-05";
			$article[0]['ar_content']="<p>抱歉暂无文章信息</p>";
		}
		if ($article[0]['ar_author']=="") {
			$article[0]['ar_author_pic']="/resources/frozenui/1.2.1/img/face_default.png";
			$article[0]['ar_author']="三果儿网络科技";
		}
		$article[0]['time'] = date('Y-m-d',strtotime($article[0]['time']));
		$data['users']=$users;
		$data['article'] =$article[0];
		$data['o'] = $this->encode_get($uid);
		$this->load->view('detail',$data);
	}
	
	//个人中心
	/**
	 * @param $o未openid
	 */
	public function personal_center(){

			// $data['o'] = $this->decode_get($_GET['o']);
			// $data['g'] = $this->decode_get($_GET['g']);
			$this->weixin_agent(true);
			$back ='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'';
			$data['users'] =$this->user_login($back);
			$openid =$data['users']['open_id'];
			$ids = $this->get_user_info("",$openid);
			$uid = $ids['u_id'];
			// $hard_work = $this->get_user_hard_work();
			// $share_work =$this->get_invite_profit();
			$user_total_profit = $this->get_user_total_profit($uid);
			$data['user_total_profit'] = $user_total_profit['total_profit'];
			$data['child_total_profit'] = $user_total_profit['child_total_profit'];
			$data['article_total_profit'] = $user_total_profit['article_total_profit'];
			//获取未读通知
			$data['notices']= $this->get_web_cash_inform($uid);

			if ($data['notices']!=NULL) {
				$notices_count = count($data['notices']);
				$data['notice_num']= 0;
				for ($i=0; $i <$notices_count ; $i++) { 
					if ($data['notices'][$i]['style']=='0') {
						$data['notice_num']= $data['notice_num']+1;
					}
					
				}
			}
			$this->load->view('personal',$data);

	}
	public function takemoney(){

		$this->weixin_agent(true);
		$back ='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'';
		$data['users'] =$this->user_login($back);
		$openid =$data['users']['open_id'];
		$ids = $this->get_user_info("",$openid);
		$uid = $ids['u_id'];
		$user_total_profit = $this->get_user_total_profit($uid);
		// var_dump($user_total_profit);
		$data['uid'] = $uid ;
		$data['user_total_profit'] = $user_total_profit['total_profit'];
		$data['uid'] = 1;
		$this->load->view('takemoney',$data);

	}
	public function notice(){
		$this->weixin_agent(true);
		$back ='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'';
		$data['users'] =$this->user_login($back);
		$openid =$data['users']['open_id'];
		$ids = $this->get_user_info("",$openid);
		$uid = $ids['u_id'];
		// $uid =1;
		$data['notices']= $this->get_web_cash_inform($uid);
			// var_dump($data['notices']);
			if ($data['notices']!=NULL) {
				$notices_count = count($data['notices']);
				$data['notice_num']= 0;
				for ($i=0; $i <$notices_count ; $i++) { 
					if ($data['notices'][$i]['style']=='0') {
						$this->up_web_cash_style($data['notices'][$i]['id']);
					}
					
				}
			}
		
		$this->load->view('notice',$data);
	}
	public function share_friends(){
		$this->weixin_agent(true);
		$back ='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'';
		$data['users'] =$this->user_login($back);
		$openid =$data['users']['open_id'];
		$data['signPackage'] = $this->js_sdk();

		// 判断用户是否注册
		if (isset($_GET['in'])) {//接受邀请
			$in = $_GET['in'];
			$users = $this->get_user_info("",$openid);
			//判断用户是否注册
			if ($users!=NULL) {//注册过的
				$uid = $users['u_id'];
				if (intval($uid)==$in) {
					$data['is_self'] = 'yes';
				}else{
					$data['is_self'] = 'no';
				}
				
			}else{//没有注册过的
				
				$data['is_self'] = 'no';
			}
			$farther_info = $this->get_user_info($in,"");
			$data['users'] = $farther_info;
			// 组装父亲信息
			$data['accept_invite_url'] = '/index.php/share/do_accept_invite/?f='.$data['users']['u_id'].'&g='.$data['users']['grand_id'].'';
		    $data['share_url'] = $back;
		}else{ //自己进来的
			$data['is_self'] = 'yes';
			$data['users'] = $this->get_user_info("",$openid);
		    $uid = $data['users']['u_id'];
		    //组装自己信息
		    $data['accept_invite_url'] = '/index.php/share/do_accept_invite/?f='.$data['users']['u_id'].'&g='.$data['users']['grand_id'].'';
		    $data['share_url'] = 'http://share.kejixi.com/index.php/share/share_friends?in='.$uid.'';
		}

		// $p=1;
		// var_dump($in);
		// // if ($in==$_COOKIE["user_oauth2_openid"]) {
		// // 	$data['is_self'] ='yes';
		// // }else{
		// // 	$data['is_self']='no';
		// // 	$url ='/index.php/share/index/?p='.$p.'&in='.$in.'';
		// // }
		// // $this->weixin_agent(true);
		// // $back ='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'';
		// // $data['users'] =$this->user_login($back);
		// $data['in']= $_GET['o'];
		$this->load->view('share',$data);
	}
	//接受邀请
	public function do_accept_invite(){
		$this->weixin_agent(true);
		$back ='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'';
		$data['users'] =$this->user_login($back);
		$farther_id = $_GET['f'];
		$grand_id = $_GET['g'];
		$a= $this->accept_invite($data['users'], $farther_id, $grand_id) ;
		if (intval($a)>0) {
			$uid = $a;
		}
		$data['detail_link'] ='/index.php/share/article_center/';
		$this->load->view('index',$data);
	}
	public function myfrofile(){
		$o=$this->decode_get($_GET['o']);
		$this->weixin_agent(true);
		$back ='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'';
		$data['users'] =$this->user_login($back);
		$data['o']= $_GET['o'];
		$this->load->view('myfrofile',$data);
	}
	public function share_details(){
		$this->weixin_agent(true);
		$back ='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'';
		$data['users'] =$this->user_login($back);
		$openid =$data['users']['open_id'];
		$ids = $this->get_user_info("",$openid);
		$uid = $ids['u_id'];
		$hard_work = $this->get_user_hard_work($uid);
		$user_total_profit = $this->get_user_total_profit($uid);
		$data['article_total_profit'] = $user_total_profit['article_total_profit'];
		$data['hard_work'] = $hard_work;
		$this->load->view('share_details',$data);
	}
	public function friend_details(){
		$this->weixin_agent(true);
		$back ='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'';
		$data['users'] =$this->user_login($back);
		$data['users'] =$this->user_login($back);
		$openid =$data['users']['open_id'];
		$ids = $this->get_user_info("",$openid);
		$uid = $ids['u_id'];
		$friend_work =$this->get_invite_profit($uid);
		$user_total_profit = $this->get_user_total_profit($uid);
		$data['child_total_profit'] = $user_total_profit['child_total_profit'];
		$data['friend_work'] = $friend_work;
		$this->load->view('friend_details',$data);
	}

	

/*********************调用文章信息**************/

	//调用文章接口
	 /****
	  $id:文章id
	 **/
	 public function find_article($id=1){
	 	$article = $this->manage_model->find_article($id);
	 	return $article;
	 }


	/*********************判断是否微信浏览器**************/

	/**
	 *p判断是否是微信浏览器
	 *
	 *@param $open 浏览器控制开关 	
	 *$open=true 是开启浏览器判断 
	 *$open默认值为false;
	 */
	public function weixin_agent($open){
		$open = isset($open)? $open : false;
		if ($open==true) {
			$user_agent = $_SERVER['HTTP_USER_AGENT'];
	    	if (strpos($user_agent, 'MicroMessenger') === false) {
	    		header("Content-type: text/html; charset=utf-8");
				echo "本页面仅支持微信访问!非微信浏览器禁止浏览!";
				exit;
	    	}	
		}

	}

/*********************获取用户信息开始**************/

	//判断用户是否登录
	 public function user_login($back)
	 {
	 	$openid =$this->session->userdata('openid');
	 	if(isset($_COOKIE["user_oauth2_openid"])){
	 		//成功登录
	 		$userinfo =$this->session->all_userdata();
	 		$user_info['open_id'] = $userinfo['openid'];
	 		$user_info['u_name'] = $userinfo['nickname'];
	 		$user_info['u_pass'] ="";
	 		$user_info['u_email'] = "";
	 		$user_info['u_tel'] = "";
	 		$user_info['session_id'] = $userinfo['session_id'];
	 		$user_info['ip_address'] = $userinfo['ip_address'];
	 		$user_info['last_activity'] = $userinfo['last_activity'];
	 		$user_info['user_agent'] =$userinfo['user_agent'];
	 		$user_info['u_total_cash'] ="";
	 		if (isset($userinfo['subscribe'])) {
	 			$user_info['subscribe'] = $userinfo['subscribe'];
	 		}else{
	 			$user_info['subscribe'] = 0;
	 		}
	 		$user_info['sex'] = $userinfo['sex'];
	 		$user_info['language'] = $userinfo['language'];
	 		$user_info['city'] = $userinfo['city'];
	 		$user_info['province'] = $userinfo['province'];
	 		$user_info['country'] = $userinfo['country'];
	 		$user_info['headimgurl'] = $userinfo['headimgurl'];
	 		
	 		/**
	 		 *用户信息
	 		 *@return array 
	 		 *$userinfo['session_id'] 表示sessionid 
	 		 *$userinfo['ip_address'] 表示用户登录Ip
	 		 **$userinfo['user_agent'] 表示用户登录浏览器
	 		 **$userinfo['last_activity'] 表示用户登录时间
	 		 **$userinfo['opend'] 表示用户登录Ip
	 		 **$userinfo['nick_name'] 表示用户名字
	 		 *$userinfo['user_avatar'] 表示用户头像
	 		 *$userinfo['user_coord'] 表示用户坐标经维度
	 		 */
	 		// var_dump($userinfo);
	 		return $user_info;
	 	}else{
	 		$this->get_userinfo($back);
	 	};
	 }
	 public function get_userinfo($back){
	 	  		//获取用户地址位置
	 	  		// $this->session=>
	 	  		// $newdata['user_coord']=
	 			$back = urlencode($back);
	 	  		$url ="http://share.kejixi.com/index.php/share/get_userinfo?b=".$back."";				
	 	  		if (isset($_GET['code'])) {
	 	  		    // $userinfo = $this->oauth2($authurl);
	 	  			$appid='wxac9d1f78dad30aab';
	 	  			$appsecret ='67d99256d328af101fc375a3456668ce';
	 	   		    $userinfo =$this->oauth2($_GET['code'],$appid,$appsecret);
	 	  		    if (empty($userinfo)) {
	 	  		        echo'授权失败!';
	 	  		    }else{
	 	  		    	$this->session->set_userdata($userinfo);
	 	  		    	$back=urldecode($_GET['b']);
	 	  		    	// $h_url = "http://share.kejixi.com/index.php/share/show_detail/";
	 	  		    	header("location:$back");
	 	  		    } 
	 	  		} else {
	 						//换取授权code
	 	  				$appid ='wxac9d1f78dad30aab';
	 	  		        $this->toAuthUrl($appid,$url);
	 	  		}   	
	 }
	 //curl抓取url返回数据
	 public function https_request($url)
	 {
	     $curl = curl_init();
	     curl_setopt($curl, CURLOPT_URL, $url);
	     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	     curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
	     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	     $data = curl_exec($curl);
	     if (curl_errno($curl)) {return 'ERROR '.curl_error($curl);}
	     curl_close($curl);
	     return $data;
	 }
//换取授权code
    /**
     * @param $appid公众号appid
     * @param $url数据返回url地址
     */
    public function toAuthUrl($appid,$url)
    {
        $oauth2_code = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $appid . "&redirect_uri=" . urlencode($url) . "&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect";
        header("location:$oauth2_code");
    }
//获取用户所有信息
    public function oauth2($code,$appid,$appsecret)
    {
        $state = 1; //1为关注用户, 0为未关注用户
        $oauth2_code = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . $appid . "&secret=" . $appsecret. "&code=" . $code . "&grant_type=authorization_code";
        $content = $this->https_request($oauth2_code);
        $token = json_decode($content, true);
        if (empty($token) || !is_array($token) || empty($token['access_token']) || empty($token['openid'])) {
            echo '<h1>获取微信公众号授权' . $code . '失败[无法取得token以及openid], 请稍后重试！ 公众平台返回原始数据为: <br />' . $content['meta'] . '<h1>';
            exit;
        }
        $from_user = $token['openid'];
        //未关注用户和关注用户取全局access_token值的方式不一样
        if ($state == 1) {
            $oauth2_url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$appsecret."";
            $content = $this->https_request($oauth2_url);
            $token_all = json_decode($content, true);
            if (empty($token_all) || !is_array($token_all) || empty($token_all['access_token'])) {
                echo '<h1>获取微信公众号授权失败[无法取得access_token], 请稍后重试！ 公众平台返回原始数据为: <br />' . $content['meta'] . '<h1>';
                exit;
            }
            $access_token = $token_all['access_token'];
            $oauth2_url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=" . $access_token . "&openid=" . $from_user . "&lang=zh_CN";
            $content =$this->https_request($oauth2_url);
            $info = json_decode($content, true);
            if (empty($info) || !is_array($info) || empty($info['openid']) || empty($info['nickname'])) {
                $state=2;
            }
        } 
       if($state==2){
            $access_token = $token['access_token'];
            $oauth2_url = "https://api.weixin.qq.com/sns/userinfo?access_token=" . $access_token . "&openid=" . $from_user . "&lang=zh_CN";
            //使用全局ACCESS_TOKEN获取OpenID的详细信息
            $content = $this->https_request($oauth2_url);
            $info = json_decode($content, true);
            if (empty($info) || !is_array($info) || empty($info['openid']) || empty($info['nickname'])) {
                echo '<h1>获取微信公众号授权失败[无法取得info], 请稍后重试！ 公众平台返回原始数据为: <br />' . $content['meta'] . '<h1>' ;
                exit;
            }


        }

        $headimgurl = $info['headimgurl'];
        $nickname = $info['nickname'];
        //设置cookie信息
        setcookie("user_oauth2_headimgurl", $headimgurl, time() + 60 * 5);
        setcookie("user_oauth2_nickname", $nickname, time() + 60 * 5);
        setcookie("user_oauth2_openid", $from_user, time() + 60 * 5);
        return $info;
    }

/*********************获取用户信息结束**************/


/*********************get参数开始**************/
	/**
	 *get参数加密
	 *	
	 *@param s  分享人openid 
	 *@param p  文章id
	 *@return $url  srting
	 */
	public function encode_get($a){
		$b=base64_encode($a);
		return $b;
	}
	/**
	 *get参数解密
	 *	
	 *@param s  分享人openid 
	 *@param p  文章id
	 *@return $url  srting
	 */
	public function decode_get($a){
		$b =base64_decode($a);
		return $b;

	}

/*********************get参数结束**************/


/********enpei开始******/
   private $reg_reward = 5; //注册奖励
    private $reward_class = 2; //奖励级数
    private $reg_parent_reward = 1; //父亲邀请奖励
    private $reg_grand_reward = 0.5; //祖父邀请奖励
    private $reg_relative_reward = 0; //级数以外的亲戚的邀请奖励

    private $article_parent_reward = 0.1; //父亲阅读奖励
    private $article_grand_reward = 0.05;   //祖父阅读奖励
    private $article_relative_reward = 0.01; //亲戚阅读奖励

    private $find_my_farther_return = array();



  
    /**
     *  direct_register
     *  直接注册
     *
     *  @author leo
     *  @access public
     *  @param
     *
     *
     *  @since 1.0
     *  @return int(uid，－1：注册失败)
     *
     */
    public function direct_register($user_info) {
        $return = - 1;
        $open_id = $user_info['open_id'];

        $user_info['grand_id'] ='';
        
        $check_user = $this->m_enpei->check_user_registered($open_id);

        if ( $check_user != NULL ) {

            $return = $check_user; //注册过
            return $return;

        }
        // 注册新用户
        $new_user_id = $this->m_enpei->register_new_user($user_info);
        // 更新祖父ID为自己
        $this->m_enpei->update_user_grand_id($new_user_id,$new_user_id);

        $return = $new_user_id;
        // 新增注册奖励
        $this->m_enpei->register_reward($new_user_id, $this->reg_reward);
        // 增加树枝
        $tree_data = array();
        $tree_data[] = array(
            $new_user_id,
            0
        );
        $data = json_encode($tree_data);
        $this->m_enpei->insert_new_tree($new_user_id, $data);
        return $return;

    }
    /** 
     * accept_invite
     * 被邀请用户点击进入，所触发的一些列反应
     *
     * @author enpei
     * @access public
     * @param Array $user_info 该用户对于微信的信息数组
     * @param mixed $farther_id 父ID
     * @param mixed $grand_id 祖先ID
     * @since 1.0
     * @return int(-1：注册失败，>0：注册后的UID)
     */
    public function accept_invite($user_info, $farther_id, $grand_id) {
        $return = -1; //默认注册失败

        // 根据open_id判断该用户是否注册过
        $open_id = $user_info['open_id'];

        $check_user = $this->m_enpei->check_user_registered($open_id);

        if ( $check_user != NULL ) {

            $return = $check_user; //注册过
            return $return;

        }
        $user_info['grand_id'] ='';
        // 注册新用户
        $new_user_id = $this->m_enpei->register_new_user($user_info);
        // 更新祖父ID
        $this->m_enpei->update_user_grand_id($new_user_id,$grand_id);

        $return = $new_user_id;
        // 新增注册奖励
        $this->m_enpei->register_reward($new_user_id, $this->reg_reward);
        // 根据祖用户ID增加树枝
        //取出多叉树
        $tree_data = $this->m_enpei->get_tree_data($grand_id);
        $tree_arr = json_decode($tree_data);
        //重构多叉树
        $new_tree_arr = $this->add_to_tree($tree_arr, $farther_id, $new_user_id);
        //更新多叉树
        $this->m_enpei->update_tree_data($grand_id, json_encode($new_tree_arr));
        // 开始分成
        //新增父亲纪录, 更新所有父亲的share_user_total_profit
        if (  
            $this->m_enpei->insert_share_single_child_user_profit($farther_id, $new_user_id, $this->reg_parent_reward)
             &&  
            $this->m_enpei->update_share_user_total_profit($farther_id, $this->reg_parent_reward , 0, 0)

            ) {
            
            // 首先清空数组
            unset($this->find_my_farther_return);

            $this->find_my_farther_return[0] = $farther_id;
            $this->find_my_farther( ($farther_id.''), $tree_arr);
            $back_arr = $this->find_my_farther_return;

            // 如果不存在爷爷级别
            if (count($back_arr) <= 1) {
              // echo "执行到这里1";
              return $return;
            }
            // 存在爷爷级别
            for ($i = 0; $i < (($this->reward_class) - 1); $i++) {
                $invite_add_value = 0;
                if ($i == 0) {
                  # 祖父收益
                  $invite_add_value = $this->reg_grand_reward;
                }else{
                  $invite_add_value = $this->reg_relative_reward;
                }
                //更新父亲以上的亲属的邀请分成纪录
                $this->m_enpei->update_share_single_child_user_profit($back_arr[$i+1], $back_arr[$i], 0 , $invite_add_value);
                // 更新所有亲属的share_user_total_profit
                $this->m_enpei->update_share_user_total_profit($back_arr[$i+1], $invite_add_value, 0, 0)   ;

            }

            

        }
        return $return;
    }
    /**
     *  add_to_tree
     *  插入原来的树
     *
     *  @author leo
     *  @access public
     *  @param Array $stack 原多叉树数组
     *  @param int $farther_id 父ID
     *  @param int $child_id 子ID
     *  @since 1.0
     *  @return Array 返回新数组
     *
     */

    public function add_to_tree($stack, $farther_id, $child_id) {
        // 首先判断这棵树中至少有几层

        $count_stack = count($stack);

        // 单层
        if ($count_stack == 1 && $stack[0][0] == $farther_id ) {

            // $stack[0] = array($farther_id,1,$child_id); 
            $stack[0][1] +=1; 
            array_push($stack[0], $child_id);

        }else{

        // 多层
        $tree_arr = array();
        for ($i = 0; $i < $count_stack; $i++) {
            if (in_array($farther_id, $stack[$i])) {
                // code...
                $tree_arr[] = $i;
            }
        }
        $num = count($tree_arr);
        // 第一种情况：父亲没有儿子（一次）
        if ($num == 1) {
            // code...
            $stack[] = array(
                $farther_id,
                1,
                $child_id
            );
        } elseif ($num == 2) {
          // 第二种情况：父亲已经有儿子（两次）
            for ($x = 0; $x < 2; $x++) {
                if ($stack[$tree_arr[$x]][0] == $farther_id) {
                    $stack[$tree_arr[$x]][1]+= 1;
                    array_push($stack[$tree_arr[$x]], $child_id);
                    return $stack;
                }
            }
        }

        }
        
        return $stack;
    }
    /**
     * 
     *  @author leo
     *  @access public
     *  @param String $child 所要查询的元素
     *  @param Array $stack 所要查询的数组
     *  @since 1.0
     *  @return NULL  将$find_my_farther_return重新赋值了
     */
    public function find_my_farther($child, $stack) {
        // Global $stack;
        
        
        $count_stack = count($stack);
        for ($i = 0; $i < $count_stack; $i++) {
            // code...
            // 在树中，并且下标不是0（找到树根）
            $t = array_keys($stack[$i], $child, true);
            if (in_array($child, $stack[$i]) && (($t != NULL) && ($t[0] != 0))) {
                // 取第一个元素
                $this->find_my_farther_return[] = $stack[$i][0];
                // 递归
                $this->find_my_farther($stack[$i][0], $stack);
            }
        }
    }
    /**
     * 
     *  get_article
     *  用户领取文章
     * 
     *  @author leo
     *  @access public
     *  @param Array $user_info
     *  
     *  @since 1.0
     *  @return mixed (0:不是会员，1:已领过，2:领取成功，3:系统不许)
     */
    public function get_article($user_info='',$pid)
    {   
        $return = '';
        $open_id = $user_info['open_id'];
        $uid = $user_info['u_id'];
        $uip = $user_info['ip_address'];



        $read_duration = '';
        $to_bottom = '';
        $share_type = '';
        $u_lbs_x = '';
        $u_lbs_y = '';
        $u_address = '';



        $check_user = $this->m_enpei->check_user_registered($open_id);

        if ( $check_user == NULL ) {

            $return = 0; //不是会员

        }else{

          $read_detail = $this->m_enpei->check_user_read_detail($pid,$uid);
          if ($read_detail == NULL ) {
            // 未看过，插入
            $this->m_enpei->insert_user_read_deatail($pid,$uid,$uip,$read_duration,$to_bottom,$share_type,$u_lbs_x,$u_lbs_y,$u_address);
            $this->m_enpei->add_article_pv($pid);

          }else{
            // 看过，刷新
            $this->m_enpei->add_article_pv($pid);
          }
          // 查询是否领取过
          $article_profit_data  = $this->m_enpei->get_single_article_user_profit($pid,$uid);
          
          if ($article_profit_data != NULL) {
            // 领过
            // 提示信息
            $return = 1;
            echo "领过提示信息";

            // 未领过
          }elseif ( $this->check_reward_is_permit($pid,$uid) ) {
            // 查询系统允许
            // 领取
            if ($this->m_enpei->insert_single_article_user_profit($pid,$uid)) {
              // 领取成功
              $return = 2;
              echo "可以分享啦！";
            }
            
          }else{
            // 系统不允许
            $return = 3;
            echo "系统不允许提示信息";

          }
          
          
        }
    }
    /**
     *  user_read_article
     *  用户阅读文章
     *  @author leo 
     *  @access public
     *  
     * 
     */
    public function user_read_article($user_info='', $farther_id, $grand_id, $pid)
    {
        $return =''; //
        // 根据open_id判断该用户是否注册过
        $open_id = $user_info['open_id'];
        $uid = $user_info['u_id'];
        $uip = $user_info['ip_address'];

        $read_duration = '';
        $to_bottom = '';
        $share_type = '';
        $u_lbs_x = '';
        $u_lbs_y = '';
        $u_address = '';


        $check_user = $this->m_enpei->check_user_registered($open_id);

        if ( $check_user == NULL ) {

            echo '你还不是会员<br/>';

            $return = 0; //不是会员

        }

        $read_detail = $this->m_enpei->check_user_read_detail($pid,$uid);
          if ($read_detail == NULL ) {
            // 未看过，插入

            $this->m_enpei->insert_user_read_deatail($pid,$uid,$uip,$read_duration,$to_bottom,$share_type,$u_lbs_x,$u_lbs_y,$u_address);
            $this->m_enpei->add_article_pv($pid);
            echo '未看过<br/>';

          }else{
            // 看过，刷新
            echo '看过<br/>';
            $this->m_enpei->add_article_pv($pid);
            return $return;
          }

          if ($uid == $farther_id || $uid ==$grand_id) {
            # code...
            echo '这篇文章是自己领取的！<br/>';
            return $return;
          }

          
          

          if ( $this->check_reward_is_permit($pid,$uid)  ) {
            // 系统允许

            // 查询树
            $tree_data = $this->m_enpei->get_tree_data($grand_id);
            $tree_arr = json_decode($tree_data);


             // 首先清空数组
            unset($this->find_my_farther_return);

            // 查询上面的树
            $this->find_my_farther_return[0] = $farther_id;
            $this->find_my_farther( ($farther_id.''), $tree_arr);
            $back_arr = $this->find_my_farther_return;


            echo '<br/>';
            var_dump($back_arr);
            echo '<br/>';

            // 如果不存在爷爷级别或者浏览者不在树上
            echo '准备加龙飞<br/>';
            

          if ( $this->check_reward_is_permit($pid,$farther_id)  ) {
                // 奖励父亲

                $this->m_enpei->update_single_article_user_profit($pid,$farther_id, $this->article_parent_reward);
                $this->m_enpei->update_share_user_total_profit($farther_id, 0 , $this->article_parent_reward, 0) ; 
                $this->m_enpei->update_share_article_attr($pid,$this->article_parent_reward) ;
                echo '发出人已经加了<br/>';
              }else{
                echo '超量了<br/>';
          }

            if (count($back_arr) <= 1 ) {
                return $return;  
            }
            // 存在爷爷级别
            for ($i = 0; $i < (($this->reward_class) - 1); $i++) {
                $article_add_value = 0;
                if ($i == 0) {
                  # 祖父收益
                  $article_add_value = $this->article_grand_reward;

                }else{
                  # 亲戚收益
                  $article_add_value = $this->article_relative_reward;
                }
                //更新父亲以上的亲属的文章分成纪录
                if ( $this->check_reward_is_permit($pid,$uid)  ) {

                  $this->m_enpei->update_share_single_child_user_profit($back_arr[$i+1], $back_arr[$i], $article_add_value , 0);
                  // 更新所有亲属的share_user_total_profit
                  $this->m_enpei->update_share_user_total_profit($back_arr[$i+1], $article_add_value, 0, 0);
                  $this->m_enpei->update_share_article_attr($pid,$article_add_value) ; 
                  echo '发出人的父亲加了<br/>';
                }else{
                  echo '超量了<br/>';
                }
                

                

            }

            echo "所有人抽成成功";


          }else{
            echo "系统不许加钱了";
          }
        


    }
    
    /**
     * 
     *  update_article_given
     *  检测是否允许赠送
     * 
     * 
     * 
     */
    private function check_reward_is_permit($pid='',$uid='')
    { 

        // 检测两方面
      // 1：文章允许
      // 2：个人允许
        $return = true;

        $data = $this->m_enpei->get_share_article_attr($pid); 
        $u_data = $this->m_enpei->get_single_article_user_profit($pid,$uid);

        
        // 文章超额
        if ( floatval($data['rewarded_money']) >= floatval($data['limit_total_price'])  ) {
          $return = false;
        }
        // 个人超额
        if ($u_data != NULL) {
          # code...
          if ( floatval($u_data['article_profit']) >=  floatval($data['limit_person_price'])) {
          # code...
              $return = false;
          }
        }
        

        return $return;
      
    }
    /**
     *  get_user_info
     *  获取用户信息
     *  @author leo
     *  @access public 
     *  @param $u_id = '',$open_id=''
     *  @since 1.0
     *  @return Array
     */
    public function get_user_info($u_id = '',$open_id='')
    {
      return $this->m_enpei->get_user_info($u_id,$open_id);
    }
    /**
     *  get_single_article_user_profit_data
     *  获取用户单篇文章收益信息
     *  @author leo
     *  @access public 
     *  @param $pid,$uid
     *  @since 1.0
     *  @return Array
     */
    public function get_single_article_user_profit_data($pid,$uid)
    {
      return $this->m_enpei->get_single_article_user_profit($pid,$uid);
    }
    /**
     *  get_invite_profit
     *  获取用户邀请收益信息
     *  @author leo
     *  @access public 
     *  @param $uid
     *  @since 1.0
     *  @return Array
     */
    public function get_invite_profit($uid)
    {
      return $this->m_enpei->get_invite_profit($uid);
    }
    /**
     *  get_user_hard_work
     *  获取用户邀请收益信息
     *  @author leo
     *  @access public 
     *  @param $uid
     *  @since 1.0
     *  @return Array
     */
    public function get_user_hard_work($uid)
    {
      return $this->m_enpei->get_user_hard_work($uid);
    }
    /**
     *  get_user_total_profit
     *  获取用户邀请收益信息
     *  @author leo
     *  @access public 
     *  @param $uid
     *  @since 1.0
     *  @return Array
     */
    public function get_user_total_profit($uid)
    {
      return $this->m_enpei->get_share_user_total_profit($uid);

    }
    /**
     * 
     *  ajax_read_detail
     *  AJAX更新阅读详情
     *  
     *  @author leo
     *  @access public
     *  @param NULL
     *  @since 1.0
     *  @return 1
     * 
     * 
     */
    public function ajax_read_detail()
    {
      $pid = $this->input->post('pid',TRUE);
      $uid = $this->input->post('uid',TRUE);
      $read_duration = $this->input->post('read_duration',TRUE);
      $to_bottom = $this->input->post('to_bottom',TRUE);
      $share_type = $this->input->post('share_type',TRUE);
      $u_lbs_x = $this->input->post('u_lbs_x',TRUE);
      $u_lbs_y = $this->input->post('u_lbs_y',TRUE);
      $u_address = $this->input->post('u_address',TRUE);

      // 更新成功即返回1

      if ( $this->m_enpei->update_article_read_detail($pid,$uid, $read_duration,$to_bottom,$share_type,$u_lbs_x,$u_lbs_y,$u_address) ) 
      {
        echo 1;
      }else{
        echo 0;
      }

      

    }



    /****
      获取用户站内信所用信息
      $uid:用户u_id
      返回数组
      数组中style：0代表未阅读，1代表已经阅读
     ******/
      public function get_web_cash_inform($uid){
        $return = $this->manage_model->get_web_cash_inform($uid);
        // var_dump($return);
        return $return;
        
      }
      /***
          更新用户站内信状态（已查看）
        **/
        public function up_web_cash_style($id){
           $return = $this->manage_model->up_web_cash_style($id);
           return $return;
          // var_dump($return);
        }



}

/* End of file share.php */
/* Location: ./application/controllers/share.php */