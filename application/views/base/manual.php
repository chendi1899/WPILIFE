<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title ?></title>
	<?php $this->load->view('includes/import');?>
	<script type="text/javascript">
		$(document).ready(function() 
		{
			$('.docs_tab').attr('id', 'current');
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

		<h2>Manual</h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li>Manual</li>
			</ul>
		</nav>

	</div>

</div>
<!-- 960 Container / End -->


<!-- 960 Container -->
<div class="container floated">
		<!-- Sidebar -->
	<div class="four floated sidebar left">
		<aside class="sidebar padding-reset">

			<div class="widget">
				<p>
					This is the Manual!<br/>
					Wish it makes your life easier. 
				</p>
			</div>

			<div class="widget">
				<ul class="categories">
				<?php 
					if($list){
						foreach($list as $row){
							echo '<li>'.anchor('manual/'.$row->id, $row->title).'</li>';
						}
					}
				?>
				</ul>
			</div>
			<?php echo br(2);?>
		</aside>
	</div>
	<!-- Sidebar / End -->

	<!-- Page Content -->
	<div class="eleven floated right">
		<section class="page-content">

			<h2><?php echo $head; ?></h2>
			<hr/>

			<section>

			<?php echo $content; ?>

			</section>

		</section>	

	</div>
	<!-- Page Content / End -->


</div>
<!-- 960 Container / End -->


</div>
</div>
<?php $this->load->view('includes/footer');?>
</body>
</html>