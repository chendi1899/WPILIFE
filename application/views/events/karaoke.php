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
		<div class="notification closeable warning">
			<p> <b>Warning</b>: <br/>Account must be activated by email before you vote. Life takes more fun with rules :-) <br/> If you lost your activation link, just use your WPI email send "activate me" to <a href="mailto:hzhou@wpi.edu">hzhou@wpi.edu</a><br/>
			Sorry for this inconvenience!<a class="close" href="#"><i class="icon-remove"></i></a>
		</div>
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
			<div class="portfolio type-portfolio status-publish hentry one-third column isotope-item <?php echo $singer->users_gender; ?> technology">
				<a class="portfolio-item isotope woocommerce-main-image zoom fancybox fancybox.iframe"  href="<?php echo base_url();?>events/singerInfo/<?php echo $singer->singerID;?>" rel="fancybox-gallery" title="Second Karaoke Competition | CSSA
">
					<figure>
						<img src="<?php echo base_url();?>images/events/karaoke2013/<?php echo $singer->singerID; ?>.png" alt=""/>
						<figcaption class="item-description">
							<h5><?php echo $singer->song; ?></h5>
							<span><?php echo $singer->users_lastname." ".$singer->users_firstname; ?></span><br/>
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