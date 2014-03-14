<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>House | WPILIFE</title>
	<?php $this->load->view('includes/import');?>
	<script type="text/javascript">
		$(document).ready(function() 
		{
			$('.house_tab').attr('id', 'current');
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

		<h2>House</h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo base_url();?>">Home</a></li>
				<li>House</li>
			</ul>
		</nav>

	</div>

</div>
<!-- 960 Container / End -->



<!-- 960 Container -->
<div class="container floated">

	<!-- Page Content -->
	<div class="eleven floated">
	
	<?php 
		if($house_list)
		{
			foreach($house_list as $row)
			{
	?>
		<!-- Post -->
		<article class="post medium">

		<section class="date">
			<span class="day"><?php echo  date("d", strtotime($row->available_date)); ?></span>
			<span class="month"><?php echo date("M", strtotime($row->available_date)); ?></span>
		</section>

		<div class="medium-content">

			<header class="meta">
				<h2><a href="<?php echo base_url()?>wpilife/house/getHouse/<?php echo $row->house_id; ?>"><?php echo $row->addr." [$".$row->month_rent." for ".$row->bedrooms_count ."]"; ?></a></h2>
				<span><i class="halflings user"></i>By <?php echo $row->users_firstname." ".$row->users_lastname; ?></span>
			</header>
			<p>
			<?php echo mb_substr(strip_tags($row->des), 0, 140); ?>...
			</p>
			<a href="<?php echo base_url()?>wpilife/house/getHouse/<?php echo $row->house_id; ?>" class="button color">Read More</a>

		</div>

		</article>

		<!-- Divider -->
		<div class="line"></div>

	<?php
			}
		}
		else
		{
	?>
			<!-- Post -->
		<article class="post medium">

			=(<br/>No Content Now!

		</article>

		<!-- Divider -->
		<div class="line"></div>
	<?php
		}
	?>
		

		<!-- Pagination -->
		<nav class="pagination">
			<ul>
				<?php echo $pagination;?>
			</ul>
			<div class="clearfix"></div>
		</nav>

	</div>
	<!-- Content / End -->


	<!-- Sidebar -->
	<div class="four floated sidebar right">
	<?php $this->load->view('includes/house_right_menu');?>
	</div>
	<!-- Page Content / End -->

</div>
<!-- 960 Container / End -->
</div>
<!-- Content / End -->

</div>
<?php $this->load->view('includes/footer');?>
</body>
</html>