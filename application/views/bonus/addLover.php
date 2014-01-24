<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php $this->load->view('includes/import');?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/signup.css" type="text/css" />
	<style type="text/css">
		#log_reg input[type="text"] {width:250px; display: inline;}
	</style>
</head>
<body>
<!-- Wrapper / Start -->
<div id="wrapper">
	<?php $this->load->view('includes/header');?>
	<div id="content">
	<?php 
		echo br(2);
		echo form_open("bonus/submit");
	?>
			<table cellpadding="0" cellspacing="0" border="0" id="log_reg">
				<tr>
					<td class="input"><input type="text" name="boyName" placeholder="Boy Name" autocomplete="off" required="required" /></td>
				</tr>
				<tr>
					<td class="input"><input type="text" name="girlName" placeholder="Girl Name" autocomplete="off" required="required" /></td>
				</tr>
				<tr>
					<td class="input"><input type="text" name="from" placeholder="From:" autocomplete="off" required="required" /></td>
				</tr>
				<tr>
					<td class="input"><input type="text" name="to" placeholder="To:" autocomplete="off" required="required" /></td>
				</tr>
				<tr>
					<td class="input">Love Start Date: <input type="date" name="startDate" placeholder="When you failed in love with each other" autocomplete="off" required="required" /></td>
				</tr>
				<tr>
					<td><input type="submit" value="Get Love Link" /></td>
				</tr>
			</table>
			
		<?php echo form_close(br(2)); ?>
	</div>
</div>
<?php $this->load->view('includes/footer');?>
</body>
</html>