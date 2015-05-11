<?php
if (!defined('BASEPATH')) {
    die('No direct script access allowed');
}
/**
 * 
 */
class M_enpei extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    /**
     *  register_reward 
     *  注册奖励
     * 
     *  @author leo
     *  @access public
     *  @param int $uid 用户ID
     *  @since 1.0
     *  @return bool(true成功注册)
     * 
     */
    public function register_reward($uid, $reg_reward)
    {
        $return = false;
        $time = time();
        $encrypt_code = $this->encrypt_code($reg_reward, $time);
        $data = array(
          'uid' => $uid, 
          'child_total_profit' => $this->encrypt_code(0, $time),  #初始化为0
          'article_total_profit' => $this->encrypt_code(0, $time), 
          'reg_reward' => $encrypt_code, 
          'withdraw_profit' => $this->encrypt_code(0, $time), 
          'total_profit' => $encrypt_code, 
          'unix_time' => $time
          );
        $this->db->insert('share_user_total_profit', $data);
        $return = true;
        return $return;
    }
    /**
     *  encrypt_code
     *  加密
     *  
     *  @author leo
     *  @access private
     *  @param float $num 浮点数字
     *  @param int $time unix时间值
     *  @since 1.0
     *  @return String 返回加密后的字符
     */
    private function encrypt_code($num, $time)
    {
        if ($num < 0 || !is_numeric($num)) {
            # code...
            return;
        }
        // 保留两位小数
        $new_num = $time + sprintf('%.2f', $num);
        $str = $time . '';
        $str = substr($str, -2);
        $str = intval($str);
        $str = $str % 2 + 1;
        for ($i = 0; $i < $str; $i++) {
            # code...
            $new_num = base64_encode($new_num);
        }
        return $new_num;
    }
    /**
     *  decode
     *  加密
     *  
     *  @author leo
     *  @access private
     *  @param String $code 加密数值
     *  @param int $time unix时间值
     *  @since 1.0
     *  @return float $num 浮点数字
     */
    private function decode($code, $time)
    {
        # code...
        if ($time < 0 || !is_numeric($time)) {
            # code...
            return;
        }
        $new_num = $code;
        $str = $time . '';
        $str = substr($str, -2);
        $str = intval($str);
        $str = $str % 2 + 1;
        for ($i = 0; $i < $str; $i++) {
            # code...
            $new_num = base64_decode($new_num);
        }
        $new_num = $new_num - $time;
        return sprintf('%.2f', $new_num);
    }
    /**
     *  insert_new_tree
     *  插入新树
     *  
     *  @author leo
     *  @access public
     *  @param int $uid
     *  @param String $id_tree
     *  @since 1.0
     *  @return bool(true)
     *
     */
    public function insert_new_tree($uid = '', $id_tree = '')
    {
        $return = false;
        $data = array('uid' => $uid, 'id_tree' => $id_tree);
        $this->db->insert('share_user_tree', $data);
        $return = true;
        return $return;
    }
    /**
     * check_user_registered
     * 根据open_id判断用户是否注册过
     *
     * @author leo 
     * @access public
     * @param int $open_id  该用户对于微信的open_id 
     * @since 1.0
     * @return bool (true注册了，false未注册)
     *
     */
    public function check_user_registered($open_id = '')
    {
        # code...
        $this->db->select('u_id');
        $this->db->where('open_id', $open_id);
        $query = $this->db->get('share_user');
        foreach ($query->result() as $row) {

            return $row->u_id;
            
        }
    }
    /**
     *
     * register_new_user
     * 根据用户信息注册新用户
     * 
     * @author leo
     * @access public
     * @param Array $user_info 用户的信息数组
     * @since 1.0
     * @return int (uid) 返回注册成功的用户ID
     */
    public function register_new_user($user_info)
    {
        # code...
        $data = array(
            'grand_id' => $user_info['grand_id'], 
            'open_id' => $user_info['open_id'], 
            'u_name' => $user_info['u_name'], 
            'u_pass' => $user_info['u_pass'], 
            'u_email' => $user_info['u_email'],
            'u_tel' => $user_info['u_tel'],
            'session_id' => $user_info['session_id'],
            'ip_address' => $user_info['ip_address'],
            'user_agent' => $user_info['user_agent'],
            'u_total_cash' => $user_info['u_total_cash'],
            'last_activity' => $user_info['last_activity'],
            'subscribe' => $user_info['subscribe'],
            'sex' => $user_info['sex'],
            'language' => $user_info['language'],
            'city' => $user_info['city'],
            'province' => $user_info['province'],
            'country' => $user_info['country'],
            'headimgurl' => $user_info['headimgurl']
            );
        $this->db->insert('share_user', $data);
        $this->db->select('u_id');
        $this->db->where('open_id', $user_info['open_id']);
        $query = $this->db->get('share_user');
        foreach ($query->result() as $row) {
            if ($row->u_id != null) {
                # code...
                return $row->u_id;
            }
        }
    }
    /**
     *  update_user_grand_id
     *  更新祖父ID
     *
     *  @author leo
     *  @access public
     *  @param $u_id,$grand_id
     *  @since 1.0
     *  @return bool(true成功插入)
     */
    public function update_user_grand_id($u_id,$grand_id)
    {
        $return = false;
        $data = array(
          'grand_id' => $grand_id
          );
        
        $this->db->where('u_id', $u_id);
        $this->db->update('share_user', $data);
        $return = true;
        return $return;
    }
    /**
     * get_user_info
     * 取出多叉树的数据
     *
     * @author leo
     * @access public
     * @param int $u_id = '',$open_id=''
     * @since 1.0
     * @return Array 用户数据
     *
     */
    public function get_user_info($u_id = '',$open_id='')
    {   
        
        $this->db->select('u_id,grand_id,open_id,u_name,u_pass,u_email,u_tel,session_id,ip_address,user_agent,last_activity,subscribe,sex,language,city,province,country,headimgurl,time');

        if ($u_id != '') {
            $this->db->where('u_id', $u_id);
        }elseif ($open_id != '') {
            $this->db->where('open_id', $open_id);
        }
        $query = $this->db->get('share_user');

        $return_data = array( );
        foreach ($query->result() as $row) {
            $return_data['u_id'] = $row->u_id;
            $return_data['grand_id'] = $row->grand_id;
            $return_data['open_id'] = $row->open_id;
            $return_data['u_name'] = $row->u_name;
            $return_data['u_pass'] = $row->u_pass;
            $return_data['u_email'] = $row->u_email;
            $return_data['u_tel'] = $row->u_tel;
            $return_data['session_id'] = $row->session_id;
            $return_data['ip_address'] = $row->ip_address;
            $return_data['user_agent'] = $row->user_agent;
            $return_data['last_activity'] = $row->last_activity;
            $return_data['subscribe'] = $row->subscribe;
            $return_data['sex'] = $row->sex;
            $return_data['language'] = $row->language;
            $return_data['city'] = $row->city;
            $return_data['province'] = $row->province;
            $return_data['country'] = $row->country;
            $return_data['headimgurl'] = $row->headimgurl;
            $return_data['time'] = $row->time;
        }
        return $return_data;

    }

    /**
     * get_tree_data
     * 取出多叉树的数据
     *
     * @author leo
     * @access public
     * @param int $grand_id  祖用户ID
     * @since 1.0
     * @return String 返回存进数据库的多叉树数据（JSON结构）
     *
     */
    public function get_tree_data($grand_id = '')
    {
        $this->db->select('id_tree');
        $this->db->where('uid', $grand_id);
        $query = $this->db->get('share_user_tree');
        foreach ($query->result() as $row) {
            return $row->id_tree;
        }
    }
    /**
     *  update_tree_data
     *  重新写进多叉树数据
     *
     *  @author leo
     *  @access public
     *  @param int $grand_id  祖用户ID
     *  @param String $new_data 新数据
     *  @since 1.0
     *  @return bool(true成功插入)
     */
    public function update_tree_data($grand_id = '', $new_data = '')
    {
        $return = false;
        $data = array('id_tree' => $new_data);
        $this->db->where('uid', $grand_id);
        $this->db->update('share_user_tree', $data);
        $return = true;
        return $return;
    }
    /**
     *  insert_share_single_child_user_profit
     *  插入用户邀请收益表（邀请人分成、邀请人业绩分成）
     * 
     *  @author leo 
     *  @access public
     *  @param int $farther_id
     *  @param int $uid
     *  @since 1.0
     *  @return bool
     */
    public function insert_share_single_child_user_profit($farther_id, $uid, $farther_reward)
    {
        $return = false;
        $time = time();
        $encrypt_code = $this->encrypt_code(0, $time);
        $data = array(
          'uid' => $farther_id, 
          'first_child_uid' => $uid, 
          'child_article_profit' => $encrypt_code, 
          'child_invite_profit' => $this->encrypt_code($farther_reward, $time),
          'unix_time' => $time
          );
        $this->db->insert('share_single_child_user_profit', $data);
        $return = true;
        return $return;
    }
    /**
     *  update_share_single_child_user_profit
     *  更新用户邀请收益表（邀请人分成、邀请人业绩分成）
     * 
     *  @author leo 
     *  @access public
     *  @param int $farther_id
     *  @param int $uid
     *  @param float $add_value 所要增长值
     *  @since 1.0
     *  @return bool
     */
    public function update_share_single_child_user_profit($farther_id, $uid, $article_add_value, $invite_add_value)
    {
        //首先要获取原有数据(已经解密)
        $former_data = $this->get_share_single_child_user_profit($farther_id, $uid);

        // 再次做加法
        $id = $former_data['id'];
        $new_child_article_profit = $former_data['child_article_profit'] + $article_add_value;
        $new_child_invite_profit = $former_data['child_invite_profit'] + $invite_add_value;

        // 再次加密
        $time = time();
        
        $data = array(
          'child_article_profit' => $this->encrypt_code($new_child_article_profit, $time), 
          'child_invite_profit' => $this->encrypt_code($new_child_invite_profit, $time), 
          'unix_time' => $time
          );
        // 更新数据
        $this->db->where('id', $id);
        $this->db->update('share_single_child_user_profit', $data);
        $return = true;
        return $return;
    }
    /**
     *  get_share_single_child_user_profit
     *  获取用户邀请收益表（邀请人分成、邀请人业绩分成）
     * 
     *  @author leo 
     *  @access public
     *  @param int $farther_id
     *  @param int $uid
     *  @since 1.0
     *  @return Array 已解密
     */
    public function get_share_single_child_user_profit($farther_id, $uid)
    {
        $this->db->select('id,child_article_profit,child_invite_profit,unix_time');
        $this->db->where('uid', $farther_id);
        $this->db->where('first_child_uid', $uid);
        $return_data = array();
        $query = $this->db->get('share_single_child_user_profit');
        foreach ($query->result() as $row) {
            // 解密
            $return_data['id'] = $row->id;
            $return_data['child_article_profit'] = $this->decode( $row->child_article_profit, $row->unix_time );
            $return_data['child_invite_profit'] = $this->decode( $row->child_invite_profit, $row->unix_time );
        }

        return $return_data;
    }


    /**
     *  get_invite_profit
     *  获取用户邀请收益表（邀请人分成、邀请人业绩分成）
     * 
     *  @author leo 
     *  @access public
     *  @param int $farther_id
     *  @param int $uid
     *  @since 1.0
     *  @return Array 已解密
     */
    public function get_invite_profit($uid)
    {
        $this->db->select('first_child_uid,child_article_profit,child_invite_profit,unix_time');
        $this->db->where('uid', $uid);
        $return_data = array();
        $query = $this->db->get('share_single_child_user_profit');
        $i=0;
        foreach ($query->result() as $row) {
            // 解密
            $u_data = $this->get_user_info( $row->first_child_uid,''); 
            $return_data[$i]['child_name'] = $u_data['u_name'];
            $return_data[$i]['headimgurl'] = $u_data['headimgurl'];

            $return_data[$i]['child_profit'] = ($this->decode( $row->child_article_profit, $row->unix_time )) + ($this->decode( $row->child_invite_profit, $row->unix_time ));
            $return_data[$i]['time'] = $row->unix_time;
            

            $i++;
        }

        return $return_data;
    }

    /**
     *  get_user_hard_work
     *  获取用户辛苦钱
     * 
     *  @author leo 
     *  @access public
     *  @param int $farther_id
     *  @param int $uid
     *  @since 1.0
     *  @return Array 已解密
     */
    public function get_user_hard_work($uid)
    {
        $this->db->select('pid,article_profit,unix_time,time');
        // $this->db->where('pid', $pid);
        $this->db->where('uid', $uid);
        $return_data = array();
        $query = $this->db->get('single_article_user_profit');
        $i=0;
        foreach ($query->result() as $row) {
            // 解密
            $a_data = $this->get_share_article_detail($row->pid);
            $return_data[$i]['title'] = $a_data['ar_title'];
            $return_data[$i]['ar_author_pic'] = $a_data['ar_author_pic'];
            $return_data[$i]['article_profit'] = $this->decode( $row->article_profit, $row->unix_time );
            $return_data[$i]['time'] = $row->unix_time;
            
        }

        return $return_data;
    }

    /**
     *  get_share_article_detail
     *  获取用户辛苦钱
     * 
     *  @author leo 
     *  @access public
     *  @param int $farther_id
     *  @param int $uid
     *  @since 1.0
     *  @return Array 已解密
     */
    public function get_share_article_detail($ar_id)
    {
        $this->db->select('ar_title,ar_content,ar_author,ar_author_pic,time');
        // $this->db->where('pid', $pid);
        $this->db->where('ar_id', $ar_id);
        $return_data = array();
        $query = $this->db->get('share_article');
        
        foreach ($query->result() as $row) {
            // 解密
            $return_data['ar_title'] = $row->ar_title;
            $return_data['ar_content'] = $row->ar_content;
            $return_data['ar_author'] = $row->ar_author;
            $return_data['ar_author_pic'] = $row->ar_author_pic;
            $return_data['time'] = $row->time;
            
        }

        return $return_data;
    }





    /**
     *  update_share_user_total_profit
     *  更新用户邀请收益表（邀请人分成、邀请人业绩分成）
     * 
     *  @author leo 
     *  @access public
     *  @param int $uid
     *  @param float $child_total_profit_add 所要增长值
     *  @param float $article_total_profit_add 所要增长值
     *  @param float $reg_reward_add 所要增长值
     *  @since 1.0
     *  @return bool
     */
    public function update_share_user_total_profit($uid, $child_total_profit_add, $article_total_profit_add,$reg_reward_add)
    {
        //首先要获取原有数据(已经解密)
        $former_data = $this->get_share_user_total_profit($uid);
        // 再次做加法
        $id = $former_data['id'];
        $new_child_total_profit = $former_data['child_total_profit'] + $child_total_profit_add;
        $new_article_total_profit = $former_data['article_total_profit'] + $article_total_profit_add;
        $new_reg_reward = $former_data['reg_reward'] + $reg_reward_add;

        $new_total_profit = $new_child_total_profit + $new_article_total_profit + $new_reg_reward ;

        // 再次加密
        $time = time();
        
        $data = array(
          'child_total_profit' => $this->encrypt_code($new_child_total_profit, $time), 
          'article_total_profit' => $this->encrypt_code($new_article_total_profit, $time), 
          'reg_reward' => $this->encrypt_code($new_reg_reward, $time), 
          'total_profit' => $this->encrypt_code($new_total_profit, $time), 
          'unix_time' => $time
          );
        // 更新数据
        $this->db->where('id', $id);
        $this->db->update('share_user_total_profit', $data);
        $return = true;
        return $return;
    }


    /**
     *  update_withdraw_profit
     *  更新用户邀请收益表（邀请人分成、邀请人业绩分成）
     * 
     *  @author leo 
     *  @access public
     *  @param int $uid
     *  @param float $child_total_profit_add 所要增长值
     *  @param float $article_total_profit_add 所要增长值
     *  @param float $reg_reward_add 所要增长值
     *  @since 1.0
     *  @return bool
     */
    public function update_withdraw_profit($uid, $withdraw_profit_get)
    {
        //首先要获取原有数据(已经解密)
        $former_data = $this->get_share_user_total_profit($uid);
        $id = $former_data['id'];
        // 其他值原封不动
        $new_child_total_profit = $former_data['child_total_profit'] ;
        $new_article_total_profit = $former_data['article_total_profit'];
        $new_reg_reward = $former_data['reg_reward'] ;

        $new_withdraw_profit = $former_data['withdraw_profit'] + $withdraw_profit_get;        

        $new_total_profit = $new_child_total_profit + $new_article_total_profit + $new_reg_reward - $new_withdraw_profit ;

        // 再次加密
        $time = time();
        
        $data = array(
          'child_total_profit' => $this->encrypt_code($new_child_total_profit, $time), 
          'article_total_profit' => $this->encrypt_code($new_article_total_profit, $time), 
          'reg_reward' => $this->encrypt_code($new_reg_reward, $time), 
          'withdraw_profit' => $this->encrypt_code($new_withdraw_profit, $time), 
          'total_profit' => $this->encrypt_code($new_total_profit, $time), 
          'unix_time' => $time
          );
        // 更新数据
        $this->db->where('id', $id);
        $this->db->update('share_user_total_profit', $data);
        $return = true;
        return $return;
    }

    

    /**
     *  get_share_user_total_profit
     *  户利润表
     * 
     *  @author leo 
     *  @access public
     *  @param int $uid
     *  @since 1.0
     *  @return Array 已解密
     */
    public function get_share_user_total_profit($uid)
    {
        $this->db->select('id,child_total_profit,article_total_profit,reg_reward,withdraw_profit,total_profit,unix_time');
        $this->db->where('uid', $uid);
        $return_data = array();
        $query = $this->db->get('share_user_total_profit');
        foreach ($query->result() as $row) {
            // 解密
            $return_data['id'] = $row->id;
            $return_data['child_total_profit'] = $this->decode( $row->child_total_profit, $row->unix_time );
            $return_data['article_total_profit'] = $this->decode( $row->article_total_profit, $row->unix_time );
            $return_data['reg_reward'] = $this->decode( $row->reg_reward, $row->unix_time );
            $return_data['withdraw_profit'] = $this->decode( $row->withdraw_profit, $row->unix_time );
            $return_data['total_profit'] = $this->decode( $row->total_profit, $row->unix_time );
        }

        return $return_data;
    }
    /**
     *  check_user_read_detail
     *  将文章的阅读详情取出
     *  @author leo
     *  @access public
     *  @param int $pid   文章ID
     *  @param int $uid   用户UID
     *  @since 1.0
     *  @return Array 返回文章详情
     * 
     */
    public function check_user_read_detail($pid,$uid)
    {
        $this->db->select('id,uip,read_duration,to_bottom,share_type,u_lbs_x,u_lbs_y,u_address,time');
        $this->db->where('pid', $pid);
        $this->db->where('uid', $uid);
        $return_data = array();
        $query = $this->db->get('article_read_detail');
        foreach ($query->result() as $row) {
            $return_data['id'] = $row->id;
            $return_data['uip'] = $row->uip;
            $return_data['read_duration'] = $row->read_duration;
            $return_data['to_bottom'] = $row->to_bottom;
            $return_data['share_type'] = $row->share_type;
            $return_data['u_lbs_x'] = $row->u_lbs_x;
            $return_data['u_lbs_y'] = $row->u_lbs_y;
            $return_data['u_address'] = $row->u_address;
            $return_data['time'] = $row->time;
        }

        return $return_data;

    }
    /**
     *  insert_user_read_deatail
     *  新增用户阅读详情
     *  
     *  @author leo
     *  @access public
     *  @param  mixed  $pid,$uid,$uip,$read_duration,$to_bottom,$share_type,$u_lbs,$u_address,$time  用户详情
     *  @since 1.0
     *  @return bool 插入成功
     * 
     */
    public function insert_user_read_deatail($pid,$uid,$uip,$read_duration,$to_bottom,$share_type,$u_lbs_x,$u_lbs_y,$u_address)
    {
        $return = false;
        $data = array(
          'pid' => $pid, 
          'uid' => $uid, 
          'uip' => $uip, 
          'read_duration' => $read_duration,
          'to_bottom' => $to_bottom ,
          'share_type' => $share_type ,
          'u_lbs_x' => $u_lbs_x ,
          'u_lbs_y' => $u_lbs_y ,
          'u_address' => $u_address 
          
          );
        $this->db->insert('article_read_detail', $data);
        $return = true;
        return $return;
    }
    /**
     *  update_article_read_detail
     *  更新多叉树
     *
     *  @author leo
     *  @access public
     *  @param $pid,$uid,$uip,$read_duration,$to_bottom,$share_type,$u_lbs,$u_address
     *  @since 1.0
     *  @return bool(true成功插入)
     */
    public function update_article_read_detail($pid,$uid, $read_duration,$to_bottom,$share_type,$u_lbs_x,$u_lbs_y,$u_address)
    {
        $return = false;
        $data = array(
          'read_duration' => $read_duration,
          'to_bottom' => $to_bottom ,
          // 'share_type' => $share_type ,
          'u_lbs_x' => $u_lbs_x ,
          'u_lbs_y' => $u_lbs_y ,
          'u_address' => $u_address 
          
          );

        $this->db->where('pid', $pid);
        $this->db->where('uid', $uid);
        $this->db->update('article_read_detail', $data);
        $return = true;
        return $return;
    }


    /**
     *  update_article_share_type
     *  更新多叉树
     *
     *  @author leo
     *  @access public
     *  @param $pid,$uid,$uip,$read_duration,$to_bottom,$share_type,$u_lbs,$u_address
     *  @since 1.0
     *  @return bool(true成功插入)
     */
    public function update_article_share_type($pid,$uid, $share_type)
    {
        $return = false;
        $data = array(
          'share_type' => $share_type 
          );

        $this->db->where('pid', $pid);
        $this->db->where('uid', $uid);
        $this->db->update('article_read_detail', $data);
        $return = true;
        return $return;
    }



    /**
     *  add_article_pv
     *  更新文章PV  
     *  @author leo
     *  @access public
     *  @param int $pid
     *  @since 1.0
     *  @return bool
     */
    public function add_article_pv($pid)
    {
        $return = false;

        $this->db->set('pv', 'pv+1', FALSE);
        $this->db->where('pid', $pid);
        $this->db->update('share_article_attr');

        $return = true;
        return $return;
    }
    /**
     *  get_single_article_user_profit
     *  将文章的阅读详情取出
     *  @author leo
     *  @access public
     *  @param int $pid   文章ID
     *  @param int $uid   用户UID
     *  @since 1.0
     *  @return Array 收益详情
     * 
     */
    public function get_single_article_user_profit($pid,$uid)
    {
        $this->db->select('id,article_profit,unix_time,time');
        $this->db->where('pid', $pid);
        $this->db->where('uid', $uid);
        $return_data = array();
        $query = $this->db->get('single_article_user_profit');
        foreach ($query->result() as $row) {
            // 解密
            $return_data['id'] = $row->id;
            $return_data['article_profit'] = $this->decode( $row->article_profit, $row->unix_time );
            $return_data['time'] = $row->time;
            
        }

        return $return_data;

    }
    /**
     *  insert_single_article_user_profit
     *  新增用户阅读详情
     *  
     *  @author leo
     *  @access public
     *  @param  mixed  $pid,$uid 用户详情
     *  @since 1.0
     *  @return bool 插入成功
     * 
     */
    public function insert_single_article_user_profit($pid,$uid)
    {
        $return = false;
        $time = time();
        $encrypt_code = $this->encrypt_code(0, $time);
        $data = array(
          'pid' => $pid, 
          'uid' => $uid, 
          'article_profit' => $encrypt_code,  #初始化为0
          'unix_time' => $time
          );
        $this->db->insert('single_article_user_profit', $data);
        $return = true;
        return $return;
    }

    /**
     *  update_single_article_user_profit
     *  更新用户邀请收益表（邀请人分成、邀请人业绩分成）
     * 
     *  @author leo 
     *  @access public
     *  @param $pid,$uid, $article_profit_add
     *  @since 1.0
     *  @return bool
     */
    public function update_single_article_user_profit($pid,$uid, $article_profit_add)
    { 
        //首先要获取原有数据(已经解密)
        $return = false;
        $former_data = $this->get_single_article_user_profit($pid,$uid);
        if ($former_data == NULL) {
          # code...
          return $return;
        }
        $id = $former_data['id'];
        // 再次做加法
        $new_article_profit = $former_data['article_profit'] + $article_profit_add;

        // 再次加密
        $time = time();
        
        $data = array(
          'article_profit' => $this->encrypt_code($new_article_profit, $time), 
          'unix_time' => $time
          );
        // 更新数据
        $this->db->where('id', $id);
        $this->db->update('single_article_user_profit', $data);
        $return = true;
        return $return;
    }


    /**
     *  get_share_article_attr
     *  将文章属性取出
     *  @author leo
     *  @access public
     *  @param int $pid   文章ID
     *  @since 1.0
     *  @return Array 文章属性
     * 
     */
    public function get_share_article_attr($pid)
    {
        $this->db->select('id,pv,limit_total_price,limit_person_price,rewarded_money,unix_time,time');
        $this->db->where('pid', $pid);
        $return_data = array();
        $query = $this->db->get('share_article_attr');
        foreach ($query->result() as $row) {
            // 解密
            $return_data['id'] = $row->id;
            $return_data['pv'] = $row->pv;
            $return_data['limit_total_price'] = $this->decode( $row->limit_total_price, $row->unix_time );
            $return_data['limit_person_price'] = $this->decode( $row->limit_person_price, $row->unix_time );
            $return_data['rewarded_money'] = $this->decode( $row->rewarded_money, $row->unix_time );
            $return_data['time'] = $row->time;
            
        }

        return $return_data;

    }
    /**
     *  insert_share_article_attr
     *  插入用户邀请收益表（邀请人分成、邀请人业绩分成）
     * 
     *  @author leo 
     *  @access public
     *  @param $pid, $limit_total_price, $limit_person_price,$rewarded_money
     *  @since 1.0
     *  @return bool
     */
    public function insert_share_article_attr($pid, $limit_total_price, $limit_person_price)
    {
        $return = false;
        $time = time();

        $data = array(
          'pid' => $pid, 
          'limit_total_price' => $this->encrypt_code($limit_total_price, $time),
          'limit_person_price' => $this->encrypt_code($limit_person_price, $time),
          'rewarded_money' => $this->encrypt_code(0, $time),
          'unix_time' => $time 
          );

        $this->db->insert('share_article_attr', $data);
        $return = true;
        return $return;
    }

    /**
     *  update_share_article_attr
     *  更新用户邀请收益表（邀请人分成、邀请人业绩分成）
     * 
     *  @author leo 
     *  @access public
     *  @param $pid,$uid, $article_profit_add
     *  @since 1.0
     *  @return bool
     */
    public function update_share_article_attr($pid,$rewarded_money_add)
    {
        //首先要获取原有数据(已经解密)
        $former_data = $this->get_share_article_attr($pid);
        $id = $former_data['id'];
        // 再次做加法

        $new_limit_total_price = $former_data['limit_total_price'] ;
        $new_limit_person_price = $former_data['limit_person_price'];
        $new_rewarded_money = $former_data['rewarded_money'] + $rewarded_money_add;

        // 再次加密
        $time = time();
        
        $data = array(
          'limit_total_price' => $this->encrypt_code($new_limit_total_price, $time), 
          'limit_person_price' => $this->encrypt_code($new_limit_person_price, $time), 
          'rewarded_money' => $this->encrypt_code($new_rewarded_money, $time), 
          'unix_time' => $time
          );
        // 更新数据
        $this->db->where('id', $id);
        $this->db->update('share_article_attr', $data);
        $return = true;
        return $return;
    }

    /**
     *  update_article_limit
     *  更新文章限制
     * 
     *  @author leo 
     *  @access public
     *  @param $pid,$new_limit_total_price,$new_limit_person_price
     *  @since 1.0
     *  @return bool
     */
    public function update_article_limit($pid,$new_limit_total_price,$new_limit_person_price)
    {
        //首先要获取原有数据(已经解密)
        $former_data = $this->get_share_article_attr($pid);
        $id = $former_data['id'];
        
        $new_rewarded_money = $former_data['rewarded_money'];

        // 再次加密
        $time = time();
        
        $data = array(
          'limit_total_price' => $this->encrypt_code($new_limit_total_price, $time), 
          'limit_person_price' => $this->encrypt_code($new_limit_person_price, $time), 
          'rewarded_money' => $this->encrypt_code($new_rewarded_money, $time), 
          'unix_time' => $time
          );
        // 更新数据
        $this->db->where('id', $id);
        $this->db->update('share_article_attr', $data);
        $return = true;
        return $return;
    }
    /**
     *  delete_article_attr
     *  删除文章属性
     * 
     * 
     * 
     */
    public function delete_article_attr($pid)
    {
        $this->db->where('pid',$pid);
        $this->db->delete('share_article_attr');

    }


}