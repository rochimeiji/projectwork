<ul class="nav nav-tabs nav-stacked">
<?php
	$menu['Home'] = "";
	//Jika user login
	if($this->session->userdata('login')){
		$menu['My Profil'] = "home/profil/".$this->session->userdata('id_user');
		$menu['My HTML'] = "home/myhtml";
	}
	$menu['Create HTML'] = "home/html";
	$menu['Forum'] = "home/forum";
	if($this->session->userdata('login')){
		$menu['Create Forum'] = "home/createForum";
	}
	$menu['About'] = "home/about";
	//Jika keadaan login
	if(!$this->session->userdata('login')){
		$menu['Login'] = 'home/login';
	}else{
		$menu['Logout'] = 'home/logout';
	}
	foreach($menu as $menu => $halaman){
		$active = "";
		if($menu == $this->session->userdata('title')){$active="class='active'";}
		echo "<li $active><a href='$halaman'>$menu</a></li>";
	}
?>
</ul>