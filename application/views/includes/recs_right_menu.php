	<aside class="sidebar">
		<!-- Search -->
		<nav class="widget-search">
			<form action="<?php echo base_url();?>wpilife/shop/search" method="get">
				<button class="search-btn-widget"></button>
				<input class="search-field" name="keyword" id="keyword" type="text" onblur="if(this.value=='')this.value='Search';" onfocus="if(this.value=='Search')this.value='';" value="Search" />
			</form>
		</nav>
		<div class="clearfix"></div>

		<nav class="widget">
			<h4>Categories</h4>
			<ul class="categories">
		<?php 
			$type_list = $this->recslib->get_type_list();
			if($type_list)
			{
				foreach($type_list as $item)
				{
					echo '<li>'.anchor('wpilife/recs/type/'.$item->id, $item->name).'</li>';
				}
			}
			
		?>
			</ul>
		</nav>
			
	</aside>
