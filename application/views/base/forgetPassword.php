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
		echo form_open("login/passwordRecovery");
	?>
			<table cellpadding="0" cellspacing="0" border="0" id="log_reg">
				<tr>
					<td class="input"><input type="email" name="email" placeholder="Your E-mail @wpi.edu" autocomplete="off" required="required" /></td>
				</tr>
				<tr>
					<td><input type="submit" value="Password Reset" /></td>
				</tr>
			</table>
		<?php echo form_close(br(2)); ?>

	</div>
</div>
<?php $this->load->view('includes/footer');?>
</body>
</html>