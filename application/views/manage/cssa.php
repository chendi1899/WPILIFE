<!DOCTYPE html>
<html lang="en">
<head>
	<?php session_start(); ?>
	<meta charset="utf-8">
	<title>WPILIFE</title>
	<?php $this->load->view('includes/import');?>
	<?php //require('includes/import.php');?>
</head>
<body>
<!-- Wrapper / Start -->
<div id="wrapper">
<?php $this->load->view('includes/header');?>
<div id="content">


<!-- 960 Container -->
<div class="container floated">

	<div class="sixteen floated page-title">

		<h2>CSSA Manage Center</h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li>CSSA Manage Center</li>
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
			<h3 class="margin"><?php echo $page_title?></h3>
			<p class="margin"><?php echo $page_intro?></p>

				<!-- Contact Form -->
				<section id="account">
				
					<!-- Form for Basic Information-->
					<?php 
					switch($show_form)
					{
						case 1:	
						$attibutes = array('id'=>'userInfo', 'name'=>'userInfo');
						echo form_open('manage/user?action=update',$attibutes);
					?>
						<fieldset>
						<table width="100%">
							<tr>
								<th><label for="Email">Your login Email:</label></th>
								<td><label class="emphasize"><?php echo $users_email_address;?></label> | 
									<?php echo anchor('user/passwordModify','Change your Password','title="Change your Password"'); ?></td>
							</tr>
							<tr>
								<th><label for="firstName">First Name:</label></th>
								<td><input name="firstName" type="text" id="firstName" required="required" value="<?php echo $users_firstname;?>" /><span> *</span></td>
							</tr>
							<tr>
								<th><label for="lastName">Last Name:</label></th>
								<td><input name="lastName" type="text" id="lastName" required="required" value="<?php echo $users_lastname;?>" /><span> *</span></td>
							</tr>
							<tr>
								<th><label for="address">Current Address:</label></th>
								<td><input name="address" type="text" id="address" required="required"  value="<?php echo $users_address;?>"/><span> *</span></td>
							</tr>
							<tr>
								<th><label for="hometown">Hometown:</label></th>
								<td><input name="hometown" type="text" id="hometown" required="required"  value="<?php echo $users_city;?>"/><span> *</span></td>
							</tr>
							<tr>
								<th><label for="university">Graduate University:</label></th>
								<td><input name="university" type="text" id="university" required="required"  value="<?php echo $users_graduate_university;?>"/><span> *</span></td>
							</tr>
							<tr>
								<th><label for="gender">Gender: </label></th>
								<td>
									<select name="gender">
										<option <?php if($users_gender == 'm') {echo 'selected';} ?> value="m">male</option>
										<option <?php if($users_gender == 'f') {echo 'selected';} ?> value="f">female</option>
									</select>
								</td>
							</tr>
							<tr>
								<th><label for="comment">Personal Description: </label></th>
								<td><textarea name="comment" cols="40" rows="3" id="comment"> <?php echo $users_description;?></textarea><span> *</span></td>
							</tr>
							<tr>
								<th>&nbsp;</th>
								<td><input type="submit" class="submit" id="submit" value=" Save " /></td>
							</tr>
						</table>
						</fieldset>
						<div class="clearfix"></div>
					</form>
					<?php 
						break;
					case 2:
						$attibutes = array('id'=>'passwordModify', 'name'=>'passwordModify');
						echo form_open('manage/user/passwordModify?action=update',$attibutes);
					?>
						<fieldset id="passwordModify">
						<table width="100%">
							<tr>
								<td><input name="oldPassword" type="password" placeholder="old password" id="oldPassword" required="required" /></td>
							</tr>
							<tr>
								<td><input name="newPassword" type="password" placeholder="new password" id="newPassword" required="required"  /></td>
							</tr>
							<tr>
								<td><input name="newPasswordConfirm" type="password" placeholder="new password confirm" id="newPasswordConfirm" required="required" /></td>
							</tr>
							<tr>
								<td><input type="submit" class="submit" id="submit" value=" Save " />
									<br/>
	                    			<?php echo validation_errors();?>
								</td>
							</tr>
						</table>
						</fieldset>
						<div class="clearfix"></div>
					</form>
					<?php
						break;
					case 3:
						$_SESSION['id']=$this->session->userdata('users_id');
					?>
						<iframe src="<?php echo base_url(); ?>avatar/index.php" width="600px" height="600px"></iframe>
					<?php
						break;
					}
					?>
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