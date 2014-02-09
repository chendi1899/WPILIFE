<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php $this->load->view('includes/import');?>
	<script type="text/javascript">
		$(document).ready(function() 
		{
			$('.shop_tab').attr('id', 'current');
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

		<h2>Product</h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo base_url();?>">Home</a></li>
				<li>Product</li>
			</ul>
		</nav>

	</div>

</div>
<!-- 960 Container / End -->


<div class="container floated">
	<!-- Page Content -->
	<div class="eleven floated">
		<div class="shop-page page-content">

			<div class="six columns">
				<section class="flexslider shop">
					<ul class="slides">
						<li><a href="<?php echo base_url().'images/shop/'.$product['shop_image_cover'] ?>" rel="fancybox-gallery" title="<?php echo $product['shop_title']?>">
						<img src="<?php echo base_url().'images/shop/'.substr_replace($product['shop_image_cover'], '_small', -4, 0);?>" alt="" /></a></li>
					</ul>
				</section>
			</div>

			<div class="five columns">
				<div class="product-info">
					<h3 class="title"><?php echo $product['shop_title']?></h3>
					<span class="price"><?php echo $product['shop_price']?></span>
					<p><strong>Attention</strong>: WPILIFE website just provide a platform. Everyone in WPI can register with his/her WPI email, and can submit what he/she want to sell. We try to make things as easy as possible.<br/>
					<strong>If this item interests you, you can contact the owner directly! [You can find the contact info of Owner below]</strong><br/>
					Thanks for your support!</p>

				</div>
			</div>
			
			<div class="clearfix"></div>
			<br />
			
			<div class="eleven columns">
				<!-- Tabs Navigation -->
				<ul class="tabs-nav">
					<li class="active"><a href="#tab1">Description</a></li>
					<li><a href="#tab2">Owner Conatct Information</a></li>
				</ul>

				<!-- Tabs Content -->
				<div class="tabs-container">
					<div class="tab-content" id="tab1">
						<?php echo $product['shop_content']; ?>

					</div>

					<div class="tab-content" id="tab2">
						<table class="standard-table shop">

							<tr>
								<th>Name</th>
								<td><?php echo $product['users_firstname']." ".$product['users_lastname']; ?></td>
							</tr>

							<tr>
								<th>Address</th>
								<td><?php echo $product['users_address']; ?></td>
							</tr>

							<tr>
								<th>Phone</th>
								<td><?php echo $product['users_telephone']; ?></td>
							</tr>
							
							<tr>
								<th>QQ</th>
								<td><?php echo $product['users_qq']; ?></td>
							</tr>	
							<tr>
								<th>Email</th>
								<td><?php echo $product['users_email_address']; ?></td>
							</tr>						

						</table>
					</div>

				</div>
			</div>

			<div class="clearfix"></div>
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