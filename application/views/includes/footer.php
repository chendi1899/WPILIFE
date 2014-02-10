<!-- Footer
================================================== -->
<div class="clearfix"></div>
<!-- Footer / Start -->
<footer id="footer">
	<!-- 960 Container -->
	<div class="container">

		<!-- About -->
		<div class="four columns">
			<img id="logo-footer" src="<?php echo base_url(); ?>images/logo-footer.png" alt="" />
			<p>If Internet Explorer can be brave enough to ask you to set him as default browser, please don't tell me you can't dare ask a girl out.</p>

		</div>

		<!-- Contact Details -->
		<div class="four columns">
			<h4>Contact Details</h4>
			<ul class="contact-details-alt">
				<li><i class="halflings white map-marker"></i> <p><strong>Address:</strong> 100 Institute Road, Worcester, MA</p></li>
				<li><i class="halflings white envelope"></i> <p><strong>Email:</strong> <a href="mailto:wpilife@gmail.com">wpilife@gmail.com</a></p></li>
			</ul>
		</div>

		<!-- Photo Stream -->
		<div class="four columns">
			<h4>Photo Stream</h4>
			<div class="flickr-widget">
				<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=6&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=99257653@N03"></script>
				<div class="clearfix"></div>
			</div>
		</div>

		<!-- Twitter -->
		<div class="four columns">
			<h4>Link</h4>
			<ul id="link" style="font-size:larger; padding-bottom: 5px;">
				<li><i class="halflings white link"></i> <a href="http://mitchief.org/">MIT-CHIEF</a></li>
				<li><i class="halflings white link"></i> <a href="http://sbzhouhao.net/">CrazyEgg</a></li>
			</ul>
				
			<div class="clearfix"></div>
		</div>

	</div>
	<!-- 960 Container / End -->

</footer>
<!-- Footer / End -->


<!-- Footer Bottom / Start  -->
<footer id="footer-bottom">

	<!-- 960 Container -->
	<div class="container">

		<!-- Copyrights -->
		<div class="eight columns">
			<div class="copyright">
				&copy; Copyright <?php echo date("Y"); ?> by <a href="<?php echo base_url();?>">WPILIFE</a>. All Rights Reserved.
			</div>
		</div>

		<!-- Menu -->
		<div class="eight columns">
			<nav id="sub-menu">
				<ul>
					<li><a href="<?php echo base_url();?>faq">FAQ's</a></li>
					<!--<li><a href="#">Sitemap</a></li>-->
					<li><a href="<?php echo base_url();?>contact">Contact</a></li>
				</ul>
			</nav>
		</div>

	</div>
	<!-- 960 Container / End -->

</footer>
<!-- Footer Bottom / End -->

<!-- jquery -->	
<!-- easing plugin ( optional ) -->
<script src="<?php echo base_url(); ?>scripts/jquery.flexslider.js"></script>
<script src="<?php echo base_url(); ?>scripts/jquery.selectnav.js"></script>
<script src="<?php echo base_url(); ?>scripts/jquery.twitter.js"></script>
<script src="<?php echo base_url(); ?>scripts/jquery.modernizr.js"></script>
<script src="<?php echo base_url(); ?>scripts/jquery.easing.1.3.js"></script>
<script src="<?php echo base_url(); ?>scripts/jquery.isotope.min.js"></script>
<script src="<?php echo base_url(); ?>scripts/jquery.jcarousel.js"></script>
<script src="<?php echo base_url(); ?>scripts/jquery.fancybox.min.js"></script>
<script src="<?php echo base_url(); ?>scripts/jquery.transit-modified.js"></script>
<script src="<?php echo base_url(); ?>scripts/jquery.layerslider-transitions.js"></script>
<script src="<?php echo base_url(); ?>scripts/jquery.layerslider.min.js"></script>
<script src="<?php echo base_url(); ?>scripts/custom.js"></script>
<script src="<?php echo base_url();?>scripts/easing.js" type="text/javascript"></script>
<!-- UItoTop plugin -->
<script src="<?php echo base_url();?>scripts/jquery.ui.totop.js" type="text/javascript"></script>
<!-- Starting the plugin -->
<script type="text/javascript">
	$(document).ready(function() {
		
		$().UItoTop({ easingType: 'easeOutQuart' });
	
	});
</script>