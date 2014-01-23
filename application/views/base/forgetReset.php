<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php $this->load->view('includes/import');?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/signup.css" type="text/css" />
</head>
<body>
<!-- Wrapper / Start -->
<div id="wrapper">
	<?php $this->load->view('includes/header');?>
	<div id="content">
	<?php 
		echo br(2);
		echo form_open("login/reset");
		echo form_hidden('email', $email);
		echo form_hidden('id', $user_id);
		echo form_hidden('code', $hashStr);
	?>
			<table cellpadding="0" cellspacing="0" border="0" id="log_reg">
				<tr>
					<td class="input"><input type="password" name="newpasswd" placeholder="New Password" autocomplete="off" required="required" /></td>
				</tr>
				<tr>
					<td class="input"><input type="password" name="cfmpasswd" placeholder="Confirm Password" autocomplete="off" required="required" /></td>
				</tr>
				<tr>
					<td><input type="submit" value="Password Reset" title="Password Reset for <?php echo $email; ?>" /></td>
				</tr>
			</table>
		<?php echo form_close(br(2)); ?>

	</div>
</div>
<?php $this->load->view('includes/footer');?>
</body>
</html>