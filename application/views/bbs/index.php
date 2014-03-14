<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title;?></title>
	<?php $this->load->view('includes/import');?>
	<script type="text/javascript">
		$(document).ready(function() 
		{
			$('.bbs_tab').attr('id', 'current');
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

		<h2>Discussion Board</h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo base_url();?>">Home</a></li>
				<li>BBS</li>
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
		if($list) {
	?>
	<table class="standard-table" style="margin-top:20px;">
		<tr>
			<th>No.</th>
			<th>Title</th>
			<th>Author</th>
			<th>Date</th>
		</tr>

	<?php
			$index = 1*$page;
			foreach($list as $row) {
	?>
		<tr>
			<td><?php echo $index;?></td>
			<td><?php echo anchor('bbs/show/'.$row['bbs_id'], mb_substr(strip_tags($row['bbs_title']), 0, 32)."...", array('title' => $row['bbs_title']));?></td>
			<td><?php echo $row['users_firstname']." ". $row['users_lastname'];?></td>
			<td><?php echo $row['bbs_time'];?></td>
		</tr>
	<?php
				$index++;
			}
			echo "</table>";
		} else {
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
	<?php $this->load->view('includes/bbs_right_menu');?>
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