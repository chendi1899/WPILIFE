	<!-- Sidebar -->
	<div class="four floated sidebar left">
		<aside class="sidebar padding-reset">

			<div class="widget">
				<h4>Information</h4>
				<p>
					This is a website for WPI CSSA!<br/>
					Welcome the new students 
				</p>
			</div>

			<div class="widget">
				<h4>General Inquiries</h4>

				<ul class="contact-informations">
					<li><span class="address">100 Institute Road</span></li>
					<li><span class="address">Worcester, MA 01609, USA</span></li>
				</ul>

				<ul class="contact-informations second">
					<li><i class="halflings headphones"></i> <p>+1 508-335-9815</p></li>
					<li><i class="halflings envelope"></i> <p><a href="mailto:wpilife@gmail.com">wpilife@gmail.com</a></p></li>
					<li><i class="halflings globe"></i> <p><a href="http://sbzhouhao.net/">http://sbzhouhao.net/</a></p></li>
				</ul>

			</div>

			<div  class="widget">
				<h3 class="margin-reset">Our Location</h3>

			<br />

			<!-- Google Maps -->
			<section class="google-map-container">

				<div id="googlemaps" class="google-map google-map-full" style="padding-bottom:40%"></div>

				<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
				<script src="scripts/jquery.gmap.min.js"></script>

				<script type="text/javascript">
				jQuery('#googlemaps').gMap({
					maptype: 'ROADMAP',
					scrollwheel: false,
					zoom: 16,
					markers: [
						{
							address: 'Worcester Polytechnic Institute, 100 Institute Road, Worcester, MA', // Your Adress Here
							html: '',
							popup: false,
						}
					],
				});
				</script>
			</section>
			<!-- Google Maps / End -->
			</div>

		</aside>
	</div>
	<!-- Sidebar / End -->
