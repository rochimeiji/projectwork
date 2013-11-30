<?php 
	//Inlcude Part Head
	$this->load->view('part/head');
	
	//Include Part Content
	if(isset($content)){
		$this->load->view($content);
	}else{
		$this->load->view('home');
	}
	
	//Include Part Footer
	$this->load->view('part/footer');
?>