<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>WPILIFE</title>
	<?php $this->load->view('includes/import');?>
	<?php $this->load->view('includes/kindeditor');?>
</head>
<body>
<!-- Wrapper / Start -->
<div id="wrapper">
<?php $this->load->view('includes/header');?>
<div id="content">


<!-- 960 Container -->
<div class="container floated">

	<div class="sixteen floated page-title">

		<h2>FAQ Center</h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li>FAQ Center</li>
			</ul>
		</nav>

	</div>

</div>
<!-- 960 Container / End -->


<!-- 960 Container -->
<div class="container floated">
	<?php $this->load->view('includes/cssa_left_menu');?>
	<!-- Page Content -->
	<div class="eleven floated right">
		<section class="page-content">
			<h3 class="margin">FAQ Update</h3>
				<!-- Contact Form -->
				<section id="account">
				
					<!-- Form for Basic Information-->
					<?php 
						$attibutes = array('id'=>'kindeditor', 'name'=>'kindeditor');
						echo form_open('manage/cssa/faq_updates?action=update',$attibutes);
						echo form_hidden('faq_id', $faq['faq_id']);
					?>
						<fieldset>
						<table width="100%">
							<tr>
								<td>
									<select name="faq_type" id="faq_type" style="display:inline;" >
									<?php
									foreach ($faq_type as $row)
									{	
										if($faq['faq_type'] == $row->type)
										{ 
											echo "<option selected value='".$row->type."'>". $row->type."</option>";
										}										
										else
										{
											echo "<option value='".$row->type."'>". $row->type."</option>";
										}
									}
									?>	
									</select> 
								</td>
							</tr>
							<tr>
								<td><input type="text" name="question" id="question" value="<?php echo $faq['faq_questions']; ?>"/></td>
							</tr>
							<tr>
								<td><textarea name="content" cols="40" rows="3" id="content"><?php echo $faq['faq_answers']; ?></textarea></td>
							</tr>
							<tr>
								<td style="float: right;"><input type="submit" class="submit" id="submit" value=" Update " /></td>
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
</body>
</html>