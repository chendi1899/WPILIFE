<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width"/>
	<style>
/**********************************************
* Ink v1.0.4 - Copyright 2013 ZURB Inc		*
**********************************************/

/* Client-specific Styles & Reset */

body{ 
  width:100% !important; 
  -webkit-text-size-adjust:100%; 
  -ms-text-size-adjust:100%; 
  margin:0; 
  padding:0;
}

img { 
  outline:none; 
  text-decoration:none; 
  -ms-interpolation-mode: bicubic;
  width: auto;
  max-width: 100%; 
  float: left; 
  clear: both; 
  display: block;
}

center {
  width: 100%;
  min-width: 580px;
}

p {
  margin: 0 0 0 10px;
}

table {
  border-spacing: 0;
  border-collapse: collapse;
}

td { 
  word-break: break-word;
  -webkit-hyphens: auto;
  -moz-hyphens: auto;
  hyphens: auto;
  border-collapse: collapse !important; 
}

table, tr, td {
  padding: 0;
  vertical-align: top;
  text-align: left;
}

/* Responsive Grid */

table.body {
  height: 100%;
  width: 100%;
}

table.container {
  width: 580px;
  margin: 0 auto;
  text-align: inherit;
}

table.row { 
  padding: 0px; 
  width: 100%;
  position: relative;
}

table.container table.row {
  display: block;
}

td.wrapper {
  padding: 10px 20px 0px 0px;
  position: relative;
}

table.columns,
table.column {
  margin: 0 auto;
}

table.columns td,
table.column td {
  padding: 0px 0px 10px; 
}

table.columns td.sub-columns,
table.column td.sub-columns,
table.columns td.sub-column,
table.column td.sub-column {
  padding-right: 10px;
}

td.sub-column, td.sub-columns {
  min-width: 0px;
}

table.row td.last,
table.container td.last {
  padding-right: 0px;
}

table.six { width: 280px; }
table.twelve { width: 580px; }
table.twelve center { min-width: 580px; }

.body .columns td.one,
.body .column td.one, { width: 8.333333% !important; }
.body .columns td.six,
.body .column td.six { width: 50% !important; }

td.expander {
  visibility: hidden;
  width: 0px;
  padding: 0 !important;
}


table.columns .left-text-pad,
table.columns .text-pad-left,
table.column .left-text-pad,
table.column .text-pad-left {
  padding-left: 10px;
}

table.columns .right-text-pad,
table.columns .text-pad-right,
table.column .right-text-pad,
table.column .text-pad-right {
  padding-right: 10px;
}

/* Alignment & Visibility Classes */

table.center, td.center {
  text-align: center;
}


/* Typography */

body, table.body, h1, h2, h3, h4, h5, h6, p { 
  color: #222222;
  font-family: "Helvetica", "Arial", sans-serif; 
  font-weight: normal; 
  padding:0; 
  margin: 0;
  text-align: left; 
  line-height: 1.3;
}

h1, h2, h3, h4, h5, h6 {
  word-break: normal;
}

h3 {font-size: 32px;}
h5 {font-size: 24px;}

body, table.body, p {font-size: 14px;line-height:19px;}

p { 
  padding-bottom: 10px;
}

a {
  color: #2ba6cb; 
  text-decoration: none;
}

a:hover { 
  color: #2795b6 !important;
}

a:active { 
  color: #2795b6 !important;
}

a:visited { 
  color: #2ba6cb !important;
}

/* Panels */

td.panel {
  background: #f2f2f2;
  border: 1px solid #d9d9d9;
  padding: 10px !important;
}

/* Buttons */

table.button,
table.tiny-button,
table.small-button,
table.medium-button,
table.large-button {
  width: 100%;
  overflow: hidden;
}

table.button td,
table.tiny-button td,
table.small-button td,
table.medium-button td,
table.large-button td {
  display: block;
  width: auto !important;
  text-align: center;
  background: #2ba6cb;
  border: 1px solid #2284a1;
  color: #ffffff;
  padding: 8px 0;
}

table.tiny-button td {
  padding: 5px 0 4px;
}


table.button td a,
table.tiny-button td a,
table.small-button td a,
table.medium-button td a,
table.large-button td a {
  font-weight: bold;
  text-decoration: none;
  font-family: Helvetica, Arial, sans-serif;
  color: #ffffff;
  font-size: 16px;
}

table.tiny-button td a {
  font-size: 12px;
  font-weight: normal;
}

table.button:hover td,
table.button:visited td,
table.button:active td {
  background: #2795b6 !important;
}

table.button:hover td a,
table.button:visited td a,
table.button:active td a {
  color: #fff !important;
}

table.button:hover td,
table.tiny-button:hover td,
table.small-button:hover td,
table.medium-button:hover td,
table.large-button:hover td {
  background: #2795b6 !important;
}

table.button:hover td a,
table.button:active td a,
table.button td a:visited,
table.tiny-button:hover td a,
table.tiny-button:active td a,
table.tiny-button td a:visited,
table.small-button:hover td a,
table.small-button:active td a,
table.small-button td a:visited,
table.medium-button:hover td a,
table.medium-button:active td a,
table.medium-button td a:visited,
table.large-button:hover td a,
table.large-button:active td a,
table.large-button td a:visited {
  color: #ffffff !important; 
}

/*  Media Queries */

@media only screen and (max-width: 600px) {

  table[class="body"] img {
	width: auto !important;
	height: auto !important;
  }

  table[class="body"] center {
	min-width: 0 !important;
  }

  table[class="body"] .container {
	width: 95% !important;
  }

  table[class="body"] .row {
	width: 100% !important;
	display: block !important;
  }

  table[class="body"] .wrapper {
	display: block !important;
	padding-right: 0 !important;
  }

  table[class="body"] .columns,
  table[class="body"] .column {
	table-layout: fixed !important;
	float: none !important;
	width: 100% !important;
	padding-right: 0px !important;
	padding-left: 0px !important;
	display: block !important;
  }


  table[class="body"] table.columns td,
  table[class="body"] table.column td {
	width: 100% !important;
  }


  table[class="body"] .expander {
	width: 9999px !important;
  }

  table[class="body"] .right-text-pad,
  table[class="body"] .text-pad-right {
	padding-left: 10px !important;
  }

  table[class="body"] .left-text-pad,
  table[class="body"] .text-pad-left {
	padding-right: 10px !important;
  }
}
  </style>
  <style>
	
	table.facebook td {
	  background: #3b5998;
	  border-color: #2d4473;
	}

	table.facebook:hover td {
	  background: #2d4473 !important;
	}

	table.twitter td {
	  background: #00acee;
	  border-color: #0087bb;
	}

	table.twitter:hover td {
	  background: #0087bb !important;
	}

	table.google-plus td {
	  background-color: #DB4A39;
	  border-color: #CC0000;
	}

	table.google-plus:hover td {
	  background: #CC0000 !important;
	}

	.template-label {
	  color: #ffffff;
	  font-weight: bold;
	  font-size: 11px;
	}

	.callout .panel {
	  background: #ECF8FF;
	  border-color: #b9e5ff;
	}

	.header {
	  background: #999999;
	}

	.footer .wrapper {
	  background: #ebebeb;
	}

	.footer h5 {
	  padding-bottom: 10px;
	}

	table.columns .text-pad {
	  padding-left: 10px;
	  padding-right: 10px;
	}

	table.columns .left-text-pad {
	  padding-left: 10px;
	}

	table.columns .right-text-pad {
	  padding-right: 10px;
	}

	@media only screen and (max-width: 600px) {

	  table[class="body"] .right-text-pad {
		padding-left: 10px !important;
	  }

	  table[class="body"] .left-text-pad {
		padding-right: 10px !important;
	  }
	}

  </style>
</head>
<body>
	<table class="body">
		<tr>
			<td class="center" align="center" valign="top">
		<center>
		 
		 
		  <table class="row header">
			<tr>
			  <td class="center" align="center">
				<center>
		  
				  <table class="container">
					<tr>
					  <td class="wrapper last">
			
						<table class="twelve columns">
						  <tr>
						  
							<td class="six sub-columns">
							  <img src="<?php echo base_url();?>images/logo200.png">
							</td>
							<td class="six sub-columns last" align="right" style="text-align:right; vertical-align:middle;">
							  <span class="template-label">Auto-Send Email</span>
							</td>
							<td class="expander"></td>
							
						  </tr>
						</table>
			
					  </td>
					</tr>
				  </table>

				</center>
			  </td>
			</tr>
		  </table> 
		  <br>
		  
		  <table class="container">
			<tr>
			  <td>
				
				<!-- content start -->			
				<table class="row">
				  <tr>
					<td class="wrapper last">

					  <table class="twelve columns">
						<tr>
						  <td>

							<h3>Hi, </h3>
							<p>Welcome, and we are ready to help, click the button to reset your password!</p>
							<p>The reset link will expire the <b>next day</b>, please reset your password ASAP!</p>
						  </td>
						  <td class="expander"></td>
						</tr>
					  </table>

					</td>
				  </tr>
				</table>
				
				
				<table class="row">
				  <tr>
					<td class="wrapper last">

					  <table class="six columns">
						<tr>
						  <td>

							<table class="button">
							  <tr>
								<td>
								  <a href="{resetLink}">Click to Reset Your Password</a>
								</td>
							  </tr>
							</table>
							<br/>
						  </td>
						  <td class="expander"></td>
						</tr>
					  </table>

					</td>
				  </tr>
				</table>
				
				<table class="row callout">
				  <tr>
					<td class="wrapper last">

					  <table class="twelve columns">
						<tr>
						  <td class="panel">

							<p>
							If the link above is not clickable, please copy the link into your bowser to log in! Thanks! Have fun :-)<br/>
							{resetLink}
							</p>

						  </td>
						  <td class="expander"></td>
						</tr>
					  </table>
					  <br/>

					</td>
				  </tr>
				</table>

				<table class="row footer">
				  <tr>
					<td class="wrapper">
							
					  <table class="six columns">
						<tr>
						  <td class="left-text-pad">

							<h5>Connect With Us:</h5>

							<table class="tiny-button facebook">
							  <tr>
								<td>
								  <a href="http://page.renren.com/601536817">RenRen</a>
								</td>
							  </tr>
							</table>

							<br>

							<table class="tiny-button google-plus">
							  <tr>
								<td>
								  <a href="http://weibo.com/u/2693929980">Sina Weibo</a>
								</td>
							  </tr>
							</table>

						  </td>
						  <td class="expander"></td>
						</tr>
					  </table>

					</td>
					<td class="wrapper last">

					  <table class="six columns">
						<tr>
						  <td class="last right-text-pad">
							<h5>Contact Info:</h5>
							<p>Phone: (+1) 508 335 9815</p>
							<p>Email: <a href="mailto:wpilife@gmail.com">wpilife@gmail.com</a></p>
						  </td>		  
						  <td class="expander"></td>
						</tr>
					  </table>

					</td>
				  </tr>
				</table>
				
				
				<table class="row">
				  <tr>
					<td class="wrapper last">
			
					  <table class="twelve columns">
						<tr>
						  <td align="center">
							<center>
							  <p style="text-align:center;">
								&copy Copyright {year} by <a href="{baseUrl}">WPILIFE</a>. All Rights Reserved.
							  </p>
							</center>
						  </td>
						  <td class="expander"></td>
						</tr>
					  </table>
			
					</td>
				  </tr>
				</table>
				
				<!-- container end below -->
			  </td>
			</tr>
		  </table> 

		</center>
			</td>
		</tr>
	</table>
</body>
</html>