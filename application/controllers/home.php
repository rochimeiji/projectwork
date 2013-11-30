<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_front');
		$this->load->library('form_validation');
		$this->load->helper('my');
		$this->form_validation->set_message('required','Input %s tidak boleh kosong');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error nf">', '</div>');
		//If Get search make session search
		if($this->input->post('search')){
			unset($_POST['search']);
			foreach($_POST as $key => $val){
				$data[$key] = $val;
			}
			$this->session->set_userdata('search',$data);
		}
	}
	//Home
	public function index(){
		$config = array('url'=>'home/home','uri'=>3);
		$this->session->set_userdata('title','Home');
		$data['get_html'] = $this->model_front->get_html($config);
		$this->load->view('main',$data);
	}
	//Create HTML
	public function createHtml(){
		$data['content'] = 'front/createHtml';
		$this->load->view('main',$data);
	}
	//My HTML
	public function myhtml(){
		$this->model_front->createHtml();
		$this->session->set_userdata('title','My HTML');
		$data['getMyHtml'] = $this->model_front->getMyHtml();
		$data['content'] = 'front/myHtml';
		$this->load->view('main',$data);
	}
	//HTML
	public function html(){
		$id = $this->uri->segment(3);
		//get editor
		if($id){
			$data['get'] = $this->model_front->getEditor($id);
		}
		$data['id_html'] = $id;
		$this->session->set_userdata('title','HTML');
		$data['content'] = 'front/html';
		$this->load->view('main',$data);
	}
	//Save Html
	function saveHtml(){
		$id = $this->uri->segment(3);
		$this->model_front->saveEditor($id);
	}
	//create forum
	function createForum(){
		$this->session->set_userdata('title','Create Forum');
		$this->model_front->createForum();
		$data['content'] = 'front/createForum';
		$this->load->view('main',$data);
	}
	//forum
	function forum(){
		//Jika uri Segment ada
		$id = $this->uri->segment(3);
		$this->db->join('user','user.id_user=forum.id_user');
		$data['get'] = $this->db->get_where('forum',array('id_forum'=>$id))->row();
		//Add comment
		$this->model_front->add_comment($id,'user');
		if($data['get']){
			$this->session->set_userdata('title',$data['get']->forum_name);
			$data['content'] = 'front/forum';
			$this->load->view('main',$data);
		}else{
			$this->session->set_userdata('title','Forum');
			$data['get_forum'] = $this->model_front->get_forum();
			$data['content'] = 'front/forum';
			$this->load->view('main',$data);
		}
	}
	//Profil
	public function profil(){
		$this->model_front->uploadSampul();
		$id = $this->uri->segment(3);
		$config = array('url'=>"home/profil/$id/",'uri'=>4,'id'=>$id);
		$data['row'] = $this->model_front->getProfil($id);
		if(!$data['row']){redirect();}
		$data['get_html'] = $this->model_front->get_html($config);
		$this->session->set_userdata('title','My Profil');
		$data['content'] = 'front/profil';
		$this->load->view('main',$data);
	}
	//Edit_profil
	public function editProfil(){
		$this->model_front->uploadSampul();
		$id = $this->session->userdata('id_user');
		$this->model_front->editProfil($id);
		$config = array('url'=>"home/profil/$id/",'uri'=>4,'id'=>$id);
		$data['row'] = $this->model_front->getProfil($id);
		$data['get_html'] = $this->model_front->get_html($config);
		$this->session->set_userdata('title','My Profil');
		$data['content'] = 'front/edit_profil';
		$this->load->view('main',$data);
	}
	public function about(){
		$this->session->set_userdata('title','About');
		$data['content'] = 'front/about';
		$this->load->view('main',$data);
	}
	public function login(){
		$this->model_front->login();
		$this->session->set_userdata('title','Login');
		$data['content'] = 'front/login';
		$this->load->view('main',$data);
	}
	public function logout(){
		$this->model_front->logout();
		redirect();
	}
	public function register(){
		$this->model_front->register();
		$this->session->set_userdata('title','Register');
		$data['content'] = 'front/register';
		$this->load->view('main',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */