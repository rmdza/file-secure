<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Module_model extends CI_Model {

    private $table = 'tbl_modules';

    function __construct() {
        
        parent::__construct();

        $this->load->database();
    }

    function get_menu_header() {

        $modules = $this->session->userdata('modules');
        $this->db->where("module_id IN ({$modules})");
        $this->db->where('secondLvl', 0);
        $this->db->order_by('module_id', 'ASC');
        $qry = $this->db->get($this->table);

        return $qry->result();

    }

    function get_submenu_header($firstLvl) {

        $modules = $this->session->userdata('modules');
        $this->db->where("module_id IN ({$modules})");
        $this->db->where('firstLvl', $firstLvl);
        $this->db->where('hasSubMenu', 0);
        $this->db->order_by('secondLvl', 'ASC');
        $qry = $this->db->get($this->table);

        return $qry->result();

    }

}