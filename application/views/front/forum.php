<input type='checkbox' id="cZoom-editor" hidden />
<div class="menukiri row-fluid">
	<div style='padding:20px;'>
		<?php $this->load->view('part/menukiri');?>
	</div>
</div>
<div class="content row">
<div style='padding:20px;'>
	<div class='row-fluid'>
<?php
	if(!$get){
?>
		<div class="page-header">
			<h3 class='pull-left'>Forum Html</h3>
			<div class='cl'></div>
		</div>
		<table class='table table-bordered'>
		<?php
		foreach($get_forum as $row){
		?>
			<tr>
				<td width='150px'>
				<a href='home/profil/<?php echo $row->id_user;?>'>
					<img class='foto' src='assets/foto/<?php echo $row->foto;?>' width='100%' height='auto' />
				</a>
					<div class='text-content'>
						<?php echo $row->nama;?><br>
						<?php echo $row->kelas;?>-RPL
					</div>
				</td>
				<td>
					<legend><a href='home/forum/<?php echo $row->id_forum;?>'><?php echo $row->forum_name;?></a> 
					<small>Tanggal : <?php echo $row->date;?></small></legend>
					<p><?php echo $row->forum_content;?></p>
				</td>
			</tr>
	<?php } ?>
		</table>
<?php }else{ ?>
		<table class='table table-bordered'>
			<tr>
				<td width='150px'>
				<a href='home/profil/<?php echo $row->id_user;?>'>
					<img class='foto' src='assets/foto/<?php echo $get->foto;?>' width='100%' height='auto' />
				</a>
					<div class='text-content'>
						<?php echo $get->nama;?><br>
						<?php echo $get->kelas;?>-RPL<br>
						<small>Tanggal : <?php echo $get->date;?></small></legend>
					</div>
				</td>
				<td>
					<legend><?php echo $get->forum_name;?>
					<small>Tanggal : <?php echo $get->date;?></small></legend>
					<p><?php echo $get->forum_content;?></p>
				</td>
			</tr>
<?php
		$comment_forum = $this->model_front->comment_forum($get->id_forum);
		foreach($comment_forum as $row){
?>			<tr>
				<td width='150px'>
					<img class='foto' src='assets/foto/<?php echo $row->foto;?>' width='100%' height='auto' />
					<div class='text-content'>
						<?php echo $row->nama;?><br>
						<?php echo $row->kelas;?>-RPL<br>
						<small><?php echo $row->date;?></small></legend>
					</div>
				</td>
				<td>
					<p><?php echo $row->komentar;?></p>
				</td>
			</tr>
	<?php } ?>
		</table>
	<?php if($this->session->userdata('login')){ ?>
		<form method='post'>
			<legend>Komentar</legend>
			<textarea name='komentar' rows='8' class='wysihtml5 span12'></textarea>
			<button name='comment' value='true' class='btn btn-primary'>Komentar</button>
		</form>
	<?php } ?>
<?php } ?>
	</div>
</div>
</div>