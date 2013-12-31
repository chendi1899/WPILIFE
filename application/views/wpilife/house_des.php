<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>House Detail | WPILIFE</title>
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

		<h2>House Detail</h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo base_url();?>">Home</a></li>
				<li>House Detail</li>
			</ul>
		</nav>

	</div>

</div>
<!-- 960 Container / End -->


<div class="container floated">
	<!-- Page Content -->
	<div class="eleven floated">
		<div class="shop-page page-content">
			<header class="meta">
				<h2><?php echo $house['addr'] . " [ $".$house['month_rent'] ." for ". $house['bedrooms_count']." bedroom(s) ] ";?></h2>
				<span><i class="halflings user"></i>By <?php echo $house['users_firstname']." ".$house['users_lastname']; ?></span>
			</header>
			<br />
			
			<div class="eleven columns">
				<!-- Tabs Navigation -->
				<ul class="tabs-nav">
					<li class="active"><a href="#tab1">Description</a></li>
					<li><a href="#tab2">Conatct Information</a></li>
				</ul>

				<!-- Tabs Content -->
				<div class="tabs-container">
					<div class="tab-content" id="tab1">
						<table class="standard-table shop">
							<tr>
								<th>Address</th>
								<td><?php echo $house['addr']; ?></td>
							</tr>

							<tr>
								<th>Available date</th>
								<td><?php echo $house['available_date']; ?></td>
							</tr>
							
							<tr>
								<th>Bedroom Count</th>
								<td><?php echo $house['bedrooms_count']; ?></td>
							</tr>	
							<tr>
								<th>Month Rent</th>
								<td><?php echo "$".$house['month_rent']; ?></td>
							</tr>						

						</table>
						<br/>
						<?php echo $house['des']; ?>

					</div>

					<div class="tab-content" id="tab2">
						<table class="standard-table shop">

							<tr>
								<th>Name</th>
								<td><?php echo $house['users_firstname']." ".$house['users_lastname']; ?></td>
							</tr>

							<tr>
								<th>Phone</th>
								<td><?php echo $house['users_telephone']; ?></td>
							</tr>
							
							<tr>
								<th>QQ</th>
								<td><?php echo $house['users_qq']; ?></td>
							</tr>	
							<tr>
								<th>Email</th>
								<td><?php echo safe_mailto($house['users_email_address'],
														   str_replace('@','[at]',$house['users_email_address'])); ?></td>
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
	<?php $this->load->view('includes/house_right_menu');?>
	</div>
	<!-- Page Content / End -->

</div>
</div>
<!-- Content / End -->

</div>
<?php $this->load->view('includes/footer');?>
</body>
</html>