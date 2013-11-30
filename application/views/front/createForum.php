<input type='checkbox' id="cZoom-editor" hidden />
<div class="menukiri row-fluid">
	<div style='padding:20px;'>
		<?php $this->load->view('part/menukiri');?>
	</div>
</div>
<!--Script CKEditor-->
<div class="content row">
<div style='padding:20px;'>
	<div class='row-fluid'>
		<div class="page-header">
			<h3>Create Forum</h3>
		</div>
		<form method='post'>
		<div class='row-fluid'>
			<div class='control-group'>
				<label>Judul Forum</label>
				<div class='controls'>
					<input type='text' class='span5' name='forum_name' placeholder='Judul HTML' />
				</div>
			</div>
			<div class='control-group'>
				<textarea placeholder='Konten Forum' rows='8' name='forum_content' class='wysihtml5 span12'></textarea>
			</div>
			<button class='btn btn-primary' name='createForum' value='true'>Buat Forum</button>
		</div>
		</form>
	</div>
</div>
</div>