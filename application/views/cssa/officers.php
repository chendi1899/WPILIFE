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
	<?php echo link_tag('css/officers.css'); ?>
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






<div  id="officer-content">

 
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
 			<div class="people-listing">
 				 <div class="captioned-content">
    			<a href="#">
      			<img src="<?php echo base_url();?>images/officers/<?php echo $director[0]->photo;?>" alt="<?php echo $director[0]->name;?>">
   			 </a>
    			<p><?php echo $director[0]->name;?></p>
  			</div>

 				<div class="contact-info-container">
    			<div class="contact-info">
     				<h2>Contact Information:</h2>
      			<p>WPI <?php echo $director[0]->major; ?> Department<br>
         		<a href="mailto:wpilife@gmail.com"><?php echo $director[0]->email ?></a>
      			</p>
    			</div>
  			</div>
  			<h2><a href="#"><?php echo $director[0]->name;?></a></h2>
  			<ul class="titles">
    			<li><div><?php echo $officer->title;?></a></div></li>
     		</ul>
  			<p><?php echo $director[0]->des;?></p>
		</div> <!--end of people listing -->
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
