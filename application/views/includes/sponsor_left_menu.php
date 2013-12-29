	<!-- Sidebar -->
	<div class="four floated sidebar left">
		<aside class="sidebar padding-reset">
			<div class="widget">
				<ul class="list" style="font-family:Microsoft YaHei,Verdana,sans-serif;">
				<?php 
					foreach($index as $row)
					{
						echo "<li><i class='halflings plus' id='".$row->type."'></i><a href='javascript:void(0)'>".$row->type."</a>";
						if(isset($row->sub_list))
						{
							echo "<section id='sub_".$row->type."' style='display:block;'>";
							echo "<ul style='font-size:0.9em;'>";
							foreach($row->sub_list as $sub_list)
							{
								echo "<li> - <a href='".base_url()."sponsor/".$sub_list->id."'>".$sub_list->name."</a></li>";
							}
							echo "</ul>";
							echo "</section>";
						}
				?>
							<script>
							$("#<?php echo $row->type; ?>").click(function () {
							$("#sub_<?php echo $row->type; ?>").toggle("slow");
							});
							</script>
				<?php
						
						echo "</li>";
					}
				?>
				</ul>
				<?php echo br(2);?>
			</div>
		</aside>
		
	</div>
	<!-- Sidebar / End -->
