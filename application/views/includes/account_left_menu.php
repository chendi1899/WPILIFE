	<!-- Sidebar -->
	<div class="four floated sidebar left">
		<aside class="sidebar padding-reset">
			<?php
			if($this->session->userdata('users_id')==1)
			{
			?>
			<div class="widget">
				<h4>CSSA Officers Manage:</h4>
				<ul class="plus-list">
					<li><?php echo anchor('manage/cssa/officerList','Manage Officers'); ?></li>
					<!--<li><?php echo anchor('manage/cssa/addOfficer','Add officer'); ?></li>-->
				</ul>
			</div>
			<?php
			}
			?>
			
			<div class="widget">
				<h4>Menu for Blogs:</h4>
				<ul class="sign-list">
					<li>Publish New Article
						<ul class="sign-list">
							<li><?php echo anchor('manage/shop','Post Items you want to sell'); ?></li>
							<li><?php echo anchor('manage/pohs','Post Items you want to buy'); ?></li>
						</ul>
					</li>
					<li>Manage your Articles
						<ul class="sign-list">
							<li><?php echo anchor('manage/shop/myList','Your Sell List'); ?></li>
							<li><?php echo anchor('manage/pohs/myList','Your Buy List'); ?></li>
						</ul>
					</li>
				</ul>
			</div>
			
			<?php
			if($this->session->userdata('cssa_id')!=null)
			{
			?>
			<div class="widget">
				<h4>CSSA Content Manage:</h4>
				<ul class="plus-list">
					<li><?php echo anchor('manage/cssa','CSSA content Manage'); ?></li>
				</ul>
			</div>
			<?php
			}
			?>
			

			<div class="widget">
				<h4>Menu for Account:</h4>
				<ul class="plus-list">
					<li><?php echo anchor('manage/user','Change your personal info'); ?></li>
					<li><?php echo anchor('manage/user/avatarModify','Change your avatar'); ?></li>
					<li><?php echo anchor('manage/user/passwordModify','Change your password'); ?></li>
				</ul>
			</div>
			
			<div class="widget">
				<h4>Logout:</h4>
				<ul class="check-list">
					<li><?php echo anchor('login/logout','Logout'); ?></li>
				</ul>
			</div>
			<?php echo br(2);?>
		</aside>
		
	</div>
	
	<!-- Sidebar / End -->
