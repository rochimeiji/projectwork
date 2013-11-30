<div class="menukiri row-fluid">
	<div style='padding:20px;'>
		<?php $this->load->view('part/menukiri');?>
	</div>
</div>
<div class="content row">
	<div style='padding:20px;'>
	<div class='row-fluid'>
		<form method='post' class="bs-docs-example form-horizontal span10" enctype='multipart/form-data'>
		<div class="page-header">
		  <h2>Regsiter User <a class='btn btn-inverse' onclick='goBack()' pointer>Back</a></h2>
		</div>
			<?php $this->model_front->getMsg('msg');?>
			<div class="control-group">
			  <label class="control-label" for="inputUser">User</label>
			  <div class="controls">
				<input type="text" name='user' id="inputUser" value='<?php echo set_value('user');?>' placeholder="Username">
				<?php echo form_error('user')?>
			  </div>
			</div>
			<div class="control-group">
			  <label class="control-label" for="inputPassword">Password</label>
			  <div class="controls">
				<input type="password" name='pass' id="inputPassword" value='<?php echo set_value('pass');?>' placeholder="Password">
				<?php echo form_error('pass')?>
			  </div>
			</div>
			<div class="control-group">
			  <label class="control-label" for="inputNama">Nama</label>
			  <div class="controls">
				<input type="text" name='nama' id="inputNama" value='<?php echo set_value('nama');?>' placeholder="Nama Lengkap">
				<?php echo form_error('nama')?>
			  </div>
			</div>
			<div class="control-group">
			  <label class="control-label" for="inputFoto">Upload Foto</label>
			  <div class="controls">
				<input type="file" name='foto' id="inputFoto" title='Upload Foto'>
				<?php $this->model_front->getMsg();?>
			  </div>
			</div>
			<div class="control-group">
			  <label class="control-label" for="inputKelas">Kelas</label>
			  <div class="controls">
				<select name='kelas' id='inputKelas'>
				<?php 
					$kelas = array('X','XI','XII');
					foreach($kelas as $val){
						$s='';
						if($val == set_value('kelas')){$s='selected';}
						echo "<option value='$val' $s>$val</option>";
					}
				?>
				</select>
				<?php echo form_error('kelas')?>
			  </div>
			</div>
			<div class="control-group">
			  <label class="control-label" for="inputTentang">Tentang</label>
			  <div class="controls">
				<textarea name='tentang' rows='4' id="inputTentang" placeholder="Tentang Anda"><?php echo $this->input->post('tentang');?></textarea>
			  </div>
			</div>
			<div class="control-group">
			  <label class="control-label" for="inputPertanyaan">Pertanyaan</label>
			  <div class="controls">
				<input type="text" name='pertanyaan' id="inputPertanyaan" value='<?php echo set_value('pertanyaan');?>' placeholder="Buat sebuah pertanyaan?">
				<?php echo form_error('pertanyaan')?>
			  </div>
			</div>
			<div class="control-group">
			  <label class="control-label" for="inputJawab">Jawab</label>
			  <div class="controls">
				<input type="text" name='jawab' id="inputJawab" value='<?php echo set_value('jawab');?>' placeholder="Jawab pertanyaannya">
				<?php echo form_error('jawab')?>
			  </div>
			</div>
			<div class="control-group">
			  <div class="controls">
				<input type='submit' name='register' value='Register' class="btn btn-primary">
			  </div>
			</div>
		  </form>
	</div>
	</div>
</div>