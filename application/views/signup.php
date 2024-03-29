<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php $this->load->view('includes/import');?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/signup.css" type="text/css" />
	<script type="text/javascript">
		$(document).ready(function() 
		{
			$('.home_tab').attr('id', 'current');
		});
		
	</script>
	<style type="text/css">
		#log_reg input[type="text"] {width:113px; display: inline;}
		#log_reg img {display: inline; vertical-align: bottom;}
	</style>
</head>
<body>
<!-- Wrapper / Start -->
<div id="wrapper">
	<?php $this->load->view('includes/header');?>
	<div id="content">
	<?php 
		echo br(2);
		echo form_open("signup/submit");
	?>	
			<table cellpadding="0" cellspacing="0" border="0"  id="log_reg">
				<tr>
					<td class="input">
						<input type="text" name="users_firstname" placeholder="First Name" autocomplete="off" required="required" />
						<input type="text" name="users_lastname" placeholder="Last Name" autocomplete="off" required="required" />
					</td>
				</tr>
				<tr>
					<td class="input"><input type="email" name="users_email_address" placeholder="Your E-mail" autocomplete="off" required="required" /></td>
				</tr>
				<tr>
					<td class="input">
						<input type="text" name="captcha" placeholder="Input the code" autocomplete="off" required="required" />
						<span id="captchaCode"><?php echo $captcha['image'];?></span>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" value="Register" />
						<br/><br/>
						Password will be sent to your email
					</td>
				</tr>
			</table>
		<?php echo form_close(br(2)); ?>
	</div>
</div>
<?php $this->load->view('includes/footer');?>
<script type="text/javascript">
	function codeRefresh(){
		$("#captchaCode").load("<?php echo base_url()?>captchaCodeRefresh");
		//alert("Hello");
	}
</script>
</body>
</html>