<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>WPILIFE</title>
	<?php $this->load->view('includes/import');?>
</head>
<body>
<!-- Wrapper / Start -->
<div id="wrapper">
<?php $this->load->view('includes/header');?>
<div id="content">


<!-- 960 Container -->
<div class="container floated">

	<div class="sixteen floated page-title">

		<h2>FAQ Type Center</h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li>FAQ Type Center</li>
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
			<h3 class="margin">FAQ Type Manage</h3>

				<!-- Contact Form -->
				<section id="account">
			
						<fieldset id="portfolio_image_manage">
						<table width="100%" class="standard-table" id="faq_type_list" >
							<tr><th>ID</th><th>Name</th><th>&nbsp;</th></tr>
						<?php
							$count = 1;
							foreach ($faq_type as $row)
							{
								
								echo "<tr>";
								echo "<td>".$count."</td>";
								$attibutes = array('id'=>'faq_type_update', 'name'=>'faq_type_update');
								echo form_open('manage/cssa/faq_type_update',$attibutes);
								echo "<td>". form_input('faq_type', $row->type)."</td>";
								echo form_hidden('id', $row->id);
								echo "<td>".form_submit('submit', 'Update', 'style="float:none;"')."</td>";
								echo "</form>";
								echo "</tr>";
								$count = $count+1;
							}
						
						?>
						</table>

						<?php 
							$attibutes = array('id'=>'faq_type_add', 'name'=>'faq_type_add');
							echo form_open('manage/cssa/faq_type_add',$attibutes);
							$data = array(
							              'name'        => 'faq_type',
							              'id'          => 'faq_type',
							              'value'       => '',
							              'maxlength'   => '100',
							              'autocomplete'=> 'off',
							              'style'       => 'display:inline;'
							            );

							echo form_input($data);
							echo form_submit('submit', 'Add New Type',  'style="float:none;"');
							echo "</form>";
						?>
						</fieldset>
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