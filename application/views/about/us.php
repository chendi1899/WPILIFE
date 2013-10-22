<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title;?> | WPILIFE</title>
	<?php $this->load->view('includes/import');?>
	<script type="text/javascript">
		$(document).ready(function() 
		{
			$('.about_tab').attr('id', 'current');
		});
		
	</script>
</head>
<body>
<!-- Wrapper / Start -->
<div id="wrapper">
<?php $this->load->view('includes/header');?>
<div id="content">


<!-- 960 Container -->
<div class="container floated">

	<div class="sixteen floated page-title">

		<h2>About Us</h2>

	</div>

</div>
<!-- 960 Container / End -->


<!-- Page Content -->
<div class="page-content">

<!-- 960 Container -->
<div class="container">

	<!-- About -->
	<div class="one-third column">
		<img src="<?php echo base_url();?>images/avatar/zhehuang.jpg" alt=""/>
		<div class="team-name"><h5>Zhe Huang</h5></div>
		<div class="team-about"><p>Want to change your photo? OK, just send me yours with size 300*200! Haha, before you send me your photo, this will remain!</p></div>
	</div>

	<!-- About -->
	<div class="one-third column">
		<div class="clear"></div>
		<img src="<?php echo base_url();?>images/avatar/shuyuanlai.jpg" alt=""/>
		<div class="team-name"><h5>Shuyuan Lai</h5> </div>
		<div class="team-about"><p>Want to change your photo? OK, just send me yours with size 300*200! Haha, before you send me your photo, this will remain!</p></div>
	</div>

	<!-- About -->
	<div class="one-third column">
		<img src="<?php echo base_url();?>images/avatar/kejiangliu.jpg" alt=""/>
		<div class="team-name"><h5>Kejiang Liu</h5> </div>
		<div class="team-about"><p>Want to change your photo? OK, just send me yours with size 300*200! Haha, before you send me your photo, this will remain!</p></div>
	</div>

	<div class="clearfix"></div>
	<br/>
	
	<div class="one-third column">
		<img src="<?php echo base_url();?>images/avatar/default.png" alt=""/>
		<div class="team-name"><h5>Hongyu Zhou</h5></div>
		<div class="team-about"><p>Want to change your photo? OK, just send me yours with size 300*200! Haha, before you send me your photo, this will remain!</p></div>
	</div>

	<!-- About -->
	<div class="one-third column">
		<div class="clear"></div>
		<img src="<?php echo base_url();?>images/avatar/tianyuwei.jpg" alt=""/>
		<div class="team-name"><h5>Tianyu Wei</h5> </div>
		<div class="team-about"><p>Want to change your photo? OK, just send me yours with size 300*200! Haha, before you send me your photo, this will remain!</p></div>
	</div>
	
	<!-- About -->
	<div class="one-third column">
		<a href="http://sbzhouhao.net/about/" target="_blank">
			<img src="<?php echo base_url();?>images/avatar/crazyegg.png" alt=""/>
		</a>
		<div class="team-name"><h5>Crazy Egg</h5> </div>
		<div class="team-about"><p>Thanks for my girlfriend, as you never show up to me(even I am trying to show up to you), then I can "waste" my time on this website.<br/> You can contact me at: <a href="mailto:zhouhao@wpilife.org">zhouhao@wpilife.org</a></p></div>
	</div>
	<br/>
</div>
<!-- 960 Container / End -->

</div>
<!-- Page Content / End -->


</div>
</div>
<?php $this->load->view('includes/footer');?>
</body>
</html>