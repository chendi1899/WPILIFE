<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php $this->load->view('includes/import');?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/signup.css" type="text/css" />
</head>
<body>
<!-- Wrapper / Start -->
<div id="wrapper">
	<div id="content">
	<?php echo br(2);
		if($show_form == true)
		{
	?>
		<form action="" method="post">
            <table cellpadding="0" cellspacing="0" border="0" id="log_reg">
                <tr>
                    <td class="form-input-name">E-mail</td>
                    <td class="input"><input type="email" name="users_email_address" placeholder="Your E-mail @wpi.edu" autocomplete="off" required="required" /></td>
                </tr>
                <tr>
                    <td class="form-input-name">Password</td>
                    <td class="input"><input type="password" name="users_password" placeholder="Your password " autocomplete="off" required="required" /></td>
                </tr>

                <tr>
                    <td class="form-input-name"></td>
                    <td><input type="submit" value="Login" />
	                    <br/>
	                    Do not have an accout? -> <?php echo anchor('signup','Sign up', 'target="_blank"'); ?>
	                    <br/>
	                    <?php echo validation_errors();?></td>
                </tr>
            </table>
            
        </form>
        <?php 
        }
        else
        {
		?>
        <div style="width:800px; margin:30px auto; text-align: center;">
        	<h2><?php echo $info;?></h2>
        </div>
        <?php 
	    }
	    echo br(2);
	    ?>
	</div>
</div>
</body>
</html>