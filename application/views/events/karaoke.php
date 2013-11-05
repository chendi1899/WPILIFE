<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Karaoke Competition</title>
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

		<h2>Second Karaoke Competition | CSSA</h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo base_url();?>">Home</a></li>
				<li>Second Karaoke Competition</li>
			</ul>
		</nav>

	</div>

</div>
<!-- 960 Container / End -->

<!-- Page Content -->
<div class="page-content portfolio">

	<!-- 960 Container -->
	<div class="container">
		<div class="sixteen columns">

			<!-- Filters -->
			<div id="filters" class="filters-dropdown"><span></span>
				<ul class="option-set" data-option-key="filter">
					<li><a href="#filter" class="selected" data-option-value="*">All</a></li>
					<li><a href="#filter" data-option-value=".f">Female</a></li>
					<li><a href="#filter" data-option-value=".m">Male</a></li>
				</ul>
			</div>

		</div>
	</div>
	<!-- 960 Container / End -->

	<!-- 960 Container -->
	<div class="container">

		<!-- Portfolio Content -->
		<div id="portfolio-wrapper">
			<?php 
				if($singers)
				{
					foreach($singers as $singer)
					{

			?>
			<!-- 1/4 Column -->
			<div class="four columns isotope-item <?php echo $singer->users_gender; ?> technology">
				<a class="portfolio-item isotope woocommerce-main-image zoom"  href="<?php echo base_url();?>images/portfolio/portfolio-01.jpg" rel="fancybox-gallery" title="Time Is Running Out">
					<figure>
						<img src="<?php echo base_url();?>images/portfolio/portfolio-01.jpg" alt=""/>
						<figcaption class="item-description">
							<h5><?php echo $singer->song; ?></h5>
							<span><?php echo $singer->users_firstname." ".$singer->users_lastname; ?></span><br/>
							<span><?php echo $singer->count; ?></span>
						</figcaption>
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