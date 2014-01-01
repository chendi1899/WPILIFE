<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>House | WPILIFE</title>
	<?php $this->load->view('includes/import');?>
	<?php $this->load->view('includes/kindeditor');?>
	<style>
	.label-success {
		padding: 2px 5px;
		color:#fff;
		background-color: #169fe6;
	}
	.label-important {
		padding: 2px 5px;
		color:#fff;
		background-color: #b94a48;
	}
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

		<h2>house Center</h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li>house Center</li>
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
			<h3 class="margin">Update house info</h3>

				<!-- Contact Form -->
				<section id="account">
				
					<!-- Form for Basic Information-->
					<?php 
						$attibutes = array('id'=>'kindeditor', 'name'=>'kindeditor');
						echo form_open_multipart('manage/house/item_updates',$attibutes);
						echo form_hidden('house_id', $house['house_id']);
					?>
						<fieldset>
						<table width="100%">
							<tr>
								<td>
									<input type="text" name="addr" id="addr" maxlength="128" value="<?php echo $house['addr']; ?>" placeholder="Item Name, such as bike, desk lamp..." style="width:632px;" />
								</td>
							</tr>
							<tr>
								<td>
									<input type="text" name="monthRent" id="monthRent" maxlength="20" value="<?php echo $house['month_rent']; ?>" placeholder="Give a month rent($), such as 800, 1200..." style="width:632px;" />
								</td>
							</tr>
							<tr>
								<td>
									<select name="bedroomCount" id="bedroomCount" style="display:inline;">
										<option <?php if($house['bedrooms_count'] == 1) echo "selected";?> value="1"> 1 bedroom</option>
										<option <?php if($house['bedrooms_count'] == 2) echo "selected";?> value="2"> 2 bedrooms</option>
										<option <?php if($house['bedrooms_count'] == 3) echo "selected";?> value="3"> 3 bedrooms</option>
										<option <?php if($house['bedrooms_count'] == 4) echo "selected";?> value="4"> 4 bedrooms</option>
										<option <?php if($house['bedrooms_count'] == 5) echo "selected";?> value="5"> 5 bedrooms</option>
									</select>
									&nbsp;&nbsp;&nbsp;&nbsp;
									<input type="checkbox" name="water" id="water" <?php if($house['water_included']) echo "checked";?> /> Hot Water
									<input type="checkbox" name="electricity" id="electricity" <?php if($house['electricity_included']) echo "checked";?> /> Electricity
									<input type="checkbox" name="heater" id="heater" <?php if($house['heat_included']) echo "checked";?> /> Heater
								</td>
							</tr>
							<tr>
								<td><textarea name="content" cols="40" rows="3" id="content"><?php echo $house['des']; ?></textarea></td>
							</tr>
							<tr>
								<td style="float: right;"><input type="submit" class="submit" id="submit" value=" Submit " /></td>
							</tr>
						</table>
						</fieldset>
						<div class="clearfix"></div>
					</form>
					
					<!-- End Form for Basic Information-->
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

	<script src="<?echo base_url();?>scripts/bootstrap.min.js"></script>
	<script src="<?echo base_url();?>scripts/bootstrap-maxlength.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('input#defaultconfig').maxlength()

		$('input#addr').maxlength({
					alwaysShow: true,
					warningClass: "label label-success",
					limitReachedClass: "label label-important",
					placement: 'left'
			});

	});

	// for google API : address auto complete
	function initialize() 
	{
		var mapOptions = {
			center: new google.maps.LatLng(-33.8688, 151.2195),
		};
		var input = document.getElementById('addr');
		var autocomplete = new google.maps.places.Autocomplete(input);
	  }
	  google.maps.event.addDomListener(window, 'load', initialize);
	</script>
</body>
</html>