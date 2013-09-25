<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title;?> | WPILIFE</title>
	<?php $this->load->view('includes/import');?>
	<script type="text/javascript">
		$(document).ready(function() 
		{
			$('.about_tab').attr('id', 'current');
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

		<h2><?php echo $title;?> </h2>

	</div>

</div>
<!-- 960 Container / End -->


<!-- Page Content -->
<div class="page-content">

	<!-- 960 Container -->
	<div class="container">

		<!-- Sixteen Columns -->
		<div class="sixteen columns">
		<?php echo $content;?>

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