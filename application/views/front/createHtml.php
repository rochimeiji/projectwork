<?php
	$id_html = $this->uri->segment(3);
	if($id_html){
	$row = $this->db->get_where('html',array('id_html'=>$id_html))->row();
?>
<form method='post' class="form-horizontal span10" enctype='multipart/form-data'>
	<input type='hidden' name='id_html' value='<?php echo $id_html;?>' />
	<input type='hidden' name='dGambar' value='<?php echo $row->html_image;?>' />
	<h3>Edit HTML</h3>
	<?php $this->model_front->getMsg('msg');?>
	<div class="control-group">
	  <label class="control-label">Judul HTML</label>
	  <div class="controls">
		<input type="text" name='judul_html' value='<?php echo $row->html_name;?>' id="inputEmail" placeholder="Judul HTML">
		<?php echo form_error('judul_html')?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label">Tentang HTML</label>
	  <div class="controls">
		<textarea rows='5' name='tentang_html' placeholder="Tentang HTML" ><?php echo $row->html_about;?></textarea>
		<?php echo form_error('tentang_html')?>
	  </div>
	</div>
	<div class="control-group">
	  <label class="control-label">Upload Gambar Screenshoot</label>
	  <div class="controls">
		<input type='file' name='gambar' title='Upload Gambar Screenshoot' />
		<?php $this->model_front->getMsg();?>
	  </div>
	</div>
	<div class="control-group">
	  <div class="controls">
		<input type="submit" class="btn btn-primary" name='editHtml' value='Edit HTML' />
	  </div>
	</div>
 </form>
<?php
	}else{
?>
<form method='post' class="form-horizontal span10">
	  <h3>Create HTML</h3>
		<?php $this->model_front->getMsg('msg');?>
		<div class="control-group">
		  <label class="control-label">Judul HTML</label>
		  <div class="controls">
			<input type="text" name='judul_html' value='<?php echo set_value('judul_html');?>' id="inputEmail" placeholder="Judul HTML">
			<?php echo form_error('judul_html')?>
		  </div>
		</div>
		<div class="control-group">
		  <label class="control-label">Tentang HTML</label>
		  <div class="controls">
			<textarea rows='5' name='tentang_html' placeholder="Tentang HTML" ><?php echo $this->input->post('tentang_html');?></textarea>
			<?php echo form_error('tentang_html')?>
		  </div>
		</div>
		<div class="control-group">
		  <div class="controls">
			<input type="submit" class="btn btn-primary" name='createHtml' value='Create HTML' />
		  </div>
		</div>
 </form>
<?php
	}
?>