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

		<h2><?php echo $title;?> </h2>

	</div>

</div>
<!-- 960 Container / End -->


<!-- Page Content -->
<div class="page-content">

	<!-- 960 Container -->
	<div class="container">

	<!-- Texts -->
	<div class="two-thirds column">
		<p><span class="dropcap ">H</span>i 
		<?php
			if($this->session->userdata('users_firstname')!= null) 
			{
				echo $this->session->userdata('users_firstname');
			}
		?>, nice to see you. Actually, this is just a website, a very simple website. And I wish it could help you. </p>
		<p>I have made this website open source at Github: <a href="https://github.com/WPILIFE/WPILIFE" target="_blank">https://github.com/WPILIFE/WPILIFE</a>
		</p>
		<p><h3>I highly recommend you browse this website with <a href="https://www.google.com/intl/en/chrome/browser/" title="Click to download Chrome"><span style="color:red;">Chrome</span></a> or <a href="http://www.mozilla.org/en-US/firefox/new/" title="Click to download Firefox"><span style="color:red;">Firefox</span></a>! </h3></p>
		<p>If you have any question or need get some help, please contact me: <br/><?php echo safe_mailto('hzhou@wpi.edu', 'hzhou[at]wpi.edu');?> or <?php echo safe_mailto('wpilife@gmail.com', 'wpilife[at]gmail.com');?></p>
	</div>

	<div class="one-third column">

		<!-- Large Notice -->
		<div class="large-notice">
			<h3>Thanks for your visiting</h3>
			<p>Sometimes, I think about what if no one like this website after I created it, which I am having put a lot of effort into. 
			<br/>So, thanks for your visiting.</p>
		</div>

	</div>
	<!-- Texts / End -->

	</div>
	<!-- 960 Container / End -->
	<br />

	<!-- 960 Container -->
	<div class="container">

		<!-- Extras -->
		<div class="eight columns">
				<!-- Headline --><br />
				<h3 class="margin-reset">Why I Do?</h3><br />

				<!-- Accordion -->
				<div class="accordion">

					<!-- Section 1 -->
					<h3><span class="ui-accordion-header-icon ui-icon ui-accordion-icon ui-accordion-icon-active"></span>Why I do this?</h3>
					<div>
						<p><del>For fun!</del><br/>I start it for fun, but as it goes on, I find it is not so funny, and it costs my limited time day by day. So, at last I don't know why I did this, becasue I have no time to consider the reason. </p>
					</div>

					<!-- Section 2 -->
					<h3><span class="ui-accordion-header-icon ui-icon ui-accordion-icon"></span>Why I do not use existed CMS, such as WordPress?</h3>
					<div>
						<p>Because if I code this website from scratch, I can extend it at my will, and nothing can hinder me then, even it will cost me more at the very beginning, but it deserves.</p>
					</div>

					<!-- Section 3 -->
					<h3><span class="ui-accordion-header-icon ui-icon ui-accordion-icon"></span>Why I made it for CSSA?</h3>
					<div>
						<p>Actually it is not only for CSSA, but for all [Chinese] Students, and I wish I can make more and more features on this website. Collaboration with CSSA will make everything easier. </p>
					</div>
				</div>
				<!-- Accordion / End -->
		</div>

		<div class="eight columns">
			<!-- Headline --><br />
			<h3 class="margin-reset">How I Do?</h3><br />
			<div id="skill-bars">
				<div class="skill-bar"><div class="skill-bar-content" data-percentage="70"></div><span class="skill-title">HTML5 & CSS3 </span></div>
				<div class="skill-bar"><div class="skill-bar-content" data-percentage="80"></div><span class="skill-title">JavaScript(jQuery) </span></div>
				<div class="skill-bar"><div class="skill-bar-content" data-percentage="90"></div><span class="skill-title">PHP(CodeIgniter)</span></div>
				<div class="skill-bar"><div class="skill-bar-content" data-percentage="85"></div><span class="skill-title">MySQL</span></div>
				<div class="skill-bar"><div class="skill-bar-content" data-percentage="75"></div><span class="skill-title">Anything which is cool enough</span></div>
			</div>

		</div>
		<!-- Extras / End -->

	</div>
	<!-- 960 Container / End -->

	<br />
	<br />
</div>
<!-- Page Content / End -->


</div>
</div>

<?php
//print_r($country);
/*
	foreach($country as $item)
	{
		echo "\"$item->countries_name\", ";
	}
*/	

?>
<?php $this->load->view('includes/footer');?>
</body>
</html>