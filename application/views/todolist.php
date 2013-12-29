<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title;?> | WPILIFE</title>
	<?php $this->load->view('includes/import');?>
	<script type="text/javascript">
		$(document).ready(function() 
		{
			$('.contact_tab').attr('id', 'current');
		});
		
	</script>
	<style type="text/css">
	ol{margin-left:18px;}
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

		<h2><?php echo $title;?> </h2>
		<div class="clearfix"></div>
		You can know what we will do in next step here. You can contact <a href="mailto:wpilife@gmail.com">wpilife@gmail.com</a> for any issue with this website! Or you can <a href="<?php echo base_url();?>contact">contact us</a> thought website! =)<br/>
		Let's rock!
		<br/><br/>
	</div>

</div>
<!-- 960 Container / End -->

<!-- Page Content -->
<div class="page-content">
	<!-- 960 Container -->
	<div class="container">
		<!-- Sixteen Columns -->
		<div class="sixteen columns">
		<h1>What we have done:</h1>
		<hr style="border-top: 2px solid #000;">
		<h2>Account Module</h2>
		<ol>
		<li>Fast signing up only with your <a class="highlight light tooltip" data-original-title="Only WPI Email address are allowed when signing up">WPI email</a> (sure, password is also needed)</li>
		<li>You can update your personal information when login, and in Version 1.0, this website will collect the following information from each member:
			<ol>
			<li>First Name</li>
			<li>Last Name</li>
			<li>Current Address</li>
			<li>Hometown</li>
			<li>QQ -- Supported 08/25/2013 by Hao</li>
			<li>Telephone -- Supported 08/25/2013 by Hao</li>
			<li>Graduate University</li>
			<li>Gender</li>
			<li>Personal description</li>
			<li>You can also upload your avatar</li>
			<li><span class="highlight light">I will also collect QQ/phone and other contact information,<del> but it is not supported now</del> Supported Now</span> </li>
			<li>Collect Major info of Users -- 08/30/2013 </li>
			</ol>
		</li>
		<li>Update your password anytime you like</li>
		</ol>
		<hr/>
		<h2>CSSA Module</h2>
		<ol>
		<li>CSSA officer can add/update/delete blogs and activities - implemented 08-25-2013</li>
		<li>Photograph part is under construction</li>
		</ol>
		<hr/>
		<h2>Features</h2>
		<ol>
		<li>Suvival Guide(The whole version from PDF)</li>
		<li>FAQ part implemented (add filter to FAQ -> 08-23-2013 Hao)</li>
		<li>Every member can post what he/she want to sell, and the info will appear in the "shop"  tab inside "life@wpi"</li>
		<li>Also, he/she can post a request for something, such as if one needs a lamp </li>
		</ol>
		</div>
		<br/>
		<div class="sixteen columns">
		<h1>What we will do:</h1>
		<hr style="border-top: 2px solid #000;">
		<h2>Search Module</h2>
		<ol>
		<li><del>I have disabled the search input, as it is not support now!</del> Enabled 09/04/2013</li>
		<li>Focus on sale, and suspend the development of house resource.</li>
		<li>Comments of articles -- Maybe use plugin in first version</li>
		</ol>
		</div>
	
	</div>
	<!-- 960 Container / End -->
	<br/>
</div>
<!-- Page Content / End -->


</div>
</div>
<?php $this->load->view('includes/footer');?>
</body>
</html>