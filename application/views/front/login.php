<div class="menukiri row-fluid">
	<div style='padding:20px;'>
		<?php $this->load->view('part/menukiri');?>
	</div>
</div>
<div class="content row">
	<div style='padding:20px;'>
	<div class='row-fluid'>
		<form method='post' class="form-horizontal span10">
		<div class="page-header">
		  <h2>Login user</h2>
		</div>
			<?php $this->model_front->getMsg('msg');?>
			<div class="control-group">
			  <label class="control-label" for="inputEmail">User</label>
			  <div class="controls">
				<input type="text" name='user' value='<?php echo set_value('user');?>' id="inputEmail" placeholder="Username">
				<?php echo form_error('user')?>
			  </div>
			</div>
			<div class="control-group">
			  <label class="control-label" for="inputPassword">Password</label>
			  <div class="controls">
				<input type="password" name='pass' value='<?php echo set_value('pass');?>' id="inputPassword" placeholder="Password">
				<?php echo form_error('pass')?>
			  </div>
			</div>
			<div class="control-group">
			  <div class="controls">
				<label><a href='home/lupapass'>Lupa Password,.?</a></label>
				<input type="submit" class="btn" name='login' value='Sign in' />
				<a href="home/register" class="btn btn-info">Register</a>
			  </div>
			</div>
		  </form>
	</div>
	</div>
</div>