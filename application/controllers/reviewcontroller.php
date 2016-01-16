<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ReviewController extends CI_Controller {

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
		//$this->load->model('Book');
		$this->load->model('Review');
		//$this->load->library("form_validation");
		//$this->output->enable_profiler(TRUE);
	}

	public function index(){
		//send author list
		//$this->load->view('add_book_view');
	}

	public function add(){
		$review = $this->input->post();
		//var_dump($review);
		//die('in add method');

		$this->Review->add($review);
		redirect('/main/welcome');
	}

	public function show($id){
		//getreviewsfrombookid
		//load into view
		$reviews = $this->Review->get_reviews_from_book_id($id);
		// $reviews['book_id'] = $id;
		$view_data['reviews'] = $reviews;
		$view_data['book_id'] = $id;
		$this->load->view('show_book_view', $view_data);
	}

	public function reviews_by_recency(){

		$reviews = $this->Review->get_recent_reviews();

	}

	public function delete($id){
		$this->Review->delete($id);
		redirect('/main/welcome');
	}


}