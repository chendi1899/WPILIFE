	<aside class="sidebar">
		<!-- Search -->
		<nav class="widget-search">
			<form action="<?php echo base_url();?>cssa/blog_search" method="get">
				<button class="search-btn-widget"></button>
				<input class="search-field" name="keyword" id="keyword" type="text" onblur="if(this.value=='')this.value='Search';" onfocus="if(this.value=='Search')this.value='';" value="Search" />
			</form>
		</nav>
		<div class="clearfix"></div>

		<!-- Archives -->
		<nav class="widget">
			<h4>Archives</h4>
			<ul class="categories">
			<?php 
			$archive_list = $this->blogcssalib->get_archive_list();
			if($archive_list)
			{
				foreach($archive_list as $item)
				{
					echo '<li>'.anchor('cssa/blog_archives/'.$item->blogs_year.'/'.$item->blogs_month, $item->blogs_month.' '.$item->blogs_year).'</li>';
				}
			}
			
		?>
			</ul>
		</nav>
	</aside>