<div class="ajax-text-and-image white-popup-block">
	<style>
	a {
		color: #169fe6;
		text-decoration: none;
		outline: 0;
		-webkit-transition: color 0.1s ease-in-out;
		-moz-transition: color 0.1s ease-in-out;
	}
	.ajax-text-and-image {
		max-width:800px; margin: 20px auto; background: #FFF; padding: 0; line-height: 0;
	}
	.ajcol {
		font:15px/1.6 Lato, Helvetica, Arial, sans-serif;
		color:#525b66;
		width: 50%; float:left;
		display: block;
		-webkit-margin-before: 1em;
		-webkit-margin-after: 1em;
		-webkit-margin-start: 0px;
		-webkit-margin-end: 0px;
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
		</div>
	</div>
	<div style="clear:both; line-height: 0;"></div>
</div>