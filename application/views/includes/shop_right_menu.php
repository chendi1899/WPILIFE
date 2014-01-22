	<aside class="sidebar">
		<!-- Search -->
		<nav class="widget-search">
			<form action="<?php echo base_url();?>wpilife/shop/search" method="get">
				<button class="search-btn-widget"></button>
				<input class="search-field" name="keyword" id="keyword" type="text" onblur="if(this.value=='')this.value='Search';" onfocus="if(this.value=='Search')this.value='';" value="Search" />
			</form>
		</nav>
		<div class="clearfix"></div>
		<div class="widget">
			<?php 
				if($this->session->userdata('users_id') == null)
		 		{
		 			$link = "href='javascript:void(0)' onclick='javascript:alert(\"Please Login first!\");'";
		 		}
		 		else
		 		{
		 			$link = "href='".base_url()."manage/shop'";
		 		}
			?>
			<a class="button medium color" <?php echo $link;?> style="width:185px;">
				<i class="plus halflings white"></i>Post Your Item to Sell
			</a>
		</div>
		<div class="clearfix"></div>
		<!-- Popular -->
		<div class="widget">
			<h4>Recent Products</h4>
			<?php 
			
				$list = $this->shoplib->get_products_list_by_count(3);
			
				if($list)
				{
					foreach($list as $item)
					{
			?>
			<div class="latest-shop-items">
				<a href="<?php echo base_url();?>wpilife/shop/product/<?php echo $item->shop_id;?>"><img src="<?php echo base_url().'images/shop/'.substr_replace($item->shop_image_cover, '_small', -4, 0);?>" alt="" /></a>
				<p><a href="<?php echo base_url();?>wpilife/shop/product/<?php echo $item->shop_id;?>"><?php echo $item->shop_title;?></a> <span><?php echo $item->shop_price;?></span></p>
			</div>
					
			<?php 
					}
				}

			?>
			

		</div>
			
	</aside>
