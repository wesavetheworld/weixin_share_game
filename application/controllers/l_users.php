<?php
class L_users extends CI_Controller {

	function __construct(){
	 parent::__construct();
	 $this->load->helper('url');
	 $this->load->library('session');

	}

	/**
	 *p判断是否是微信浏览器
	 *
	 *@param $open 浏览器控制开关 	
	 *$open=true 是开启浏览器判断 
	 *$open默认值为false;
	 */
	public function weixin_agent($open){
		$open = isset($open)? $open : false;
		if ($open==1) {
			$user_agent = $_SERVER['HTTP_USER_AGENT'];
	    	if (strpos($user_agent, 'MicroMessenger') === false) {
	    		header("Content-type: text/html; charset=utf-8");
				echo "本页面仅支持微信访问!非微信浏览器禁止浏览!";
				exit;
	    	}	
		}

	}
	public function index(){
		$this->weixin_agent(true);
		$this->user_login();

	}

	//进入详情页
	public function task_detail(){

			$this->user_login();
	}

   //判断用户是否登录
    public function user_login()
    {
    	$openid =$this->session->userdata('openid');
    	if(isset($_COOKIE["user_oauth2_openid"])){
    		//成功登录
    		$userinfo =$this->session->all_userdata();
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
    		var_dump($userinfo);
    	}else{
    		$this->get_userinfo();
    	};
    }
   public function get_userinfo(){
   	  		//获取用户地址位置
   	  		// $this->session=>
   	  		// $newdata['user_coord']=
   	  		$url ="http://share.kejixi.com/index.php/l_users";				
   	  		if (isset($_GET['code'])) {
   	  		    // $userinfo = $this->oauth2($authurl);
   	  			$appid='wxac9d1f78dad30aab';
   	  			$appsecret ='67d99256d328af101fc375a3456668ce';
   	   		    $userinfo =$this->oauth2($_GET['code'],$appid,$appsecret);
   	  		    if (empty($userinfo)) {
   	  		        echo'授权失败!';
   	  		    }else{
   	  		    	$this->session->set_userdata($userinfo);
   	  		    	$h_url = "http://share.kejixi.com/index.php/l_users";
   	  		    	header("location:$h_url");
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
        setcookie("user_oauth2_headimgurl", $headimgurl, time() + 60 * 1);
        setcookie("user_oauth2_nickname", $nickname, time() + 60 * 1);
        setcookie("user_oauth2_openid", $from_user, time() + 60 * 1);
        return $info;
    }
}