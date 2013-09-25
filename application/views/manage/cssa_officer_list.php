<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>WPILIFE</title>
	<?php $this->load->view('includes/import');?>
	<script type="text/javascript" src="<?php echo base_url();?>scripts/jcfilter.min.js"></script>
</head>
<body>
<!-- Wrapper / Start -->
<div id="wrapper">
<?php $this->load->view('includes/header');?>
<div id="content">


<!-- 960 Container -->
<div class="container floated">

	<div class="sixteen floated page-title">

		<h2>CSSA Officers Manage</h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li>CSSA Officers Manage</li>
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
			<h3 class="margin">CSSA Officers List</h3>

				<!-- Contact Form -->
				<section>
						<fieldset>
						<table width="100%" class="standard-table">
							<tr><th>ID</th><th>Name</th><th>Title</th><th>&nbsp;</th><th>&nbsp;</th></tr>
						<?php
						if($officer_list)
						{
							$count = 1;
							foreach ($officer_list as $row)
							{
								if($row->user_id == 1)
								{
									continue;
								}
								echo "<tr>";
								echo "<td>".$count."</td>";
								echo "<td>".$row->users_firstname." ".$row->users_lastname."</td>";
								$attibutes = array('id'=>'officer_title_update', 'name'=>'officer_title_update');
								echo form_open('manage/cssa/officer_title_update',$attibutes);
								echo form_hidden('id', $row->id);
								echo "<td>".form_input('user_title', $row->user_title, 'style="width:250px;"')."</td>";
								echo "<td>".form_submit('submit', 'Update', 'style="float:none;"')."</td>";
								echo "</form>";
								echo "<td>".anchor('manage/cssa/officerDelete/'.$row->id,'Delete','class="button small color" onclick="return confirm(\'sure to delete this?\')"')."</td>";
								echo "</tr>";
								$count = $count+1;
							}
						}
						else
						{
							echo "<tr><td colspan='5'>No Officers now!</td></tr>";
						}
						?>
						</table>
						</fieldset>
						<div class="clearfix line"></div>
				</section>
				<!-- Contact Form / End -->
		</section>
		<section class="page-content">
		Filter by keyword : <input type="text" id="filter" style="background:url(<?php echo base_url();?>images/filter.png) 95% 60% no-repeat;display:inline; background-size:16px; width:250px"> 
		<br/><br/>
		<div class="clearfix"></div>
		<?php	
			if($user_list)
			{
				echo "<table width='100%' class='standard-table'>";
				echo "<tr><th>Name</th><th>&nbsp;</th></tr>";
				foreach($user_list as $row)
				{
			
		?>
			<tr class="jcorgFilterTextParent">
				<td class="jcorgFilterTextChild"><?php echo $row->users_firstname." ".$row->users_lastname; ?></td>
				<td><a class="button small color" href="<?php echo base_url().'manage/cssa/officerAdd/'.$row->users_id; ?>">Add To Officer List</a></td>
			</tr>
		<?php
				}
				echo "</table>";
			}
		?>
		</section>
	</div>
	<!-- Page Content / End -->
</div>
<!-- 960 Container / End -->
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