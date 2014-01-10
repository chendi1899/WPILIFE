<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php $this->load->view('includes/import');?>
</head>
<body>
<!-- Wrapper / Start -->
<div id="wrapper">
	<?php $this->load->view('includes/header');?>
	<div id="content">
		<?php echo br(2); ?>
		<div style="width:800px; margin:30px auto; text-align: center;">
			<h2><?php echo $info;?></h2>
		</div>
		<?php echo br(2); ?>
	</div>
</div>
<?php $this->load->view('includes/footer');?>
</body>
</html>