<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title;?> | WPILIFE</title>
	<?php $this->load->view('includes/import');?>
  	<script type="text/javascript" src="<?php echo base_url();?>scripts/jcfilter.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() 
		{
			$('.new_students_tab').attr('id', 'current');
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

		<h2><?php echo $title;?></h2>
		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo base_url();?>">Home</a></li> 
				<li class="current_element">FAQ</li>
			</ul>
		</nav>
	</div>

</div>
<!-- 960 Container / End -->


<!-- Page Content -->
<div class="page-content">

	<!-- 960 Container -->
	<div class="container">
		       
		<!-- Twelve Columns -->
		<div class="two-thirds column">
		<h3 style="margin:10px 0;">Filter by keyword : <input type="text" id="filter" style="background:url(images/filter.png) 95% 60% no-repeat;display:inline; background-size:16px; width:250px"></h3>   
		<?php	
			if($faq)
			{
				foreach($faq as $row)
				{
			
		?>
			<div class="toggle-wrap jcorgFilterTextParent">
				<div class="jcorgFilterTextChild" style="display:none;"><?php echo $row->faq_questions; ?></div>
				<span class="trigger"><a href="#"><i class="toggle-icon"></i><div class="jcorgFilterTextChild"><?php echo $row->faq_questions; ?></div></a></span>
				<div class="toggle-container">
					<p><?php echo $row->faq_answers; ?></p>
				</div>
			</div>
		<?php
				}
			}
		?>

		</div>
		<!-- Twelve Columns / End -->
		<!-- Four Columns-->
		<div class="one-third column">
			<!-- Large Notice -->
			<div class="large-notice">
				<h2>Don't See the <br /> Answer You Need?</h2>
				<p>If you don't see the answer for your question send us a message and we will answer you as soon as possible.</p>
				<a href="<?php echo base_url();?>contact" class="button medium color">Contact Us</a>
			</div>
		</div>
		<!-- Four / End -->

		
	</div>
	<!-- 960 Container / End -->

</div>
<!-- Page Content / End -->


</div>
</div>
<?php $this->load->view('includes/footer');?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery("#filter").jcOnPageFilter({animateHideNShow: true,
                focusOnLoad:true,
                highlightColor:'#169fe6',
                textColorForHighlights:'#FFFFFF',
                caseSensitive:false,
                hideNegatives:true,
                parentLookupClass:'jcorgFilterTextParent',
                childBlockClass:'jcorgFilterTextChild'});
    });          
</script>
</body>
</html>