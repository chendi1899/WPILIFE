<div class="ajax-text-and-image white-popup-block">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/colors/blue.css" id="colors">
	<style>
	.ajax-text-and-image {
		max-width:800px; margin: 20px auto; background: #FFF; padding: 0; line-height: 0;
	}
	.ajcol {
		width: 50%; float:left;
	}
	.ajcol img {
		width: 100%; height: auto;
	}
	@media all and (max-width:30em) {
		.ajcol { 
			width: 100%;
			float:none;
		}
	}
	</style>
	<div class="ajcol">
		<img src="<?php echo base_url();?>images/events/karaoke2013/<?php echo $singer['singerID']; ?>.png"/>
	</div>
	<div class="ajcol" style="line-height: 1.231;">
		<div style="padding: 1em">
			<h1><?php echo $singer['users_firstname']." ".$singer['users_lastname']; ?></h1>
			<span><a href="<?php echo $singer['songlink'];?>" title="Click to listen"  target="_blank" ><?php echo $singer["song"]; ?></a></span><br/>
		    <p><?php echo $singer['des']; ?></p>
		    <?php
		    	$attibutes = array('id'=>'voting', 'name'=>'voting');
				echo form_open('manage/cssa/officer_title_update',$attibutes);
				echo form_hidden('singerID',  $singer['singerID']);
				echo form_submit('submit', $count["count"], 'class="button medium color" style="margin-top: 20px;float: none;width: 200px;height: 50px;"');
				echo "</form>";
			?>
		</div>
	</div>
	<div style="clear:both; line-height: 0;"></div>
</div>