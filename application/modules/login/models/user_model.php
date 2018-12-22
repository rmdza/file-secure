<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	private $table = "tbl_users";

	function __construct() {

		parent::__construct();

		$this->load->database();

	}

	function get_users($params = NULL) {
		
		if (!is_null($params))
			$qry = $this->db->get_where($this->table, $params);
		else 
			$qry = $this->db->get($this->table);

		return $qry->result();

	}

	function validate_user($params) {

		$qry = $this->db->get_where($this->table, $params);

		return $qry->num_rows() > 0 ? $qry->row() : FALSE;

	}

	function get_user_details($params) {

		$this->db->select('users.user_id,users.username,roles.roleName,roles.modules,clusters.clusterName,roles.role_id,clusters.cluster_id,roles.roleDesc');
		$this->db->from($this->table.' AS users');
		$this->db->join('tbl_clusters AS clusters', 'clusters.cluster_id = users.cluster_id', 'inner');
		$this->db->join('tbl_roles AS roles', 'roles.role_id = users.role_id', 'inner');
		$this->db->where($params);
		$qry = $this->db->get();

		return $qry->num_rows() > 0 ? $qry->row() : FALSE;

	}

	function create_user($params) {

		$this->db->insert($this->table, $params);

		return $this->db->affected_rows() > 0 ? $this->db->insert_id() : FALSE;
		
	}

	public function update_user($update, $where) {

		$this->db->update($this->table, $update, $where);
		
		return $this->db->affected_rows() > 0 ? TRUE : FALSE;

	}

	function log_err_msg($params) {

		if ($this->db->insert('tbl_userLogs', $params))
			return $this->db->insert_id();
		
		return 0;
		
	}

}