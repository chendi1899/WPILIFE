	<aside class="sidebar">
		<!-- Search -->
		<nav class="widget-search">
			<form action="<?php echo base_url();?>bbs/search" method="get">
				<button class="search-btn-widget"></button>
				<input class="search-field" name="keyword" id="keyword" type="text" onblur="if(this.value=='')this.value='Search';" onfocus="if(this.value=='Search')this.value='';" value="Search" />
			</form>
		</nav>
		<div class="clearfix"></div>
		<div class="widget">
			<?php 
				if($this->session->userdata('users_id') == null)
		 		{
		 			$link = "href='javascript:void(0)' onclick='javascript:alert(\"Please Login fisrt!\");'";
		 		}
		 		else
		 		{
		 			$link = "href='".base_url()."manage/bbs'";
		 		}
			?>
			<a class="button medium color" <?php echo $link;?> style="width:185px;">
				<i class="plus halflings white"></i>Post A New Topic
			</a>
		</div>
		<div class="clearfix"></div>
		<!-- Popular -->
		<div class="widget">
			<h4 style="color:red;">Attention:</h4>
			<p>
				As WPILIFE website is open to the public, and most of the contend is provided by public, we cannot guarantee everything information is valid. 
			</p>

			

		</div>
			
	</aside>
