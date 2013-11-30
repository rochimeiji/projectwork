<input type='checkbox' id="cZoom-editor" hidden />
<div class="menukiri row-fluid">
	<div style='padding:20px;'>
		<?php $this->load->view('part/menukiri');?>
	</div>
</div>
<div class="content row">
<div style='padding:20px;'>
	<div class='row-fluid'>
		<div class="page-header">
		  <a href='home/createHtml' class='btn btn-success ajax'>Tambah Html</a>
		<div class='resultAjax'></div>
		</div>
		<?php $this->model_front->getMsg();?>
		<div class='row-fluid'>
	<?php
		$i = 1;
		foreach($getMyHtml as $row){
		$style='';
		if($i%3==0){$style="style='margin:0px;'";}
		$i++;
		if($row->html_image){
			$img = $row->html_image;
		}else{
			$img = "default.gif";
		}
	?>
		<div class="thumbnail span4" <?php echo $style;?>>
		  <h4 class='pull-letf' style='margin:10px 10px;'><?php echo $row->html_name;?></h4>
		  <img src="assets/screenshoot/<?php echo $img;?>" alt="300x200" style="width: 300px; height: 200px;">
		  <div class='caption'>
		  <form method='post' onsubmit='return confirm("Anda yakin ingin Menghapusnya,.?")'>
			<a href='home/createHtml/<?php echo $row->id_html;?>' class='btn btn-inverse ajax' ><i class='icon-th icon-white'></i> Config</a>
			<a href='home/html/<?php echo $row->id_html;?>' class='btn btn-info' ><i class='icon-edit icon-white'></i> Edit</a>
			<input type='hidden' name='id_html' value='<?php echo $row->id_html;?>' />
			<button type='submit' class='btn btn-danger' name='deleteHtml' value='true'><i class='icon-remove icon-white'></i> Delete</button>
		  </form>
		  </div>
		</div>
	
<?php } ?>
		</div>
	</div>
</div>
</div>