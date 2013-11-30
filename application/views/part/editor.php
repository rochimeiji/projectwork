<div style='padding:10px;'>
	<!--Menu Eitor-->
	<div id="navbar-example" class="navbar navbar-static">
	  <div class="navbar-inner">
		<div class="container" style="width: auto;">
		  <a class="brand" onclick='goBack()' pointer>Back</a>
<?php	
	if($id_html){
?>
		  <ul class="nav" role="navigation">
<?php if($get->id_user == $this->session->userdata('id_user')){ ?>
			<li><a><label for='submit' pointer><i class='icon-file'></i> Save</b></label></a></li>
		<?php } ?>
			<li class="pull-right">
				<a><label for='cComment' pointer><i class="icon-comment"></i> Comment</label></a>
			</li>
		  </ul>
<?php } ?>
		</div>
	  </div>
	</div>
	<!--Judul Html editor-->
	<div class="page-header">
	  <h3><?php echo $get->html_name;?></h3>
	  <small><?php echo $get->date;?></small>
	  <div class='cl'></div>
	</div>
<?php
	if($id_html){
		$get_html = $get->html;
		$get_css = $get->css;
		$get_js = $get->js;
	}else{
		$get_html = "";
		$get_css = "";
		$get_js = "";
	}
?>
	<!--Editor-->
	<form id='saveEditor' url='home/saveHtml/<?php echo $this->uri->segment(3);?>' method='post'>
		<input type='submit' id='submit' name='saveEditor' value='true' hidden />
		<ul id="myTab" class="nav nav-tabs">
		  <li class="active"><a href="#phtml" data-toggle="tab">HTML</a></li>
		  <li class=""><a href="#pcss" data-toggle="tab">CSS</a></li>
		  <li class=""><a href="#pjs" data-toggle="tab">JAVASCRIPT</a></li>
		  <label for='cZoom-editor' class='btn hidden-phone' style='float:right;margin:3px 10px 0px;'><i class='icon-zoom-in'></i></label>
		</ul>
		<div id="myTabContent" class="tab-content editor">
		  <div class="tab-pane fade active in" id="phtml">
			<textarea id='html' name='html'><?php echo $get_html; ?></textarea>
		  </div>
		  <div class="tab-pane fade active out" id="pcss">
			<textarea id='css' name='css'><?php echo $get_css; ?></textarea>
		  </div>
		  <div class="tab-pane fade active out" id="pjs">
			<textarea id='js' name='js'><?php echo $get_js; ?></textarea>
		  </div>
		</div>
	</form>
</div>
<div class='clearfix'></div>