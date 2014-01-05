<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Shop | WPILIFE</title>
	<?php $this->load->view('includes/import');?>
	<script type="text/javascript">
		$(document).ready(function() 
		{
			$('.wpilife_tab').attr('id', 'current');
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

		<h2>Shop</h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo base_url();?>">Home</a></li>
				<li>Shop</li>
			</ul>
		</nav>

	</div>

</div>
<!-- 960 Container / End -->


<div class="container floated">
	<?php //print_r($blog);?>
<!-- Page Content -->
	<div class="eleven floated">
		<div class="shop-page page-content">
		
		<!-- Isotope -->
		<div id="portfolio-wrapper">
		<?php 
			if($blog_list)
			{
				foreach($blog_list as $row)
				{
		?>
			<!-- Shop Item -->
			<div class="four-shop columns isotope-item">
				<div class="shop-item">
					<figure>
						<a href="<?php echo base_url();?>wpilife/shop/product/<?php echo $row->blogs_id;?>"><img src="<?php echo base_url().'images/shop/'.substr_replace($row->blogs_image_cover, '_small', -4, 0);?>" alt="" /></a>
						<figcaption class="item-description" style="height:60px;">
							<a href="<?php echo base_url();?>wpilife/shop/product/<?php echo $row->blogs_id;?>"><h5><?php echo $row->blogs_title;?></h5></a>
							<span><?php echo $row->blogs_price; ?></span>
						</figcaption>
					</figure>
				</div>
			</div>
		<?php
				}
			}
			else
			{
		?>
			<!-- Shop Item -->
			<div class="four-shop columns isotope-item">
				<div class="shop-item">
					<figure>
						<img src="<?php echo base_url();?>images/shop/noItem.jpg" alt="" />
						<figcaption class="item-description">
							<h5>No Items In Shop</h5>						
						</figcaption>
					</figure>
				</div>
			</div>
		<?php		
			}
		?>
			
			
		</div>
		<!-- Isotope / End -->

		<div class="sixteen columns">
			<!-- Pagination -->
			<nav class="pagination">
				<ul>
					<?php echo $pagination;?>
				</ul>
				<div class="clearfix"></div>
			</nav>
		</div>

	</div>
	</div>
	<!-- Page Content / End -->

	<!-- Sidebar -->
	<div class="four floated sidebar right">
	<?php $this->load->view('includes/shop_right_menu');?>
	</div>
	<!-- Page Content / End -->

</div>
</div>
<!-- Content / End -->

</div>
<?php $this->load->view('includes/footer');?>
</body>
</html>