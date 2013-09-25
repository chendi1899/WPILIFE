<!DOCTYPE html>
<html lang="en">
<head>
	<?php session_start(); ?>
	<meta charset="utf-8">
	<title>WPILIFE</title>
	<?php $this->load->view('includes/import');?>
</head>
<body>
<!-- Wrapper / Start -->
<div id="wrapper">
<?php $this->load->view('includes/header');?>
<div id="content">


<!-- 960 Container -->
<div class="container floated">

	<div class="sixteen floated page-title">

		<h2>Account Center</h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li>Account Center</li>
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
									<?php echo anchor('manage/user/passwordModify','Change your Password','title="Change your Password"'); ?></td>
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
								<th><label for="lastName">Major:</label></th>
								<td>
									<select name="major" size="1" id="major">
									<option <?php if($users_major == 'AE') echo 'selected';?> value="AE">AEROSPACE ENGINEERING</option>
									<option <?php if($users_major == 'AS') echo 'selected';?> value="AS">AIR SCIENCE</option>
									<option <?php if($users_major == 'AB') echo 'selected';?> value="AB">ARABIC</option>
									<option <?php if($users_major == 'AREN') echo 'selected';?> value="AREN">ARCHITECTURAL ENGINEERING</option>
									<option <?php if($users_major == 'AR') echo 'selected';?> value="AR">ART</option>
									<option <?php if($users_major == 'BCB') echo 'selected';?> value="BCB">BIOINFORMATICS &amp; COMPUTNL BIOL</option>
									<option <?php if($users_major == 'BB') echo 'selected';?> value="BB">BIOLOGY</option>
									<option <?php if($users_major == 'BME') echo 'selected';?> value="BME">BIOMEDICAL ENGINEERING</option>
									<option <?php if($users_major == 'BUS') echo 'selected';?> value="BUS">BUSINESS</option>
									<option <?php if($users_major == 'CHE') echo 'selected';?> value="CHE">CHEMICAL ENGINEERING</option>
									<option <?php if($users_major == 'CH') echo 'selected';?> value="CH">CHEMISTRY</option>
									<option <?php if($users_major == 'CN') echo 'selected';?> value="CN">CHINESE</option>
									<option <?php if($users_major == 'CE') echo 'selected';?> value="CE">CIVIL ENGINEERING</option>
									<option <?php if($users_major == 'CS') echo 'selected';?> value="CS">COMPUTER SCIENCE</option>
									<option <?php if($users_major == 'ECON') echo 'selected';?> value="ECON">ECONOMICS</option>
									<option <?php if($users_major == 'ECE') echo 'selected';?> value="ECE">ELECTRICAL &amp; COMPUTER ENGIN</option>
									<option <?php if($users_major == 'ES') echo 'selected';?> value="ES">ENGINEERING SCIENCE</option>
									<option <?php if($users_major == 'EN') echo 'selected';?> value="EN">ENGLISH</option>
									<option <?php if($users_major == 'ETR') echo 'selected';?> value="ETR">ENTREPRENEURSHIP</option>
									<option <?php if($users_major == 'ENV') echo 'selected';?> value="ENV">ENVIRONMENTAL STUDIES</option>
									<option <?php if($users_major == 'FIN') echo 'selected';?> value="FIN">FINANCE</option>
									<option <?php if($users_major == 'FP') echo 'selected';?> value="FP">FIRE PROTECTION</option>
									<option <?php if($users_major == 'FY') echo 'selected';?> value="FY">FIRST YEAR</option>
									<option <?php if($users_major == 'GN') echo 'selected';?> value="GN">GERMAN</option>
									<option <?php if($users_major == 'GOV') echo 'selected';?> value="GOV">GOVERNMENT, POLITCL SCI, &amp; LAW</option>
									<option <?php if($users_major == 'HI') echo 'selected';?> value="HI">HISTORY</option>
									<option <?php if($users_major == 'HU') echo 'selected';?> value="HU">HUMANITIES</option>
									<option <?php if($users_major == 'ISE') echo 'selected';?> value="ISE">INT'L STUDENTS - ENGLISH</option>
									<option <?php if($users_major == 'IMGD') echo 'selected';?> value="IMGD">INTERACTIVE MEDIA &amp; GAME DEVEL</option>
									<option <?php if($users_major == 'ID') echo 'selected';?> value="ID">INTERDISCIPLINARY</option>
									<option <?php if($users_major == 'MIS') echo 'selected';?> value="MIS">MANAGEMENT INFORMATION SYSTEMS</option>
									<option <?php if($users_major == 'MFE') echo 'selected';?> value="MFE">MANUFACTURING ENGINEERING</option>
									<option <?php if($users_major == 'MKT') echo 'selected';?> value="MKT">MARKETING</option>
									<option <?php if($users_major == 'MTE') echo 'selected';?> value="MTE">MATERIAL SCIENCE &amp; ENGINEERING</option>
									<option <?php if($users_major == 'MA') echo 'selected';?> value="MA">MATHEMATICAL SCIENCES</option>
									<option <?php if($users_major == 'ME') echo 'selected';?> value="ME">MECHANICAL ENGINEERING</option>
									<option <?php if($users_major == 'ML') echo 'selected';?> value="ML">MILITARY LEADERSHIP</option>
									<option <?php if($users_major == 'MU') echo 'selected';?> value="MU">MUSIC</option>
									<option <?php if($users_major == 'NSE') echo 'selected';?> value="NSE">NUCLEAR SCIENCE &amp; ENGINEERING</option>
									<option <?php if($users_major == 'OIE') echo 'selected';?> value="OIE">OPERATIONS &amp; INDUSTRIAL ENGIN</option>
									<option <?php if($users_major == 'OBC') echo 'selected';?> value="OBC">ORGANIZ BEHAVIOR &amp; CHANGE</option>
									<option <?php if($users_major == 'PY') echo 'selected';?> value="PY">PHILOSOPHY</option>
									<option <?php if($users_major == 'PE') echo 'selected';?> value="PE">PHYSICAL EDUCATION</option>
									<option <?php if($users_major == 'PH') echo 'selected';?> value="PH">PHYSICS</option>
									<option <?php if($users_major == 'MPE') echo 'selected';?> value="MPE">PHYSICS FOR EDUCATORS</option>
									<option <?php if($users_major == 'PSY') echo 'selected';?> value="PSY">PSYCHOLOGY</option>
									<option <?php if($users_major == 'RE') echo 'selected';?> value="RE">RELIGION</option>
									<option <?php if($users_major == 'RBE') echo 'selected';?> value="RBE">Robotics Engineering</option>
									<option <?php if($users_major == 'SS') echo 'selected';?> value="SS">SOCIAL SCIENCE</option>
									<option <?php if($users_major == 'STS') echo 'selected';?> value="STS">SOCIETY/TECHNOLOGY STUDIES</option>
									<option <?php if($users_major == 'SOC') echo 'selected';?> value="SOC">SOCIOLOGY</option>
									<option <?php if($users_major == 'SP') echo 'selected';?> value="SP">SPANISH</option>
									<option <?php if($users_major == 'SD') echo 'selected';?> value="SD">SYSTEM DYNAMICS</option>
									<option <?php if($users_major == 'TSC') echo 'selected';?> value="TSC">TECHNICAL SHORT COURSES</option>
									<option <?php if($users_major == 'WR') echo 'selected';?> value="WR">WRITING</option>
									</select>
								</td>
							</tr>
							<tr>
								<th><label for="address">Current Address:</label></th>
								<td><input type="text" id="address" name="address" placeholder="your current address" autocomplete="off" value="<?php echo $users_address;?>" /><span> *</span></td>
							</tr>
							<tr>
							<tr>
								<th><label for="address">QQ:</label></th>
								<td><input type="text" id="qq" name="qq" placeholder="your QQ" autocomplete="off" value="<?php echo $users_qq;?>" /></td>
							</tr>
							<tr>
							<tr>
								<th><label for="telephone">Telephone:</label></th>
								<td><input type="text" id="telephone" name="telephone" placeholder="your telephone" autocomplete="off" value="<?php echo $users_telephone;?>" /></td>
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
	<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places" type="text/javascript"></script>

   	<script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(-33.8688, 151.2195),
          
        };
        var input = document.getElementById('address');
        var autocomplete = new google.maps.places.Autocomplete(input);

        var hometown = document.getElementById('hometown');
        var autocomplete = new google.maps.places.Autocomplete(hometown);
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</body>
</html>