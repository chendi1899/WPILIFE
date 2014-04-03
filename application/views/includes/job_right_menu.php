	<aside class="sidebar">
		<nav class="widget">
			<h4>Categories</h4>
			<ul class="categories">
		<?php 
			$type_list = $this->joboppolib->get_type_list();
			if($type_list) {
				foreach($type_list as $item) {
					echo '<li>'.anchor('ext/jobType/'.$item->id, $item->name).'</li>';
				}
			}
			
		?>
			</ul>
		</nav>
			
	</aside>
