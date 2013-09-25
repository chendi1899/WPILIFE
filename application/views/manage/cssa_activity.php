<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>WPILIFE</title>
	<?php $this->load->view('includes/import');?>
	<?php $this->load->view('includes/kindeditor');?>
</head>
<body>
<!-- Wrapper / Start -->
<div id="wrapper">
<?php $this->load->view('includes/header');?>
<div id="content">


<!-- 960 Container -->
<div class="container floated">

	<div class="sixteen floated page-title">

		<h2>Activity Center</h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li>Activity Center</li>
			</ul>
		</nav>

	</div>

</div>
<!-- 960 Container / End -->

<!-- 960 Container -->
<div class="container floated">
	<?php $this->load->view('includes/cssa_left_menu');?>
	<!-- Page Content -->
	<div class="eleven floated right">
		<section class="page-content">
			<h3 class="margin">Activity Manage</h3>

				<!-- Contact Form -->
				<section>
						<fieldset>
						<table width="100%" class="standard-table">
							<tr><th>ID</th><th>Title</th><th>&nbsp;</th></tr>
						<?php
						if($activity_list)
						{
							$count = 1;
							foreach ($activity_list as $row)
							{
								
								echo "<tr>";
								echo "<td>".$count."</td>";
								echo "<td><a href='".base_url()."manage/cssa/activity_update/".$row->activities_id."' >".$row->activities_title."</a></td>";
								echo "<td>".anchor('manage/cssa/activity_delete/'.$row->activities_id,'Delete','onclick="return confirm(\'sure to delete this?\')"')."</td>";
								echo "</tr>";
								$count = $count+1;
							}
						}
						else
						{
							echo "<tr><td colspan='3'>No activity now!</td></tr>";
						}
						?>
						</table>
						</fieldset>
						<div class="clearfix"></div>
				</section>
				<!-- Contact Form / End -->
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