<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
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

		<h2><?php echo $title; ?></h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo base_url();?>">Home</a></li>
				<li>Pohs</li>
			</ul>
		</nav>

	</div>

</div>
<!-- 960 Container / End -->


<div class="container floated">
	<?php //print_r($shop);?>
	<!-- Page Content -->
	<div class="eleven floated">
		<!-- Post -->
	<?php 
		if($shop_list)
		{
			foreach($shop_list as $row)
			{
	?>
		<!-- Post -->
		<article class="post medium">

		<section class="date">
			<span class="day"><?php echo  date("d", strtotime($row->shop_date)); ?></span>
			<span class="month"><?php echo date("M", strtotime($row->shop_date)); ?></span>
		</section>

		<div class="medium-content">

			<header class="meta">
				<h2><a href="<?php echo base_url()?>wpilife/pohs/detail/<?php echo $row->shop_id; ?>"><?php echo $row->shop_title; ?></a></h2>
				<span><i class="halflings user"></i>By <?php echo $row->users_firstname." ".$row->users_lastname; ?></span>
			</header>
			<p>
			<?php echo mb_substr(strip_tags($row->shop_content), 0, 140); ?>...
			</p>
			<a href="<?php echo base_url()?>wpilife/pohs/detail/<?php echo $row->shop_id; ?>" class="button color">Read More</a>

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
	<?php $this->load->view('includes/pohs_right_menu');?>
	</div>
	<!-- Page Content / End -->

</div>
</div>
<!-- Content / End -->

</div>
<?php $this->load->view('includes/footer');?>
</body>
</html>