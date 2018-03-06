<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Header_model extends CI_Model
{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    //chenge password
    public function changePassword2($passwordIn ,$hiddenSessionId){
    	$this->db->where('id', $hiddenSessionId);
        $this->db->like('password', $passwordIn);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return $query->row();
        }else{return false;}
    }
    public function changePassword3($passwordNewCon, $id){
    	$field = array(
			'password' => $passwordNewCon
		);	
		$this->db->where('id',$id);
		$this->db->update('users', $field);

		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
    }
    //change password end


    //menu submenu create
    public function menuCreate($menus){
    	$this->db->insert('menu',$menus);
    }
    public function selectMenu(){
        $this->db->select('*');
		$this->db->from('menu');
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $query->result();
		}else{
			return FALSE;
		}
    }
    public function subMenuCreate($menus){
    	$this->db->insert('menu',$menus);
    }
    public function selectMenuheader(){
        $this->db->select('*');
		$this->db->from('menu');
        $this->db->order_by('id', 'desc');
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			return $query->result();
		}else{
			return FALSE;
		}
    }
    public function selectMenuheader2($id){
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->where('menuid',$id);
        $query = $this->db->get();
        if ($query->num_rows()>0) {
            return $query->result();
        }else{
            return FALSE;
        }
    }//menu submenu create end


    public function selectlastuser(){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by('id','desc');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows()>0) {
            return $query->result();
        }else{
            return FALSE;
        }
    }//user last insert user id


    public function userlistAll(){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows()>0) {
            return $query->result();
        }else{
            return FALSE;
        }
    }
    public function record_count() {
        return $this->db->count_all("products");
    }
    public function fetch_products($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->join('product', 'products.proid = product.proid');
        $this->db->order_by("products.id",'desc');
        $query = $this->db->get("products");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }

}