<div class="menukiri row-fluid">
	<div style='padding:20px;'>
		<?php $this->load->view('part/menukiri');?>
	</div>
</div>
<div class="content row">
<div style='padding:20px;'>
	<div class='row-fluid'>
		<div class="page-header">
			<h3 class='pull-left'>
		<?php
			if(count($get_html['count'])){
				echo "Result ".$get_html['count']." Html";
			}else{
				echo "Html tidak ditemukan";
			}
		?>
			</h3>
			<form action='home/index' method='post' placeholder='Search By Title' class="form-search pull-right" style='margin:15px 0px;'>
			  <input type="text" name='html_name' class="input-medium search-query">
			  <button type="submit" name='search' value='true' class="btn"><i class='icon-search'></i> Search</button>
			</form>
			<div class='cl'></div>
		</div>
		<div class='row-fluid'>
<?php
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
			<div class="pagination"><?php echo $this->pagination->create_links();?></div>
	</div>
</div>
</div>