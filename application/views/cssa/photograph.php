<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title;?></title>
	<?php $this->load->view('includes/import');?>
	<script type="text/javascript">
		$(document).ready(function() 
		{
			$('.cssa_tab').attr('id', 'current');
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

		<h2>CSSA Photograph</h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo base_url();?>">Home</a></li>
				<li>CSSA Photograph</li>
			</ul>
		</nav>

	</div>

</div>
<!-- 960 Container / End -->

<!-- Page Content -->
<div class="page-content portfolio">

	<!-- 960 Container -->
	<div class="container">

		<!-- Portfolio Content -->
		<div id="portfolio-wrapper">
		<?php 
		if($images)
		{
			foreach($images as $image)
			{
		
		?>
			<!-- 1/4 Column -->
			<div class="four columns isotope-item">
				<a class="portfolio-item isotope woocommerce-main-image zoom"  href="<?php echo base_url();?>/elfinder/files/<?php echo $album; ?>/<?php echo $image; ?>" rel="fancybox-gallery" title="<?php echo $album; ?>">
					<figure>
						<img src="<?php echo base_url();?>elfinder/files/<?php echo $album; ?>/.<?php echo $image; ?>" alt=""/>
					</figure>
				</a>
			</div>
		<?php
			}
		}
		?>

		</div>
		<!-- Portfolio Content / End -->
		<!-- Divider -->
		<br/>
		<div class="line"></div>
		<!-- Comments -->
		<section class="comments-sec">
		
			<!-- UY BEGIN -->
			<div id="uyan_frame"></div>
			<script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js?uid=1770934"></script>
			<!-- UY END -->
		
		</section>
		<div class="clearfix"></div>
	</div>
	<!-- 960 Container / End -->


</div>
<!-- Page Content / End -->

</div>
<!-- Content / End -->

</div>
<?php $this->load->view('includes/footer');?>
</body>
</html>