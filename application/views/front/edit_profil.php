<div class="menukiri row-fluid">
	<div style='padding:20px;'>
		<?php $this->load->view('part/menukiri');?>
	</div>
</div>
<div class="content row">
	<div class='row-fluid'>
	<?php
		$sampul= base_url().'assets/sampul/default.jpg';
		if($row->sampul){$sampul=base_url().'assets/sampul/'.$row->sampul;}
			echo "<div class='sampul'>";
	?>
		<img class='foto' src='<?php echo $sampul;?>' />
		<div class='sampul-content'>
			<img class='foto img-polaroid' src='assets/foto/<?php echo $row->foto;?>' />
			<h4 class='status'><?php echo $row->nama;?><br><small><?php echo $row->kelas;?> RPL</small></h4>
		</div>
		<?php
			if($row->id_user==$this->session->userdata('id_user')){
		?>
		<form method='post' class='uSampul' enctype='multipart/form-data'>
			<input type='hidden' name='dSampul' value='<?php echo $row->sampul;?>' />
			<!-- Button to trigger modal -->
			<a href="#myModal" role="button" class="btn btn-primary" data-toggle="modal">Upload Foto Sampul</a>

			<!-- Modal -->
			<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
				<h3 id="myModalLabel">Upload Sampul</h3>
			  </div>
			  <div class="modal-body">
				<div class="control-group">
					<div class="controls">
						<img class='foto-sampul-form' src='<?php echo $sampul;?>'/>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="inputSampul">Uplaod Image</label>
					<div class="controls">
					  <input type="file" name='sampul' id="inputSampul" title='Upload Sampul'>
					</div>
				  </div>
			  </div>
			  <div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				<button type='submit' class="btn btn-primary" name='uploadSampul' value='true'>Upload</button>
			  </div>
			</div>
		</form>
		<?php } ?>
	</div>
		<div style='padding:20px;margin-top:70px;'>
		<?php $this->model_front->getMsg(); ?>
<?php
	$this->db->flush_cache();
	$row1 = $this->db->get_where('user',array('id_user'=>$this->session->userdata('id_user')))->row();
	if($this->input->post('editProfil')){
		$get = array('user'=>$_POST['user'],'pass'=>$_POST['pass'],'nama'=>$_POST['nama'],'kelas'=>$_POST['kelas'],
				'tentang'=>$_POST['tentang'],'pertanyaan'=>$_POST['pertanyaan'],'jawab'=>$_POST['jawab']);
	}else{
		$get = array('user'=>$row1->user,'pass'=>'','nama'=>$row1->nama,'kelas'=>$row1->kelas,
				'tentang'=>$row1->tentang,'pertanyaan'=>$row1->pertanyaan,'jawab'=>$row1->jawaban);
	}
?>
		<form method='post' class="bs-docs-example form-horizontal span10" enctype='multipart/form-data'>
		<legend>
		  <h3>Edit Profil <a class='btn btn-inverse' onclick='goBack()' pointer>Back</a></h3>
		</legend>
			<?php $this->model_front->getMsg('msg');?>
			<div class="control-group">
			  <label class="control-label" for="inputUser">User</label>
			  <div class="controls">
				<input type="text" name='user' id="inputUser" value='<?php echo $get['user'];?>' placeholder="Username">
				<?php echo form_error('user')?>
			  </div>
			</div>
			<div class="control-group">
			  <label class="control-label" for="inputPassword">Password</label>
			  <div class="controls">
				<input type="password" name='pass' id="inputPassword" value='<?php echo $get['pass'];?>' placeholder="Password">
				<?php echo form_error('pass')?>
			  </div>
			</div>
			<div class="control-group">
			  <label class="control-label" for="inputNama">Nama</label>
			  <div class="controls">
				<input type="text" name='nama' id="inputNama" value='<?php echo $get['nama'];?>' placeholder="Nama Lengkap">
				<?php echo form_error('nama')?>
			  </div>
			</div>
			<div class="control-group">
			  <label class="control-label" for="inputFoto">Upload Foto</label>
			  <div class="controls">
				<input type='hidden' name='dFoto' value='<?php echo $row->foto;?>' />
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
						if($val == $get['kelas']){$s='selected';}
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
				<textarea name='tentang' rows='4' id="inputTentang" placeholder="Tentang Anda"><?php echo $get['tentang'];?></textarea>
			  </div>
			</div>
			<div class="control-group">
			  <label class="control-label" for="inputPertanyaan">Pertanyaan</label>
			  <div class="controls">
				<input type="text" name='pertanyaan' id="inputPertanyaan" value='<?php echo $get['pertanyaan'];?>' placeholder="Buat sebuah pertanyaan?">
				<?php echo form_error('pertanyaan')?>
			  </div>
			</div>
			<div class="control-group">
			  <label class="control-label" for="inputJawab">Jawab</label>
			  <div class="controls">
				<input type="text" name='jawab' id="inputJawab" value='<?php echo $get['jawab'];?>' placeholder="Jawab pertanyaannya">
				<?php echo form_error('jawab')?>
			  </div>
			</div>
			<div class="control-group">
			  <div class="controls">
				<input type='submit' name='editProfil' value='Edit Profil' class="btn btn-primary">
			  </div>
			</div>
		  </form>
		</div>
	</div>
</div>