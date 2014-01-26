<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title;?> | WPILIFE</title>
	<?php $this->load->view('includes/import');?>
	<script type="text/javascript">
		$(document).ready(function() 
		{
			$('.about_cssa_tab').attr('id', 'current');
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
	<?php
	if($officers)
	{
		$count = 0;
		foreach($officers as $officer)
		{
			//print_r($officer->directors);
			foreach($officer->directors as $director)
			{
	?>
	<!-- About -->
	<div class="one-third column">
		<img src="<?php echo base_url();?>images/officers/<?php echo $director[0]->photo;?>" alt=""/>
		<div class="team-name"><h5><?php echo $director[0]->name;?></h5><span><?php echo $officer->title;?></span></div>
		<div class="team-about"><p><?php echo $director[0]->des;?></p></div>
	</div>

	<?php
			$count = $count + 1;
			if( $count % 3 == 0) echo '<div class="clearfix"></div>';
			}
		}

	}
	?>
</div>
<!-- 960 Container / End -->

</div>
<!-- Page Content / End -->

</div>
<!-- Page Content / End -->


</div>
</div>
<?php $this->load->view('includes/footer');?>
</body>
</html>