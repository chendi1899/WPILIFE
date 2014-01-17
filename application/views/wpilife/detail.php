<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title;?></title>
	<?php $this->load->view('includes/import');?>
	<script type="text/javascript">
		$(document).ready(function() 
		{
			$('.wpilife_tab').attr('id', 'current');
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

		<h2>Item in Demand</h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li>shop</li>
			</ul>
		</nav>

	</div>

</div>
<!-- 960 Container / End -->


<div class="container floated">
	<?php //print_r($item);?>
	<!-- Page Content -->
	<div class="eleven floated">
		<!-- Post -->
		<article class="post">
			<section class="date">
				<span class="day"><?php echo  date("d", strtotime($item['shop_date'])); ?></span>
			<span class="month"><?php echo date("M", strtotime($item['shop_date'])); ?></span>
			</section>

			<section class="post-content">

				<header class="meta">
					<h2><?php echo $item['shop_title'];?></h2>
					<span><i class="halflings user"></i>By <?php echo anchor('wpilife/pohs/detail/'.$item['user_id'],$item['users_firstname']." ".$item['users_lastname']); ?></span>
				</header>

				<?php echo $item['shop_content']; ?>

			
				<!-- Baidu Button BEGIN -->
				<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
				<a class="bds_tsina"></a>
				<a class="bds_renren"></a>
				<a class="bds_fbook"></a>
				<a class="bds_linkedin"></a>
				<a class="bds_twi"></a>
				<a class="bds_tqq"></a>
				<a class="bds_qzone"></a>
				<a class="bds_t163"></a>
				<span class="bds_more"></span>
				<a class="shareCount"></a>
				</div>
				<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=3683657" ></script>
				<script type="text/javascript" id="bdshell_js"></script>
				<script type="text/javascript">
				document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
				</script>
				<!-- Baidu Button END -->
				<br class="clearfix"/>
			</section>
		</article>

		<!-- Divider -->
		<div class="line"></div>


		<!-- Comments -->
		<section class="comments-sec">
		
			<!-- UY BEGIN -->
			<div id="uyan_frame"></div>
			<script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js?uid=1770934"></script>
			<!-- UY END -->
		
		</section>
		<div class="clearfix"></div>

		


	</div>
	<!-- Content / End -->


	<!-- Sidebar -->
	<div class="four floated sidebar right">
	<?php $this->load->view('includes/pohs_right_menu');?>
	</div>
	<!-- Page Content / End -->

</div>
</div>
<!-- Content / End -->

</div>
<?php $this->load->view('includes/footer');?>
</body>
</html>