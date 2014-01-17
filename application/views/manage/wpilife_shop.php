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

		<h2>Shop List</h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li>Shop List</li>
			</ul>
		</nav>

	</div>

</div>
<!-- 960 Container / End -->

<!-- 960 Container -->
<div class="container floated">
	<?php $this->load->view('includes/account_left_menu');?>
	<!-- Page Content -->
	<div class="eleven floated right">
		<section class="page-content">
			<h3 class="margin">Sell List Manage</h3>

				<!-- Contact Form -->
				<section>
						<fieldset>
						<table width="100%" class="standard-table">
							<tr><th>ID</th><th>Title</th><th>&nbsp;</th><th>&nbsp;</th></tr>
						<?php
						if($list)
						{
							$count = 1;
							foreach ($list as $row)
							{
								
								echo "<tr>";
								echo "<td>".$count."</td>";
								echo "<td>".anchor('manage/shop/item_update/'.$row->shop_id,$row->shop_title)."</td>";
								echo "<td>".anchor('manage/shop/item_delete/'.$row->shop_id,'Delete','onclick="return confirm(\'sure to delete this?\')"')."</td>";
								if($row->shop_available == 1)
								{
									echo "<td><a href='".base_url()."manage/shop/item_close/".$row->shop_id."' >Close it</a></td>";
								}
								else
								{
									echo "<td><a href='".base_url()."manage/shop/item_open/".$row->shop_id."' >Re-Open it</a></td>";
								}
								echo "</tr>";
								$count = $count+1;
							}
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