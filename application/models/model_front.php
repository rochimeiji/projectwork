<?php
class model_front extends CI_Model{
	//Register
	function register(){
		if($this->input->post('register')){
			//validation form
			$this->form_validation->set_rules('user', 'Username', 'required');
			$this->form_validation->set_rules('pass', 'Password', 'required');
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('kelas', 'Kelas', 'required');
			$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
			$this->form_validation->set_rules('jawab', 'Jawab', 'required');
			
			if(!$this->form_validation->run() == FALSE){
				$data = array(
					'user' => $this->input->post('user'),
					'pass' => sha1($this->input->post('pass')),
					'nama' => $this->input->post('nama'),
					'kelas' => $this->input->post('kelas'),
					'tentang' => $this->input->post('tentang'),
					'pertanyaan' => $this->input->post('pertanyaan'),
					'jawaban' => $this->input->post('jawab'),
					'role' => 'user'
				);
				//validation image
				if($_FILES['foto']['name']){
					//Where Not IMAGE
					$type = explode('/',$_FILES['foto']['type']);
					$tipe = array('jpg','jpeg','png','bmp','gif');
					$error = false;
					foreach($tipe as $tipe){
						if($type[1]==$tipe){$error=true;}
					}
					if(!$error){
						$this->session->set_userdata('validation',true);
						$this->session->set_userdata('msg',"<div class='alert alert-error'>Extensi upload foto tidak valid</div>");
					}else{
						if($this->input->post('dGambar')){
							unlink("assets/screenshoot/".$this->input->post('dGambar'));
						}
						$dir = "assets/foto/";
						$name = time()."_".$_FILES['foto']['name'];
						$tmp = $_FILES['foto']['tmp_name'];
						move_uploaded_file($tmp , $dir.$name);
						$data['foto'] = $name;
					}
				}else{
					$data['foto'] = 'default.png';
				}
				if(!$this->session->userdata('validation')==true){
					$this->db->insert('user',$data);
					$this->session->set_userdata('msg',"<div class='alert alert-success'>Berhasil Register mari <a href='home/login'>login</a></div>");
				}
				$this->session->unset_userdata('validation');
			}
		}
	}
	//Register
	function editProfil($id){
		if($this->input->post('editProfil')){
			//validation form
			$this->form_validation->set_rules('user', 'Username', 'required');
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('kelas', 'Kelas', 'required');
			$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
			$this->form_validation->set_rules('jawab', 'Jawab', 'required');
			
			if(!$this->form_validation->run() == FALSE){
				$data = array(
					'user' => $this->input->post('user'),
					'nama' => $this->input->post('nama'),
					'kelas' => $this->input->post('kelas'),
					'tentang' => $this->input->post('tentang'),
					'pertanyaan' => $this->input->post('pertanyaan'),
					'jawaban' => $this->input->post('jawab'),
					'role' => 'user'
				);
				if($this->input->post('pass')){
					$data['pass'] = sha1($this->input->post('pass'));
				}
				//validation image
				if($_FILES['foto']['name']){
					//Where Not IMAGE
					$type = explode('/',$_FILES['foto']['type']);
					$tipe = array('jpg','jpeg','png','bmp','gif');
					$error = false;
					foreach($tipe as $tipe){
						if($type[1]==$tipe){$error=true;}
					}
					if(!$error){
						$this->session->set_userdata('validation',true);
						$this->session->set_userdata('msg',"<div class='alert alert-error'>Extensi upload foto tidak valid</div>");
					}else{
						if($this->input->post('dFoto')!="default.png"){
							unlink("assets/foto/".$this->input->post('dFoto'));
						}
						$dir = "assets/foto/";
						$name = time()."_".$_FILES['foto']['name'];
						$tmp = $_FILES['foto']['tmp_name'];
						move_uploaded_file($tmp , $dir.$name);
						$data['foto'] = $name;
					}
				}else{
					$data['foto'] = 'default.png';
				}
				if(!$this->session->userdata('validation')==true){
					$this->db->where('id_user',$id);
					$this->db->update('user',$data);
					$this->session->set_userdata('msg',"<div class='alert alert-success'>Berhasil edit Profil</div>");
				}
				$this->session->unset_userdata('validation');
			}
		}
	}
	//GET HTML
	function get_html($con){
		$this->db->start_cache();
		$search = $this->session->userdata('search');
		if($search){
			foreach($search as $key => $val){
				$this->db->like($key,$val);
			}
		}
		//Pagination
		$config['base_url'] = $con['url'];
		$config['uri_segment'] = $con['uri'];
		$config['per_page'] = 6;
		
		$this->db->join('user','user.id_user=html.id_user');
		if(isset($con['id'])){
			$this->db->where('html.id_user',$con['id']);
		}
		$this->db->from('html');
		$this->db->stop_cache();
		//Jumlah row setelah aksi
		$result['count'] = $this->db->count_all_results();
		$config['total_rows'] = $result['count'];
		
		$this->db->order_by('html.date','desc');
		$this->db->limit($config['per_page'],$this->uri->segment($con['uri']));
		
		$result['data'] = $this->db->get()->result();
		//Initialize paging dari config diatas
		$this->pagination->initialize($config);
		return $result;		
	}
	//GET My HTML{
	function getMyHtml(){
		$this->db->join('user','user.id_user=html.id_user');
		$this->db->where('html.id_user',$this->session->userdata('id_user'));
		return $this->db->get('html')->result();
	}
	//Create Judul HTML
	function createHtml(){
		//create
		if($this->input->post('createHtml')){
			$this->form_validation->set_rules('judul_html','Judul HTML','required');
			if(!$this->form_validation->run()==FALSE){
				$data = array('id_user'=>$this->session->userdata('id_user'),
						'html_name'=>$this->input->post('judul_html'),
						'html_about'=>$this->input->post('tentang_html'),
						'html_image'=>'default.jpg',
						'date'=>date('Y-m-d H:i:s'));
				$this->db->insert('html',$data);
				$this->session->set_userdata('msg',"<div class='alert alert-success'>Berhasil Tambah HTML</div>");
			}else{
				$this->session->set_userdata('msg',"<div class='alert alert-error'>Gagal Tambah HTML</div>");
			}
		}
		if($this->input->post('editHtml')){
			$this->form_validation->set_rules('judul_html','Judul HTML','required');
			if(!$this->form_validation->run()==FALSE){
				$data = array('id_user'=>$this->session->userdata('id_user'),
						'html_name'=>$this->input->post('judul_html'),
						'html_about'=>$this->input->post('tentang_html'),
						'date'=>date('Y-m-d H:i:s'));
				if($_FILES['gambar']['name']){
					//Where Not IMAGE
					$type = explode('/',$_FILES['gambar']['type']);
					$tipe = array('jpg','jpeg','png','bmp');
					$error = false;
					foreach($tipe as $tipe){
						if($type[1]==$tipe){$error=true;}
					}
					if(!$error){
						$this->session->set_userdata('validation',true);
						$this->session->set_userdata('msg',"<div class='alert alert-error'>Extensi upload gambar tidak valid</div>");
					}else{
						if(!$this->input->post('dGambar')=='default.jpg'){
							unlink("assets/screenshoot/".$this->input->post('dGambar'));
						}
						$dir = "assets/screenshoot/";
						$name = time().$_FILES['gambar']['name'];
						$tmp = $_FILES['gambar']['tmp_name'];
						move_uploaded_file($tmp , $dir.$name);
						$data['html_image'] = $name;
					}
				}
				if(!$this->session->userdata('validation')==true){
					$this->db->where('id_html',$this->input->post('id_html'));
					$this->db->update('html',$data);
					$this->session->set_userdata('msg',"<div class='alert alert-success'>Berhasil Edit HTML</div>");
				}
				$this->session->unset_userdata('validation');
			}else{
				$this->session->set_userdata('msg',"<div class='alert alert-error'>Gagal Edit HTML</div>");
			}
		}
		//delete
		if($this->input->post('deleteHtml')){
			$this->db->where('id_html',$this->input->post('id_html'));
			$this->db->delete('html');
			$this->session->set_userdata('msg',"<div class='alert alert-success'>Berhasil Delete HTML</div>");
		}
	}
	//Get Editor
	function getEditor($id){
		$this->db->where('id_html',$id);
		$result = $this->db->get('html')->row();
		if(!$result){redirect();}
		return $result;
	}
	//Save Editor
	function saveEditor($id){
		if($this->input->post('html')){
			$data = array('html'=>$this->input->post('html'),
					'css'=>$this->input->post('css'),
					'js'=>$this->input->post('js'));
			$this->db->where('id_html',$id);
			$this->db->update('html',$data);
			redirect();
		}
	}
	//Create Forum
	function createForum(){
		if($this->input->post('createForum')){
			//Create Data
			$data['id_user'] = $this->session->userdata('id_user');
			$data['forum_name'] = $this->input->post('forum_name');
			$data['forum_content'] = $this->input->post('forum_content');
			$data['date'] = date("Y-m-d H:i:s");
			//Insert data
			$this->db->insert('forum',$data);
			redirect('home/forum');
		}
	}
	//Get Forum
	function get_forum(){
		$this->db->join('user','user.id_user=forum.id_user');
		return $this->db->get('forum')->result();
	}
	//Get Comment Forum
	function comment_forum($id){
		$this->db->join('user','user.id_user=komentar.id_user');
		$this->db->where('id_target',$id);
		$this->db->where('komentar_role','user');
		$this->db->order_by('date','asc');
		return $this->db->get('komentar')->result();
	}
	//Get Profil
	function getProfil($id){
		$this->db->where('id_user',$id);
		return $this->db->get('user')->row();
	}
	//Upload Sampul
	function uploadSampul(){
		if($this->input->post('uploadSampul')){
			if($_FILES['sampul']['name']){
				//Where Not IMAGE
				$type = explode('/',$_FILES['sampul']['type']);
				$tipe = array('jpg','jpeg','png','bmp');
				$error = false;
				foreach($tipe as $tipe){
					if($type[1]==$tipe){$error=true;}
				}
				if(!$error){
					$this->session->set_userdata('validation',true);
					$this->session->set_userdata('msg',"<div class='alert alert-error'>Extensi upload sampul tidak valid</div>");
				}else{
					if($this->input->post('dSampul')){
						unlink("assets/sampul/".$this->input->post('dSampul'));
					}
					$dir = "assets/sampul/";
					$name = time().$_FILES['sampul']['name'];
					$tmp = $_FILES['sampul']['tmp_name'];
					move_uploaded_file($tmp , $dir.$name);
					$data['sampul'] = $name;
				}
				if(!$this->session->userdata('validation')==true){
					$this->db->where('id_user',$this->session->userdata('id_user'));
					$this->db->update('user',$data);
				}
				$this->session->set_userdata('validation');
			}
		}
	}
	//Add Comment
	function add_comment($id,$role){
		if($this->input->post('comment')){
			$data['id_target'] = $id;
			$data['id_user'] = $this->session->userdata('id_user');
			$data['komentar'] = $this->input->post('komentar');
			$data['komentar_role'] = $role;
			$data['date'] = date("Y-m-d H:i:s");
			$this->db->insert('komentar',$data);
		}
	}
	function login(){
		if($this->input->post('login')){
			//validation form
			$this->form_validation->set_rules('user', 'Username', 'required');
			$this->form_validation->set_rules('pass', 'Password', 'required');
			
			if(!$this->form_validation->run() == FALSE){
				$login = $this->db->get_where('user',array('user'=>$this->input->post('user'),
						'pass'=>sha1($this->input->post('pass'))))->row();
				if(!empty($login)){
					$data = array('id_user'=>$login->id_user,'role'=>$login->role,'login'=>true);
					$this->session->set_userdata($data);
					if($this->session->userdata('role') == 'admin'){
						redirect('admin');
					}else{
						redirect();
					}
				}else{
					$this->session->set_userdata('msg',"<div class='alert alert-error'>User atau Password anda salah</div>");
				}
			}
		}
	}
	function logout(){
		$data = array('id_user'=>'','role'=>'','login'=>'');
		$this->session->unset_userdata($data);
	}
	function getMsg(){
		echo $this->session->userdata('msg');
		$this->session->unset_userdata('msg');
	}
}
?>