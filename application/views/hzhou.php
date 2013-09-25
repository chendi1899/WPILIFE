<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title;?></title>
	<?php $this->load->view('includes/import');?>
</head>
<body>
<!-- Wrapper / Start -->
<div id="wrapper">
<?php $this->load->view('includes/header');?>
<div id="content">


<!-- 960 Container -->
<div class="container floated">

	<div class="sixteen floated page-title">

		<h2><?php echo $string;?></h2>

	</div>

</div>
<!-- 960 Container / End -->


<!-- Page Content -->
<div class="page-content">

	<!-- 960 Container -->
	<div class="container">

		<!-- Sixteen Columns -->
		<div class="sixteen columns">

			<section id="not-found">
				<h2>I am Hao!</h2>

				<table><tr><td>name</td><td><?php echo $array['name']; ?></td></tr><tr><td>gender</td><td><?php echo $array['gender']; ?></td></tr></table>
			</section>

		</div>

	</div>
	<!-- 960 Container / End -->

</div>
<!-- Page Content / End -->


</div>
</div>
<?php $this->load->view('includes/footer');?>
</body>
</html>