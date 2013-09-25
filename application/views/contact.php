<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title ?></title>
	<?php $this->load->view('includes/import');?>
	<script type="text/javascript">
		$(document).ready(function() 
		{
			$('.contact_tab').attr('id', 'current');
		});
		
	</script>
</head>
<body>
<!-- Wrapper / Start -->
<div id="wrapper">
<?php $this->load->view('includes/header');?>
<div id="content">


<!-- 960 Container -->
<div class="container floated">

	<div class="sixteen floated page-title">

		<h2>Contact</h2>

		<nav id="breadcrumbs">
			<ul>
				<li>You are here:</li>
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li>Contact</li>
			</ul>
		</nav>

	</div>

</div>
<!-- 960 Container / End -->


<!-- 960 Container -->
<div class="container floated">
	<?php $this->load->view('includes/user_left_menu');?>
	<!-- Page Content -->
	<div class="eleven floated right">
		<section class="page-content">
			<!-- Contact Form -->
			<section id="contact">

			<h3 class="margin">Contact Us</h3>
			<p class="margin">
				Just contact us, if you:
				<ol>
					<li>have a better a idea to make this website better;</li>
					<li>have a problem when browsering this website;</li>
					<li>want to do help for us;</li>
					<li>just want to make friends with us.</li>
				</ol>
				<br/>
				We will feel honored when getting your comments.
			</p>

				<!-- Contact Form -->
				<section id="contact">
					<!-- Success Message -->
					<mark id="message"></mark>

					<!-- Form -->
					<form method="post" action="contact" name="contactform" id="contactform">

						<fieldset>

							<div>
								<label for="name" accesskey="U">Name:</label>
								<input name="name" type="text" id="name" placeholder="Your Name" required="required" autocomplete="off" />
							</div>

							<div>
								<label for="email" accesskey="E">Email: <span>*</span></label>
								<input name="email" type="email" placeholder="Your E-mail" id="email" autocomplete="off" required="required" />
							</div>

							<div>
								<label for="comments" accesskey="C">Message: <span>*</span></label>
								<textarea name="comments" cols="40" placeholder="Your Comment" rows="3" autocomplete="off" required="required" id="comments" spellcheck="true"></textarea>
							</div>

						</fieldset>

						<input type="submit" class="submit" id="submit" value="Send Message" />
						<div class="clearfix"></div>
						<?php echo validation_errors();?>
						<div class="wpcf7-mail-sent-ok" style="display: <?php echo $display; ?>;">
							Your message was sent successfully. Thanks.
						</div>
					</form>

				</section>
				<!-- Contact Form / End -->
			

		</section>
	</div>
	<!-- Page Content / End -->


</div>
<!-- 960 Container / End -->


</div>
</div>
<?php $this->load->view('includes/footer');?>
</body>
</html>