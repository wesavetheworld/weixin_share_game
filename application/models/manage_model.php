<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    /**
    * 
    */
    class Manage_model extends CI_Model{

      public function __construct(){
          $this->load->database();
          $this->load->helper('url');
      }
          
      public function login_admin($name,$pass){
        $this->db->select('*');
        $this->db->where('admin', $name);
        $this->db->where('admin_pass', $pass);
        $query = $this->db->get('share_admin');
        $date = count($query->result_array());
        if($date>0){
          return true;
        }else{
          return false;
        }

      }
      public function get_article($arid){
        $this->db->select('*');
        $this->db->where('ar_id', $arid);
        $query = $this->db->get('share_article');
        return $query->result_array();
      }
      public function add_article($article){
        $this->db->insert('share_article', $article); 
        return $this->db->insert_id();

      }
      public function all_article($thispage,$words){

        $limit=20;
        $first=($thispage-1)*20;
        $this->db->select('*');
        $this->db->from('share_article');
        if ($words!=-1) {
        $this->db->like('ar_title', $words); 
        }
        $this->db->order_by("ar_id", "DESC"); 
        $this->db->limit($limit,$first);
        $query = $this->db->get();
        $date = $query->result_array();
        return $date; 

      }
      public function dele_article($id){
        return $this->db->delete('share_article', array('ar_id' => $id)); 
      }
      public function up_article($style,$article_array){
        $this->db->where('ar_id', $style);
        return $this->db->update('share_article', $article_array);
      }
      public function find_article($id){
        $this->db->select('*');
        $this->db->where('ar_id', $id);
        $query = $this->db->get('share_article');
        return $query->result_array();
      }
      public function insert_applay_info($applay_info){
        return $this->db->insert('share_applay_cash', $applay_info); 
      }
      public function update_applay_info($u_id,$applay_info){
        $this->db->where('u_id', $u_id);
        $this->db->update('share_applay_cash', $applay_info);
      }
      public function get_applay_info($thispage,$words){
        $limit=20;
        $first=($thispage-1)*20;
        $this->db->select('*');
        $this->db->from('share_applay_cash');
        $this->db->where('style', 0);
        if ($words!=-1) {
        // $this->db->like('u_id', $words); 
        // $this->db->or_like('u_name', $words); 
        $this->db->like('u_tel', $words); 
        // $this->db->or_like('u_email', $words); 
        // $this->db->or_like('u_cash', $words);   
        }

        $this->db->limit($limit,$first);
        $query = $this->db->get();
        $date = $query->result_array();
        return $date; 
      }
      public function get_applay_ok($thispage,$words){
        $limit=20;
        $first=($thispage-1)*20;
        $this->db->select('*');
        $this->db->from('share_applay_cash');
        $this->db->where('style', 1);
        if ($words!=-1) {
        // $this->db->like('u_id', $words); 
        // $this->db->or_like('u_name', $words); 
        $this->db->like('u_tel', $words); 
        // $this->db->or_like('u_email', $words); 
        // $this->db->or_like('u_cash', $words);   
        }
        
        $this->db->limit($limit,$first);
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get();
        $date = $query->result_array();
        return $date; 
      }
      public function update_user_cash($id,$uid,$cash){

        $this->db->where('id', $id);
        $up_data = array('style' => 1);
        $return = $this->db->update('share_applay_cash', $up_data);
        return $return;

      }
      public function get_total_cash($u_id){
        $this->db->select('u_cash');
        $this->db->where('u_id', $u_id);
        $query = $this->db->get('share_applay_cash');
        $data = $query->result_array();
        foreach ($data as $key => $value) {
          return $value['u_cash'];
        }
      }
      public function get_total_item($words,$style){

        $this->db->select('*');
        $this->db->from('share_applay_cash');
        $this->db->where('style', $style);
        if ($words!=-1) { 
        $this->db->like('u_tel', $words); 
        }
        $query = $this->db->get();
        $date = $query->result_array();
        return $date; 
      }
      public function get_total_article($words){
        $this->db->select('*');
        $this->db->from('share_article');  
        if ($words!=-1) { 
        $this->db->like('ar_title', $words); 
        }
        $query = $this->db->get();
        $date = $query->result_array();
        return $date;
      }
      public function add_user($new_user){
        $this->db->insert('share_user', $new_user); 
        return $this->db->insert_id();
      }
      public function up_user_info($id,$up_user){
        $this->db->where('u_id', $id);
        return $this->db->update('share_user', $up_user);  
      }
      public function add_article_edit($data){
        $this->db->insert('page_edit', $new_user); 
        return $this->db->insert_id();
      }
      public function visual_add_article($article_array){
       return $this->db->insert('share_article', $article_array); 
        
      }
      public function web_cash_inform($data){
        $this->db->insert('share_cash_ok', $data); 
        return $this->db->insert_id();
      }
      public function get_web_cash_inform($uid){
        $this->db->select('*');
        $this->db->from('share_cash_ok');  
        $this->db->where('u_id', $uid);
        $query = $this->db->get();
        $date = $query->result_array();
        return $date;

      }
      public function up_web_cash_style($id){
        $this->db->where('id', $id);
        $update = array('style' => 1, );
        return $this->db->update('share_cash_ok', $update);
      }



    }
  

?>
