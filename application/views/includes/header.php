<!-- Header
================================================== -->
<div id="top-line"></div>

<!-- 960 Container -->
<div class="container">

	<!-- Header -->
	<header id="header">

		<!-- Logo -->
		<div class="ten columns">
			<div id="logo">
				<h1><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>images/logo.png" alt="WPI CSSA" /></a></h1>
				<div id="tagline">EXTEND YOUR LIFE IN WPI</div>
				<div class="clearfix"></div>
			</div>
		</div>

		<!-- Social / Contact -->
		<div class="six columns">

			<!-- Social Icons -->
			<ul class="social-icons">
				<li class="weibo"><a href="http://www.weibo.com/u/2693929980">Weibo</a></li>
				<li class="renren"><a href="http://page.renren.com/601536817">Renren</a></li>		
			</ul>
			
			<div class="clearfix"></div>

			<!-- Contact Details -->
			<div class="contact-details">
			<?php
				if($this->session->userdata('users_id') == null)
				{
					echo "<a href='".base_url()."login?ref=".current_url()."'>Login</a> | "."
						  <a href='".base_url()."signup'>Register</a>";
				}
				else
				{
					echo "Hi ".$this->session->userdata('users_firstname')." | <a href='".base_url()."manage/user'>Account Center</a> | <a href='".base_url()."login/logout'>Logout</a>";
				}
			
			?>
			</div>
			<div class="clearfix"></div>

			<!-- Search -->
			<nav class="top-search">
				<form action="<?php echo base_url();?>search/cssa" method="get">
					<button class="search-btn"></button>
					<input name="keyword" id="keyword" class="search-field" type="text" placeholder="Search for CSSA Issues" />
				</form>
			</nav>

		</div>
	</header>
	<!-- Header / End -->

	<div class="clearfix"></div>

</div>
<!-- 960 Container / End -->


<!-- Navigation
================================================== -->
<nav id="navigation" class="style-1">

<div class="left-corner"></div>
<div class="right-corner"></div>

<ul class="menu" id="responsive">

	<li><a href="<?php echo base_url(); ?>" class="home_tab"><i class="halflings white th"></i>Home</a></li>
	<li><a href="<?php echo base_url(); ?>cssa" class="cssa_tab"><i class="halflings white file"></i> News&Events </a>
		<!-- Second Level / Start -->
		<ul>
			<!--<li><a href="<?php echo base_url(); ?>cssa/activity_list">Activity</a></li>-->
			<li><a href="<?php echo base_url(); ?>cssa/blog_list">Blog</a></li>
			<li><a href="<?php echo base_url(); ?>events">Event</a>
				<ul>
				<li><a href="<?php echo base_url(); ?>events">卡拉OK大赛</a></li>
				</ul>
			</li>
			<li><a href="<?php echo base_url(); ?>cssa/photograph">Photo</a></li>
			<!--<li><a href="<?php echo base_url(); ?>cssa/photograph">Photograph</a></li>-->
		</ul>
		<!-- Second Level / End -->
	</li>
	<li><a href="<?php echo base_url(); ?>wpilife/shop" class="shop_tab"><i class="halflings white shopping-cart"></i> Shop </a>
		<ul>
			<li><a href="<?php echo base_url(); ?>wpilife/shop">Sell List</a></li>
			<li><a href="<?php echo base_url(); ?>wpilife/pohs">Demand List</a></li>
		</ul>
	</li>
	<li><a href="<?php echo base_url(); ?>wpilife/house" class="house_tab"><i class="halflings white home"></i> House </a></li>
	<li><a href="<?php echo base_url(); ?>bbs" class="bbs_tab"><i class="halflings white user"></i> BBS </a></li>
	<!--
	<li><a href="<?php echo base_url(); ?>wpilife/shop" onclick="false" class="wpilife_tab" ><i class="halflings white map-marker"></i> Life@WPI</a>
		<ul class="cols3">
			<li class="col3">
				<h4>We will provide interesting features one by one</h4>
			</li>
			<li class="col1">
				<h5>Under Construction</h5>
				<ol>
					<li><a href="<?php echo base_url(); ?>wpilife/house">House</a></li>
					<li><a href="<?php echo base_url(); ?>wpilife/recs">Recommendation</a></li>
				</ol>
			</li>
			<li class="col1">
				<h5>Under Consideration</h5>
				<ol>
					<li><a href="#">Rider</a></li>
					<li><a href="#">Reminder</a></li>
					<li><a href="#">accounting</a></li>
					<li><a href="#">more...</a></li>
				</ol>
			</li>
			<li class="col1">
				<h5>Feel Interested</h5>
				<p>Do you want to make some contributions to this website? <br/>Please contact <a href="mailto:wpilife@gmail.com">wpilife@gmail.com</a></p>
			</li>
		</ul>
		 
	</li>
	-->
	<li><a href="<?php echo base_url(); ?>survivalGuide" class="new_students_tab"><i class="halflings white plane"></i>New Students</a>
		<!-- Second Level / Start -->
		<ul>
			<li><a href="<?php echo base_url(); ?>survivalGuide">Survival Guide</a>
				<!-- Second Level / Start -->
				<?php 
					$root_list = $this->sg->get_root_index();
					
					if($root_list)
					{
						echo "<ul>";
						foreach($root_list as $item)
						{
							echo "<li><a href='".base_url()."survivalGuide/".$item->id."'>".$item->index."</a></li>";
						}
						echo "</ul>";
					}
					
				?>
				<!-- Second Level / End -->
			</li>
			<li><a href="<?php echo base_url(); ?>faq">FAQ's</a>
				<!-- Second Level / Start -->
				<?php 
					$faq_list = $this->faqlib->get_faq_type();
					if($faq_list)
					{
						echo "<ul>";
						foreach($faq_list as $item)
						{
							echo "<li><a href='".base_url()."faq/filter/".$item->type."'>".$item->type."</a></li>";
						}
						echo "</ul>";
					}
					
				?>
				<!-- Second Level / End -->
			</li>
			<li><a href="<?php echo base_url(); ?>service/airportPicker">Airport Pickup</a></li>
			<li><a href="<?php echo base_url(); ?>service/tmpHouse">Temporary Residence</a></li>
		</ul>
		<!-- Second Level / End -->
	</li>
	<li><a href="<?php echo base_url(); ?>about/cssa" class="about_tab"><i class="halflings white star"></i>About</a>
		<ul>
			<li><a href="<?php echo base_url(); ?>about/cssa">About CSSA</a>
				<ul>
					<li><a href="<?php echo base_url(); ?>cssa/officers">Officers</a></li>
					<li><a href="<?php echo base_url(); ?>cssa/committee">Committee</a></li>
				</ul>
			</li>
			<li><a href="<?php echo base_url(); ?>about/website">About Website</a></li>
			<li><a href="<?php echo base_url(); ?>sponsor">Sponsors</a>
				<!-- Second Level / Start -->
				<?php 
					$sponsor_list = $this->sponsorlib->get_name();
					if($sponsor_list)
					{
						echo "<ul>";
						foreach($sponsor_list as $item)
						{
							echo "<li><a href='".base_url()."sponsor/".$item->id."'>".$item->name."</a></li>";
						}
						echo "</ul>";
					}
				
				?>
				<!-- Second Level / End -->
			</li>
			<li><a href="<?php echo base_url(); ?>contact">Contact</a></li>
		</ul>
	</li>

	<li><a href="<?php echo base_url(); ?>ext/job" class="job_tab"><i class="halflings white leaf"></i> Job Opp</a></li>
		
	<li><a href="<?php echo base_url(); ?>docs/api" class="docs_tab"><i class="halflings white list-alt"></i> Docs</a>
		<ul>
			<li><a href="<?php echo base_url(); ?>manual">Manual</a></li>
			<li><a href="<?php echo base_url(); ?>docs/api">API</a></li>
			<li><a href="<?php echo base_url(); ?>changelog">Change log</a></li>
		</ul>
	</li>
</ul>
</nav>
<div class="clearfix"></div>

