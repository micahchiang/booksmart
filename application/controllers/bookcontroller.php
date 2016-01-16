<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BookController extends CI_Controller {

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
		//$this->load->model('User');
		$this->load->model('Book');
		$this->load->model('Review');
		//$this->load->library("form_validation");
		//$this->output->enable_profiler(TRUE);
	}

	public function index(){
		//send unique authors list
		$authors = $this->Book->get_distinct_authors();
		$view_data['authors'] = $authors;
		//var_dump($view_data);
		$this->load->view('add_book_view', $view_data);
	}

	public function create(){
		$post = $this->input->post();
		//var_dump($post);
		//if new author length > 0 post[author] = post[new_author]
		if(strlen($post['new_author']) > 0){
			$post['author'] = $post['new_author'];
		}

		$post['book_id'] = $this->Book->add($post);
		//var_dump($post);
		//load view with book ID
		//$showRoute = '/bookcontroller/show/'.$post['book_id'];
		//redirect('/bookcontroller/show/'.);
		//go to review add
		$this->Review->add($post);
		//echo "/reviewcontroller/add/".$post['book_id'];
		$showRoute = "/reviewcontroller/show/".$post['book_id'];
		redirect($showRoute);
	}

	public function deleteme(){
		$this->load->view('show_book_view');
	}

	public function show($id){
		//get query

		//load query into view


	}





}