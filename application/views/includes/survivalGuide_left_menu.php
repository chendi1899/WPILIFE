	<!-- Sidebar -->
	<div class="four floated sidebar left">
		<aside class="sidebar padding-reset">
			<div class="widget">
				<h4>Index:</h4>
				<ul class="list" style="font-family:Microsoft YaHei,Verdana,sans-serif;">
				<?php 
					foreach($index as $row)
					{
						echo "<li><i class='halflings plus' id='".$row->index."'></i><a href='".base_url()."survivalGuide/".$row->id."'>".$row->index."</a>";
						if(isset($row->sub_list))
						{
							echo "<section id='sub_".$row->index."' style='display:none;'>";
							echo "<ul style='font-size:0.9em;'>";
							foreach($row->sub_list as $sub_list)
							{
								echo "<li> - <a href='".base_url()."survivalGuide/".$row->id."#".$sub_list->index."'>".$sub_list->index."</a></li>";
							}
							echo "</ul>";
							echo "</section>";
						}
				?>
							<script>
							$("#<?php echo $row->index; ?>").click(function () {
							$("#sub_<?php echo $row->index; ?>").toggle("slow");
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
