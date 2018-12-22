<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
    
        parent::__construct();
    }


    public function index() {

        $data['page'] = 'dashboard';

        // Data for navigation
        $data['nav']['menu'] = 'dashboard';
        
        $this->load->view('index', $data);

    }


}