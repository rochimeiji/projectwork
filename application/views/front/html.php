<input type='checkbox' id="cZoom-editor" hidden />
<input type='checkbox' id='cComment' hidden />
<!--Comment Html-->
<div class='comment-html'>
<div style='padding:10px;'>
	<div class='row-fluid'>
	<legend>
		<h3><?php echo $get->html_name;?></h3>
	</legend>
		<div class='well well-small'>
			<?php echo $get->html_about;?>
		</div>
		
	<!--Comment Form-->
<?php
	if($this->session->userdata('id_user')){
?>
	<form method='post'>
		<label>Comment</label>
		<textarea class='span12' name='komentar' rows='5'></textarea>
		<button class='btn btn-primary' type='submit' name='comment' value='true'>
			<li class='icon-comment icon-white'></li> Comment
		</button>
	</form>
<?php } ?>
	</div>
</div>
</div>
<div class="menukiri row-fluid">
	<?php $this->load->view('part/editor');?>
</div>
<div class="content row">
	<div style='padding:20px;'>
	<div class='row-fluid'>
		<h3 class='visible-phone'>This View HTML</h3>
		<iframe class='span11 ipreview' id='ipreview'></iframe>
	</div>
	</div>
</div>