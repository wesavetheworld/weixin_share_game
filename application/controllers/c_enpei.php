<?php
class C_enpei extends CI_Controller {

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
     * 构造方法
     */
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_enpei');
    }
    /**
     * 默认方法
     */
    public function index() {


       
    }
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


    
  
    
}

