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
			<h1><?php echo $singer['users_lastname']." ".$singer['users_firstname']; ?></h1>
			<span style="font-size:16px;"><a href="<?php echo $singer['songlink'];?>" title="Click to listen"  target="_blank" ><?php echo $singer["song"]; ?>[点击试听]</a></span><br/>
		    <p><?php echo $singer['des']; ?></p>
		    <?php
		    	if($this->session->userdata('users_id') != null)
		    	{
		    		if($IsVotedToday == false)
		    		{
			    		$attibutes = array('id'=>'voting', 'name'=>'voting');
						echo form_open('events/voting',$attibutes);
						echo form_hidden('singerID',  $singer['singerID']);
						echo form_submit('submit', "Vote : ".$count["count"], 'class="button medium color" style="margin-top: 20px;float: none;width: 200px;height: 50px;"');
						echo "</form>";
					}
					else
					{
						echo "<a href='javascript:void(0)' target='_blank' class='button medium light' style='text-align:center; line-height: 50px;float: none;width: 200px;height: 50px;'> Already Voted Today :  ".$count["count"] ."</a>";
					}
					echo $remain;
		    	}
		    	else
		    	{
					echo anchor('login/quickLogin?ref=events/singerInfo/'.$singer['singerID'], "Login to Vote :  ".$count["count"], 'class="button medium light" style="text-align:center; line-height: 50px;float: none;width: 200px;height: 50px;"');
		    	}

		    	
			?>
		</div>
	</div>
	<div style="clear:both; line-height: 0;"></div>
</div>