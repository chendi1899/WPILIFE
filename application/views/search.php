<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Search for CSSA Issues</title>
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

		<h2><?php echo $title; ?></h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo base_url();?>">Home</a></li>
				<li>CSSA Issues Search</li>
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
		if($list)
		{
			foreach($list as $row)
			{
	?>
		<!-- Post -->
		<article class="post medium">

		<section class="date">
			<span class="day"><?php echo $row->day; ?></span>
			<span class="month"><?php echo substr($row->month, 0, 3); ?></span>
		</section>

		<div class="medium-content">

			<header class="meta">
				<h2><a href="<?php echo base_url()?>cssa/<?php echo $row->type; ?>/<?php echo $row->id; ?>"><?php echo $row->title; ?></a></h2>
				<span><i class="halflings user"></i>By <?php echo $row->users_firstname." ".$row->users_lastname; ?></span>
			</header>
			<p>
			<?php echo mb_substr(strip_tags($row->content), 0, 140); ?>...
			</p>
			<a href="<?php echo base_url()?>cssa/blog/<?php echo $row->id; ?>" class="button color">Read More</a>

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
	<?php $this->load->view('includes/cssa_blog_right_menu');?>
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