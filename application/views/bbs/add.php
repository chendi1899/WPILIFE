<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>BBS Management | WPILIFE</title>
	<?php $this->load->view('includes/import');?>
	<?php $this->load->view('includes/kindeditor');?>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<style>
	.label-success {
		padding: 2px 5px;
		color:#fff;
		background-color: #169fe6;
	}
	.label-important {
		padding: 2px 5px;
		color:#fff;
		background-color: #b94a48;
	}
	</style>
</head>
<body>
<!-- Wrapper / Start -->
<div id="wrapper">
<?php $this->load->view('includes/header');?>
<div id="content">


<!-- 960 Container -->
<div class="container floated">

	<div class="sixteen floated page-title">

		<h2>BBS Center</h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li>BBS Center</li>
			</ul>
		</nav>

	</div>

</div>
<!-- 960 Container / End -->


<!-- 960 Container -->
<div class="container floated">
	<?php $this->load->view('includes/account_left_menu');?>
	<!-- Page Content -->
	<div class="eleven floated right">
		<section class="page-content">
			<h3 class="margin">Add new Topic</h3>

				<!-- Contact Form -->
				<section id="account">
				
					<!-- Form for Basic Information-->
					<?php 
						$attibutes = array('id'=>'kindeditor', 'name'=>'kindeditor');
						echo form_open('manage/bbs/add',$attibutes);
					?>
						<fieldset>
						<table width="100%">
							<tr>
								<td>
									<input type="text" name="bbs_title" id="bbs_title" maxlength="128" placeholder="BBS title" style="width:632px;" />
								</td>
							</tr>
							<tr>
								<td><textarea name="content" cols="40" rows="3" id="content"></textarea></td>
							</tr>
							<tr>
								<td style="float: right;"><input type="submit" class="submit" id="submit" value=" Submit " /></td>
							</tr>
						</table>
						</fieldset>
						<div class="clearfix"></div>
					</form>
					
					<!-- End Form for Basic Information-->
				</section>
				<!-- Contact Form / End -->
		</section>
	</div>
	<!-- Page Content / End -->


</div>
<!-- 960 Container / End -->


</div>
</div>
<?php $this->load->view('includes/footer');?>

	<script src="<?echo base_url();?>scripts/bootstrap.min.js"></script>
	<script src="<?echo base_url();?>scripts/bootstrap-maxlength.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('input#defaultconfig').maxlength()

		$('input#bbs_title').maxlength({
					alwaysShow: true,
					warningClass: "label label-success",
					limitReachedClass: "label label-important",
					placement: 'left'
			});
	});
	</script>
</body>
</html>