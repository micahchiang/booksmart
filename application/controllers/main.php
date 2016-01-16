<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/main
	 *	- or -  
	 * 		http://example.com/index.php/main/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/main/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('User');
		$this->load->model('Book');
		$this->load->model('Review');
		//$this->load->library("form_validation");
		//$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		//$this->load->view('main_message');
		//$this->load->view('survey_form')
		$this->load->view('welcome');
	}

	public function add(){
		//add PROCESSES THE REGISTRATION
		//$this->load->view('add_book_view');
		//var_dump($this->input->post());
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name", "Name", "required");
		$this->form_validation->set_rules("alias", "Alias", "required");
		$this->form_validation->set_rules("email", "Email", "required|valid_email");
		$this->form_validation->set_rules("password", "Password", "required|min_length[8]|matches[confirm_password]");
		$this->form_validation->set_rules("confirm_password", "Password Confirmation", "required");
		if($this->form_validation->run()== FALSE)
		{
			$this->session->set_flashdata('reg_errors', validation_errors());
			redirect('/');
			//var_dump($this->session->flashdata('errors'));
			//die('ADDING');
		} 
		else 
		{
			//NO ERRORS
			$user = $this->input->post();
			$this->User->add_user($user);
			$userData = $user;
			//var_dump($view_data);
			//redirect()
			$this->session->set_userdata('userData', $userData);
			redirect('/');
		}
		//die("ADDING");

		//$user = $this->input->post();
		//$this->User->add_user($user);
	}

	public function login(){
		//PROCESS LOGIN
		//REDIRECT
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", "required|valid_email");
		$this->form_validation->set_rules("password", "Password", "required");
		if($this->form_validation->run()== FALSE)
		{
			$this->session->set_flashdata('login_errors', validation_errors());
			redirect('/');
			//var_dump($this->session->flashdata('errors'));
			//die('ADDING');
		} 
		else
		{
			//NO ERRORS
			$post = $this->input->post();
			//var_dump($this->User->get_user_by_email($post));
			$user = $this->User->get_user_by_email($post);
			//CHECK VALID USER PASS COMBO
			if($post['password'] == $user['password']){
				$this->session->set_userdata('userData', $user);
				redirect('/main/welcome');
			}

		}

	}

	public function welcome(){
		//SEND BOOK LIST AND RECENT REVIEW LIST
		$reviews = $this->Review->get_recent_reviews();
		$books = $this->Book->get_all_books();
		$view_data['reviews'] = $reviews;
		$view_data['books'] = $books;
		$this->load->view('loggedin_view', $view_data);
	}

	public function destroy(){
		$this->session->sess_destroy();
		redirect('/');
	}

	public function showUser($id){
		$userinfo = $this->User->get_user_by_id($id);
		$reviewCount = count($userinfo);
		$view_data['userinfo'] = $userinfo;
		$view_data['reviewCount'] = $reviewCount;
		$this->load->view('show_user', $view_data);

	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */