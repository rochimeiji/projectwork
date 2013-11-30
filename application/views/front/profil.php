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
			<h4 class='status'><?php echo $row->nama;?><br><small><?php echo $row->kelas;?> RPL</small>
	<?php
		if($row->id_user==$this->session->userdata('id_user')){
			echo "<a class='btn btn-small btn-info' href='home/editProfil'>Edit User</a>";
		}
	?>	</h4>
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
			<div class='well'>
				<legend>Tentang</legend>
				<?php echo $row->tentang;?>
			</div>
	<?php
		if($get_html['data']){
	?>
			<legend class='pull-left'>Html Buatan saya</legend>
			<div class='row-fluid'>
	<?php
		}
			$i=0;
		foreach($get_html['data'] as $row){
			$style='';
			if($i%3==0){$style="style='margin:10px 0px;'";}
			$i++;
			if($row->html_image){
				$img = $row->html_image;
			}else{
				$img = "default.gif";
			}
	?>
			<div class="thumbnail span4" <?php echo $style;?>>
			  <a href='home/profil/<?php echo $row->id_user;?>'>
				<img id='popHover' data-placement="top" data-content="<?php echo $row->nama." ".$row->kelas." RPL";?>" class='foto' src='assets/foto/<?php echo $row->foto;?>' />
			  </a>
			  <h4 class='pull-letf' style='margin:10px 10px;'><a href='home/html/<?php echo $row->id_html;?>'><?php echo $row->html_name;?></a></h4>
			  <img src="assets/screenshoot/<?php echo $img;?>" alt="300x200" style="width: 300px; height: 200px;">
			</div>
	<?php	} ?>
			</div>
				<div class='pagination'><?php echo $this->pagination->create_links();?></div>
		</div>
	</div>
</div>