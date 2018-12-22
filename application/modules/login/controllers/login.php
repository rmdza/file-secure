<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {

		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load model
		$this->load->model('user_model', 'user');


	}

	public function index() { redirect('login/auth'); }

	private function render_view($view = 'login', $data = NULL, $asData = FALSE) {

		$this->load->view('header');
		$this->load->view($view, $data, $asData);
		$this->load->view('footer');

	}

	private function set_session($user) {

		$session = array(
			'userId' => $user->user_id,
			'name' => $user->username,
			'role' => $user->role_id,
			'roleName' => $user->roleName,
			'roleDesc' => $user->roleDesc,
			'cluster' => $user->cluster_id,
			'clusterName' => $user->clusterName,
			'modules' => $user->modules,
			'isLoggedIn' => TRUE,
			'isAdmin' => $user->role_id == 1 ? TRUE : FALSE
		);

		$this->session->set_userdata($session);
	}

	public function auth() {

		if ($this->form_validation->run('login') === FALSE) {

			$this->render_view();
			
		} else {
			
			$params = array(
				'username' => $this->input->post('username', TRUE),
				'isActive' => 1
			);

			if ($user = $this->user->validate_user($params)) {

				if (password_verify($this->input->post('password', TRUE), $user->password)) {

					// Update user lastLogin timestamp
					$update = array('dt_lastLogin' => date('Y-m-d H:i:s'));
					$where = array('user_id' => $user->user_id);
					$this->user->update_user($update, $where);

					// Regenerate session
					$this->session->sess_regenerate();

					// Get user details
					$arrParams = array('user_id' => $user->user_id);
					$userDet = $this->user->get_user_details($arrParams);

					// Set user session
					$this->set_session($userDet);
					
					// Redirect to Dashboard
					$this->session->set_flashdata('success_login', 'You have successfully logged in');
					redirect('dashboard');

				} else {

					$this->session->set_flashdata('invalid_credentials', 'Invalid Username / Password');
					redirect('login/auth');
				}
				

			} else {

				$this->session->set_flashdata('invalid_credentials', 'Invalid Username / Password');
				redirect('login/auth');
			}

		}

	}

	public function register() {

		if ($this->form_validation->run('register') === FALSE) {

			$this->render_view('registration');

		} else {

			$params = array(
				'username' => $this->input->post('username', TRUE),
				'email' => $this->input->post('email', TRUE),
				'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
				'dt_dateCreated' => date('Y-m-d H:i:s'),
				'role_id' => 1, // TEMPORARY, this is Admin role
				'cluster_id' => 1, // TEMPORARY, this is Main Cluster
				'isActive' => 1,
				'isGeneric' => 0
			);

			if ($user_id = $this->user->create_user($params)) {

				$this->session->set_flashdata('success_registration', 'You have been successfully registered.');
				redirect('login/auth');

			} else {

				$this->session->set_flashdata('error_registration', 'Failed to create new user.');
				redirect('login/register');

			}

		}
		
	}
	
	public function logout() {

		$this->session->unset_userdata('isLoggedIn');
		
		$this->session->sess_destroy();

		//$this->session->set_flashdata('success_logout', 'You have successfully logged out.');

		redirect('login/auth');

	}
	
	public function user_exist($username = NULL) {

		$this->form_validation->set_message('user_exist', "User <strong>{$username}</strong> already exist.");

		$params = array('username' => $username);

		$result = $this->user->get_users($params);
		
		return count($result) > 0 ? FALSE : TRUE;

	}

	public function email_exist($email) {

		$this->form_validation->set_message('email_exist', "Email <strong>{$email}</strong> already exist.");

		$params = array('email' => $email);

		$result = $this->user->get_users($params);

		return count($result) > 0 ? FALSE : TRUE;
	}

	public function _remap($method, $params = array()) {

		if (method_exists($this, $method)) {
			
			return call_user_func_array(array($this, $method), $params);
		}

	}


}