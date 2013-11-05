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
		<div class="sixteen columns">

			<!-- Filters -->
			<div id="filters" class="filters-dropdown"><span></span>
				<ul class="option-set" data-option-key="filter">
					<li><a href="#filter" class="selected" data-option-value="*">All</a></li>
					<li><a href="#filter" data-option-value=".photography">Photography</a></li>
					<li><a href="#filter" data-option-value=".architecture">Architecture</a></li>
					<li><a href="#filter" data-option-value=".identity">Identity</a></li>
					<li><a href="#filter" data-option-value=".technology">Technology</a></li>
				</ul>
			</div>

		</div>
	</div>
	<!-- 960 Container / End -->

	<!-- 960 Container -->
	<div class="container">

		<!-- Portfolio Content -->
		<div id="portfolio-wrapper">

			<!-- 1/4 Column -->
			<div class="four columns isotope-item photography architecture technology">
				<a class="portfolio-item isotope woocommerce-main-image zoom"  href="<?php echo base_url();?>images/portfolio/portfolio-01.jpg" rel="fancybox-gallery" title="Time Is Running Out">
					<figure>
						<img src="<?php echo base_url();?>images/portfolio/portfolio-01.jpg" alt=""/>
						<figcaption class="item-description">
							<h5>Time Is Running Out</h5>
							<span>Photography</span>
						</figcaption>
					</figure>
				</a>
			</div>

			<!-- 1/4 Column -->
			<div class="four columns isotope-item architecture identity">
				<a class="portfolio-item isotope woocommerce-main-image zoom"  href="<?php echo base_url();?>images/portfolio/portfolio-02.jpg" rel="fancybox-gallery" title="Seeds of Growth">
					<figure>
					<img src="<?php echo base_url();?>images/portfolio/portfolio-02.jpg" class="attachment-shop_single wp-post-image" alt="Mountain Bike"/>
						<figcaption class="item-description">
							<h5>Seeds of Growth</h5>
							<span>Architecture</span>
						</figcaption>
					</figure>
				</a>
			</div>

			<!-- 1/4 Column -->
			<div class="four columns isotope-item identity photography">
				<a  class="portfolio-item isotope">
					<figure>
						<img src="<?php echo base_url();?>images/portfolio/portfolio-03.jpg" alt=""/>
						<figcaption class="item-description">
							<h5>Beautiful Flowers</h5>
							<span>Identity</span>
						</figcaption>
					</figure>
				</a>
			</div>

			<!-- 1/4 Column -->
			<div class="four columns isotope-item identity">
				<a  class="portfolio-item isotope">
					<figure>
						<img src="<?php echo base_url();?>images/portfolio/portfolio-04.jpg" alt=""/>
						<figcaption class="item-description">
							<h5>Poppy Flower</h5>
							<span>Identity</span>
						</figcaption>
					</figure>
				</a>
			</div>

			<!-- 1/4 Column -->
			<div class="four columns isotope-item photography architecture technology">
				<a  class="portfolio-item isotope">
					<figure>
						<img src="<?php echo base_url();?>images/portfolio/portfolio-05.jpg" alt=""/>
						<figcaption class="item-description">
							<h5>Death Valley</h5>
							<span>Photography</span>
						</figcaption>
					</figure>
				</a>
			</div>

			<!-- 1/4 Column -->
			<div class="four columns isotope-item photography technology">
				<a  class="portfolio-item isotope">
					<figure>
						<img src="<?php echo base_url();?>images/portfolio/portfolio-06.jpg" alt=""/>
						<figcaption class="item-description">
							<h5>Digital World</h5>
							<span>Technology</span>
						</figcaption>
					</figure>
				</a>
			</div>

			<!-- 1/4 Column -->
			<div class="four columns isotope-item architecture technology">
				<a  class="portfolio-item isotope">
					<figure>
						<img src="<?php echo base_url();?>images/portfolio/portfolio-07.jpg" alt=""/>
						<figcaption class="item-description">
							<h5>American Football</h5>
							<span>Architecture</span>
						</figcaption>
					</figure>
				</a>
			</div>

			<!-- 1/4 Column -->
			<div class="four columns isotope-item identity architecture">
				<a  class="portfolio-item isotope">
					<figure>
						<img src="<?php echo base_url();?>images/portfolio/portfolio-08.jpg" alt=""/>
						<figcaption class="item-description">
							<h5>Casual Shoes</h5>
							<span>Identity</span>
						</figcaption>
					</figure>
				</a>
			</div>

			<!-- 1/4 Column -->
			<div class="four columns isotope-item photography architecture">
				<a  class="portfolio-item isotope">
					<figure>
						<img src="<?php echo base_url();?>images/portfolio/portfolio-09.jpg" alt=""/>
						<figcaption class="item-description">
							<h5>Winter Mountains</h5>
							<span>Photography</span>
						</figcaption>
					</figure>
				</a>
			</div>

			<!-- 1/4 Column -->
			<div class="four columns isotope-item identity photography technology">
				<a  class="portfolio-item isotope">
					<figure>
						<img src="<?php echo base_url();?>images/portfolio/portfolio-10.jpg" alt=""/>
						<figcaption class="item-description">
							<h5>Fruits in Basket</h5>
							<span>Architecture</span>
						</figcaption>
					</figure>
				</a>
			</div>

			<!-- 1/4 Column -->
			<div class="four columns isotope-item identity">
				<a  class="portfolio-item isotope">
					<figure>
						<img src="<?php echo base_url();?>images/portfolio/portfolio-11.jpg" alt=""/>
						<figcaption class="item-description">
							<h5>Wireless Keyboard</h5>
							<span>Identity</span>
						</figcaption>
					</figure>
				</a>
			</div>

			<!-- 1/4 Column -->
			<div class="four columns isotope-item photography architecture">
				<a  class="portfolio-item isotope">
					<figure>
						<img src="<?php echo base_url();?>images/portfolio/portfolio-12.jpg" alt=""/>
						<figcaption class="item-description">
							<h5>Mountain Biking</h5>
							<span>Photography</span>
						</figcaption>
					</figure>
				</a>
			</div>

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