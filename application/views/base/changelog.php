<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Change Log | WPILIFE</title>
	<?php $this->load->view('includes/import');?>
	<script type="text/javascript">
		$(document).ready(function() 
		{
			$('.contact_tab').attr('id', 'current');
		});
		
	</script>
	<style type="text/css">
	ol{margin-left:18px;}
	</style>
</head>
<body>
<!-- Wrapper / Start -->
<div id="wrapper">
<?php $this->load->view('includes/header');?>
<div id="content">


<!-- 960 Container -->
<div class="container floated">

	<div class="sixteen floated page-title">

		<h2>Change Log</h2>

	</div>

</div>
<!-- 960 Container / End -->

<!-- Page Content -->
<div class="page-content">
	<!-- 960 Container -->
	<div class="container">
		<!-- Sixteen Columns -->
		<div class="sixteen columns">
		<table class="standard-table">
			<tr>
				<th>Date</th>
				<th>Description</th>
				<th>Reporter</th>
			</tr>
			<?php
			if($changelog){
				foreach($changelog as $row){
					echo '<tr>';
					echo '<td>'.$row->date.'</td>';
					echo '<td>'.$row->text.'</td>';
					echo '<td>';
					if($row->reporter != "") echo anchor($row->reporter_url, $row->reporter, 'target="_blank"');
					echo '</td>';
					echo '</tr>';
				}
			}
			?>

		</table>


		</div>
	</div>
	<!-- 960 Container / End -->
	<br/>
</div>
<!-- Page Content / End -->


</div>
</div>
<?php $this->load->view('includes/footer');?>
</body>
</html>