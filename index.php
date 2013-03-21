<?php
	require_once("functions.php");
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" dir="ltr" lang="sv-SE"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" dir="ltr" lang="sv-SE"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" dir="ltr" lang="sv-SE"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" dir="ltr" lang="sv-SE" xmlns:og="http://opengraphprotocol.org/schema/"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	
	
	<!-- CSS
	================================================== -->
	<link rel="stylesheet" href="wp-content/themes/postify/style.css">
	<link rel="stylesheet" href="wp-content/themes/postify/library/css/reveal.css">
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!-- Favicons
	================================================== -->
	<link rel="icon" type="image/png" href="http://postify.com/wp-content/themes/postify/library/images/favicon.png">
	<link rel="apple-touch-icon" href="http://postify.com/wp-content/themes/postify/library/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="http://postify.com/wp-content/themes/postify/library/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="http://postify.com/wp-content/themes/postify/library/images/apple-touch-icon-114x114.png">
	
			
	
	<!-- This site is optimized with the Yoast WordPress SEO plugin v1.2.8.5 - http://yoast.com/wordpress/seo/ -->
	<title>Postify assignment - João Correia</title>
	<link rel="canonical" href="index.html" />
	<meta property='og:locale' content='sv_se'/>
	<meta property='og:title' content='Selling Christmas cards and postcards - Postify'/>
	<meta property='og:url' content='http://postify.com/business/selling-christmas-cards-and-postcards/'/>
	<meta property='og:site_name' content='Postify'/>
	<meta property='og:type' content='article'/>

	<link rel="alternate" type="application/rss+xml" title="Postify &raquo; flöde" href="http://postify.com/feed/" />
	<link rel="alternate" type="application/rss+xml" title="Postify &raquo; kommentarsflöde" href="http://postify.com/comments/feed/" />
	<link rel="alternate" type="application/rss+xml" title="Postify &raquo; Selling Christmas cards and postcards kommentarsflöde" href="http://postify.com/business/selling-christmas-cards-and-postcards/feed/" />
	<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
	<style type="text/css">.broken_link, a.broken_link {
		text-decoration: line-through;
	}</style>
	<style>
	 input.parsley-error, textarea.parsley-error {
        color: #B94A48 !important;
        background-color: #F2DEDE !important;
        border: 1px solid #EED3D7 !important;
      }
      ul.parsley-error-list {
          font-size: 11px;
          margin: 0px;
          list-style-type:none; 
      }
      ul.parsley-error-list li {
          line-height: 5px;
          text-align: right;
          color: rgb(190, 27, 27);
      }
      
	</style>
</head>
<body class="page page-id-782 page-child parent-pageid-11 page-template page-template-template-featured-contact-php">
	<div id="modal" class="reveal-modal">
		
	</div>
	
	<!-- ClickTale Top part -->
	<script type="text/javascript">
		var WRInitTime=(new Date()).getTime();
	</script>
	<!-- ClickTale end of Top part -->

	<div id="fb-root"></div>

	<header id="header">
		<?php 
			include "header.php";
		?>
	</header>
		
	<div id="featured" style="background-color:#eb593c; color:#fff; padding-bottom: 6px;">
		<ul class="container_24 clearfix">
			<li>
				<div class="featured-text" style="padding-top: 30px;">
					<h1 class="h1" style="margin-bottom:5px;">Postify assignment development area</h1>
					<p class="text-large">This is a development area for the assignement requested by postify. If you have found this page by chance, please be informed that this area is not postify responsability.</p>
				</div>
			</li>
		</ul> <!-- /.container_24 -->
		<div class="slide-wave-footer"></div>
	</div> <!-- /#featured -->
		
	<div id="main">
		<?php 
			include "main.php";
			include "list.php";
			$unhide = "
				$('#login_area').show();
				$('#main').animate({
        			height: $('#login_area').height() + 'px'
        		},100);
			";
			if ($_REQUEST['c']=="userConfirm") {
				if (userConfirm()) {
					include "registerSuccess.php";
				} else {
					include "registerFail.php";
				}
				$unhide = "
					$('#register_result').show();
					$('#main').animate({
            			height: $('#register_result').height() + 'px'
            		},100);
				";
			}
			
		?>
	</div> <!-- /#main -->
	
	<footer id="footer">
		<?php
			include "footer.php";
		?>
	</footer>

	<!-- End Document ================================================== -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script src="wp-content/themes/postify/library/js/spin.min.js"></script>
	<script src="wp-content/themes/postify/library/js/jquery.flexslider-min.js"></script>
	<script src="wp-content/themes/postify/library/js/jquery.fancybox.js%3Fv=1.1"></script>
	<script src="wp-content/themes/postify/library/js/scripts.js%3Fv=1.1"></script>
	<script src="wp-content/themes/postify/library/js/list.js"></script>
	<script src="wp-content/themes/postify/library/js/parsley-standalone.min.js"></script>
	<script src="wp-content/themes/postify/library/js/jquery.reveal.js"></script>

	<!-- ClickTale Bottom part -->
	<div id="ClickTaleDiv" style="display: none;"></div>
	<script type="text/javascript">
		var auth_token = "";

			$.fn.spin = function() {
			  this.each(function() {
			    var $this = $(this),
			        data = $this.data();
			
			    if (data.spinner) {
			      data.spinner.stop();
			      delete data.spinner;
			    }
		      	data.spinner = new Spinner($.extend({color: $this.css('color')}, {lines: 17,length: 7,width: 7,radius: 19,corners: 1,rotate: 0,color: '#000',speed: 1.7,trail: 100,shadow: false,hwaccel: false,className: 'spinner',zIndex: 2e9,top: 'auto',left: 'auto'})).spin(this);
			  });
			  return this;
			};
		
		$(document).ready(function() {
			<?php echo $unhide; ?>
			
			$('#register_submit').click(function() {
				$('#register_form').parsley('validate');
				if ($('#register_form').parsley('isValid')) {

					var postData = $("#register_form").serialize(); 
					$('#register_form').find(':input:not(:disabled)').prop('disabled',true);
					$('#register_form').spin();

					$.post("api.php", postData, function(data) {

						$('#register_form').data().spinner.stop();
						$('#register_form').find(':input:disabled').prop('disabled',false);

						if (data.status == "Success") {
							$('#register_form')[0].reset();
							$('#menu-item-1').click();
						}
						$('#modal').html('<div style="padding: 20px; text-align: center;"><h3>'+data.message+'</h3><p style=" text-align: center;">Please hit escape to exit this window.</p>')
						$('#modal').reveal({
						     animation: 'fadeAndPop',                   //fade, fadeAndPop, none
						     animationspeed: 300,                       //how fast animtions are
						     closeonbackgroundclick: true,              //if you click background will modal close?
						     dismissmodalclass: 'close-reveal-modal'    //the class of a button or element that will close an open modal
						});
					},'json');
				}
			});
			
			$('#sigin_submit').click(function() {
				$('#sigin_form').parsley('validate');
				if ($('#sigin_form').parsley('isValid')) {
					var postData = $("#sigin_form").serialize(); 
					$('#sigin_form').find(':input:not(:disabled)').prop('disabled',true);
					$('#sigin_form').spin();
					$.post("api.php", postData, function(data) {
						$('#sigin_form').data().spinner.stop();
						$('#sigin_form').find(':input:disabled').prop('disabled',false);
						if (data.status == "Success") {
							$('#sigin_form')[0].reset();
							auth_token = data.token;
							initSession();
						} else {
							$('#modal').html('<div style="padding: 20px; text-align: center;"><h3>'+data.message+'</h3><p style=" text-align: center;">Please hit escape to exit this window.</p>')
							$('#modal').reveal({
							     animation: 'fadeAndPop',                   //fade, fadeAndPop, none
							     animationspeed: 300,                       //how fast animtions are
							     closeonbackgroundclick: true,              //if you click background will modal close?
							     dismissmodalclass: 'close-reveal-modal'    //the class of a button or element that will close an open modal
							});
						}
					},'json');
				}
			});
			
			$('#contact_submit').click(function() {
				$('#contact_form').parsley('validate');
				if ($('#contact_form').parsley('isValid')) {
					var postData = $("#contact_form").serialize(); 
					
					$('#contact_form').find(':input:not(:disabled)').prop('disabled',true);
					$('#contact_form').spin();
					
					$.post("api.php", postData, function(data) {
						
						$('#contact_form')[0].reset();
						$('#contact_form').find(':input:disabled').prop('disabled',false);
						$('#contact_form').data().spinner.stop();
						
						if (data.status == "Success") {
							$('#modal').html('<div style="padding: 20px; text-align: center;"><h3>'+data.message+'</h3><p style=" text-align: center;">Please hit escape to exit this window.</p>')
							$('#modal').reveal({
							     animation: 'fadeAndPop',                   //fade, fadeAndPop, none
							     animationspeed: 300,                       //how fast animtions are
							     closeonbackgroundclick: true,              //if you click background will modal close?
							     dismissmodalclass: 'close-reveal-modal'    //the class of a button or element that will close an open modal
							});
						}
					},'json');
				}
			});
			
	
			$('#menu-item-1').click(function() {
				$(".current-menu-ancestor").removeClass('current-menu-ancestor');
				$(this).addClass('current-menu-ancestor');

				$("#main").children().each(function() {
					$(this).fadeOut(100);
				});
				if (auth_token == "") {
					$('#main').animate({
	                	height: $('#login_area').height() + "px"
	                },100);
					$('#login_area').fadeIn(100);
				} else {
					$('#main').animate({
	                	height: $('#main_area').height() + "px"
	                },100);
					$('#main_area').fadeIn(100);
				}
				return false;
			});
	
			$('#menu-item-2').click(function() {
				$(".current-menu-ancestor").removeClass('current-menu-ancestor');
				$(this).addClass('current-menu-ancestor');
				
				$("#main").children().each(function() {
					$(this).fadeOut(100);
				});
				$('#main').animate({
                	height: $('#register_area').height() + "px"
                },100);
				$('#register_area').fadeIn(100);

				return false;
			});
			
			$('#menu-item-3').click(function() {
				$(".current-menu-ancestor").removeClass('current-menu-ancestor');
				$(this).addClass('current-menu-ancestor');

				$("#main").children().each(function() {
					$(this).fadeOut(100);
				});
				$('#main').animate({
                	height: $('#list_area').height() + "px"
                },200);
				$('#list_area').fadeIn(200);
	
				return false;
			});

			$('#menu-item-4').click(function() {
				$.post("api.php", {c: 'userSignOut', token:auth_token}, function(data) {
					if (data.status == "Success") {
						auth_token = "";
						
						$('#menu-item-2').show();
						$('#menu-item-3').hide();
						$('#menu-item-4').hide();
		
						$('#sigin_form')[0].reset()							
						$('#menu-item-1').click();
					} else {
						$('#modal').html('<div style="padding: 20px; text-align: center;"><h3>'+data.message+'</h3><p style=" text-align: center;">Please hit escape to exit this window.</p>')
						$('#modal').reveal({
						     animation: 'fadeAndPop',                   //fade, fadeAndPop, none
						     animationspeed: 300,                       //how fast animtions are
						     closeonbackgroundclick: true,              //if you click background will modal close?
						     dismissmodalclass: 'close-reveal-modal'    //the class of a button or element that will close an open modal
						});
					}
				},'json');
				return false;
			});
			
			<?php
				if ($_SESSION['auth']['token'] != "") {
					echo "auth_token = '".$_SESSION['auth']['token']."';";
					echo "initSession();";
				}
			?>
			function initSession() {
				$.post("api.php", {c: 'getLastAccesses', token:auth_token}, function(data) {
					if (data.status == "Success") {
						var options = {
						    item: '<li style="padding: 0px 10px; border-bottom: 1px dotted #BBB; text-align:center;"><h4><span class="pos"></span>. &nbsp;&nbsp;&nbsp; <span class="date"></span></h4></li>',
						    valueNames: [ 'pos','date' ]
						};

						for (i=0; i<data.data.length; i++) {
							d = new Date(data.data[i].date);
							d.setMinutes(d.getMinutes()-d.getTimezoneOffset());
							data.data[i].date = d.toLocaleString();
						}

						var featureList = new List('access-list', options);
						featureList.clear();
						featureList.add(data.data);

						$('#menu-item-2').hide();
						$('#menu-item-3').show();
						$('#menu-item-4').show();

						$('#menu-item-3').click();
					} else {
						$('#modal').html('<div style="padding: 20px; text-align: center;"><h3>'+data.message+'</h3><p style=" text-align: center;">Please hit escape to exit this window.</p>')
						$('#modal').reveal({
						     animation: 'fadeAndPop',                   //fade, fadeAndPop, none
						     animationspeed: 300,                       //how fast animtions are
						     closeonbackgroundclick: true,              //if you click background will modal close?
						     dismissmodalclass: 'close-reveal-modal'    //the class of a button or element that will close an open modal
						});
					}
				},'json');
			}
		});
	</script>
	<!-- ClickTale end of Bottom part -->
</body>
</html>