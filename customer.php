<?php
session_start();
include("config.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
	<title> ebuy Groups </title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="images/favicon.png" />
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
		<link rel="stylesheet" href="css/proStyle.css" type="text/css" media="all" />
	  
	 	<link rel="stylesheet" href="css/cart.css" type="text/css" media="all" />
	 <link rel="stylesheet" href="css/chatStyle.css" type="text/css" media="screen" />
	<script src="js/jquery-1.6.2.min.js" type="text/javascript" charset="utf-8"></script>

	<script src="js/cufon-yui.js" type="text/javascript"></script>
	<script src="js/Myriad_Pro_700.font.js" type="text/javascript"></script>
	<script src="js/jquery.jcarousel.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/functions.js" type="text/javascript" charset="utf-8"></script>
	
	
	 <!-- Linking scripts -->
    <script src="js/main.js" type="text/javascript"></script>

	
	<!-- WAA DHAMAADKA JQueryga CHaTTIng Ka-->

<script type="text/javascript">
$(document).ready(function() {

	// load messages every 1000 milliseconds from server.
	load_data = {'fetch':1};
	window.setInterval(function(){
	 $.post('shout.php', load_data,  function(data) {
		$('.message_box').html(data);
		var scrolltoh = $('.message_box')[0].scrollHeight;
		$('.message_box').scrollTop(scrolltoh);
	 });
	}, 1000);
	
	//method to trigger when user hits enter key
	$("#shout_message").keypress(function(evt) {
		if(evt.which == 13) {
				var iusername = $('#shout_username').val();
				var imessage = $('#shout_message').val();
				post_data = {'username':iusername, 'message':imessage};
			 	
				//send data to "shout.php" using jQuery $.post()
				$.post('shout.php', post_data, function(data) {
					
					//append data into messagebox with jQuery fade effect!
					$(data).hide().appendTo('.message_box').fadeIn();
	
					//keep scrolled to bottom of chat!
					var scrolltoh = $('.message_box')[0].scrollHeight;
					$('.message_box').scrollTop(scrolltoh);
					
					//reset value of message box
					$('#shout_message').val('');
					
				}).fail(function(err) { 
				
				//alert HTTP server error
				alert(err.statusText); 
				});
			}
	});
	
	//toggle hide/show shout box
	$(".close_btn").click(function (e) {
		//get CSS display state of .toggle_chat element
		var toggleState = $('.toggle_chat').css('display');
		
		//toggle show/hide chat box
		$('.toggle_chat').slideToggle();
		
		//use toggleState var to change close/open icon image
		if(toggleState == 'block')
		{
			$(".header div").attr('class', 'open_btn');
		}else{
			$(".header div").attr('class', 'close_btn');
		}
		 
		 
	});
});

</script>

<!-- WAA DHAMAADKA JQueryga CHaTTIng Ka-->
</head>
<body>
	<!-- Begin Wrapper -->
	<div id="wrapper">
		<!-- Begin Header -->
		<div id="header">
			<!-- Begin Shell -->
			<div class="shell">
				<h1 id="logo"><a class="notext" href="index.php" title="Suncart">Suncart</a></h1>
				<div id="top-nav">
					<ul>
					
						<li><a href="contact.php" title="Contact"><span>Contact</span></a></li>
						<li><a href="Sign In.php" title="Sign In"><span>Sign In</span></a></li>
					</ul>
				</div>
				<div class="cl">&nbsp;</div>
	<div class="shopping-cart"  id="cart" id="right" >
<dl id="acc">	
<dt class="active">								
<p class="shopping" >Shopping Cart &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
</dt>
<dd class="active" style="display: block;">
<?php
   //current URL of the Page. cart_update.php redirects back to this URL
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

if(isset($_SESSION["cart_session"]))
{
    $total = 0;
    echo '<ul>';
    foreach ($_SESSION["cart_session"] as $cart_itm)
    {
        echo '<li class="cart-itm">';
        echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>'."</br>";
        echo '<h3  style="color: green" ><big> '.$cart_itm["name"].' </big></h3>';
        echo '<div class="p-code"><b><i>ID:</i></b><strong style="color: #d7565b" ><big> '.$cart_itm["code"].' </big></strong></div>';
		echo '<span><b><i>Shopping Cart</i></b>( <strong style="color: #d7565b" ><big> '.$cart_itm["TiradaProductTiga"].'</big></strong>) </span>';
        echo '<div class="p-price"><b><i>Price:</b></i> <strong style="color: #d7565b" ><big>'.$currency.$cart_itm["Qiimaha"].'</big></strong></div>';
        echo '</li>';
        $subtotal = ($cart_itm["Qiimaha"]*$cart_itm["TiradaProductTiga"]);
        $total = ($total + $subtotal); 
    }
    echo '</ul>';
    echo '<span class="check-out-txt"><strong style="color:green" ><i>Total:</i> <big style="color:green" >'.$currency.$total.'</big></strong> <a   class="a-btnjanan"  href="view_cart.php"> <span class="a-btn-text">Check Out</span></a></span>';
	echo '&nbsp;&nbsp;<a   class="a-btnjanan"  href="cart_update.php?emptycart=1&return_url='.$current_url.'"><span class="a-btn-text">Clear Cart</span></a>';
}else{
    echo ' <h4>(Your Shopping Cart Is Empty!!!)</h4>';
}
?>

</dd>
</dl>
</div>
 <div class="clear"></div>
			</div>
			<!-- End Shell -->
		</div>
		<!-- End Header -->
		<!-- Begin Navigation -->
		<div id="navigation">
			<!-- Begin Shell -->
			<div class="shell">
				<ul>
					<li class="active"><a href="home.php" title="home.php">Home</a></li>
					<li>
						<a href="category.php">Category</a>
						<div class="dd">
							<ul>
							<li>
									 <a href="clothing.php"> Clothing & Apparel</a>
								</li>
								
						
								<li>
									<a href="artifacts.php"> Artifacts</a>
									
								</li>

								<li>
									<a href="hangings.php"> Hangings</a>
									
								</li>
								<li>
									<a href="jewellery.php"> Jewellery</a>
									
								</li>
								
								
							</ul>
						</div>
					</li>
					   <li><a href="products.php"> Products</a></li>
					   	   <li>
						<a href="luxury.php">Ebuy Luxe</a>
						<div class="dd">
							<ul>
								<!--
								<li>
									 <a href="">Hand Made Essentials</a>
									
								</li>
								
								<li>
									 <a href="">Local Business</a>
									
								</li>
								
								<li>
									<a href="">Artifacts</a>
									
								</li>
								
								<li>
									<a href="">Clothes</a>
									
								</li>
-->
							</ul>
						</div>
					</li>
					  <li><a href="">About Us</a></li>
					  <li><a href="customer.php">Free Sign Up</a> </li>
				</ul>
				<div class="cl">&nbsp;</div>
			</div>
			<!-- End Shell -->
		</div>
		<!-- End Navigation -->		<!-- Begin Slider -->
		<div id="slider">
		
			<!-- End Shell -->
		</div>
		<!-- End Slider -->
		<!-- Begin Main -->
		<div id="main" class="shell">
			<!-- Begin Content -->
			<div id="content">
           
	
<script type="text/javascript">
$(document).ready(function() { 

    $('#btnSubmit').click(function() {  

        $(".error").hide();
        var hasError = false;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        var emailaddressVal = $("#email").val();
        if(emailaddressVal == '') {
            $("#email").after('<span class="error">Please enter your email address.</span>');
            hasError = true;
        }

        else if(!emailReg.test(emailaddressVal)) {
            $("#email").after('<span class="error">Enter a valid email address.</span>');
            hasError = true;
        }

        if(hasError == true) { return false; }

    });
});

</script>

					
<div id="form_wrapper" class="form_wrapper">
	 <table>
					<form class="register active"  id="myForm" method="POST" action="insertCustomer.php">

   
       <th colspan="3"><h2>CUSTOMER REGISTRATION:</h2> </th> 
						
						
						   
   
   <tr>
    <td>  

		<label> Email:</label>
		<input type="text" name="email" id="email"/>
		<span class="error">This is an error</span>

	
	</td>
    <td>   



		<label> FullName:</label>
		<input type="text" name="name" />
		<span class="error">This is an error</span>
							
   </td>


   </tr>
   
    <tr>
    <td>  

		<label>Password:</label>
		<input type="password" name="password1" id="password1" />

	</td>
	
   <td>   
     	  <label>UserName:</label>
			<input type="text" name="username" id="username"/>
			<span class="error">This is an error</span>

	</td>

   </tr>
   
   <tr>
    <td>  

		<label> Confirm Password:</label>
		<input type="password" name="password2"id="password2" />  
		<div id="pass-info"> </div>
	</td>
	
   <td>   
     
			<label> Phone:</label>
			<input type="text" name="tell" id="tell"/>
			<span class="error">This is an error</span>

   </td>
   
   
   </tr>
   
    <tr>
    <td>   
	
		<label> Country:</label>
        <script type="text/javascript" src="js/countries.js"></script>
        <select onchange="print_state('state',this.selectedIndex);" id="country" name ="country"></select>

   </td>
   
    <td>   

        <label>Address:</label>
		<input type="text" name="address" id="address"/>
		<span class="error">This is an error</span>   
		

   </td>
   
   
   </tr>
   
   
   <tr>
      <td>   
  
            <label> City:</label>
			<select name ="City" id ="state"></select>
		    <script language="javascript">print_country("country");</script>
			<span class="error">This is an error</span>
    </td>
   
      <td>   
   
			<label>Postal code:</label>
			<input type="text" name="pcode" id="pcode"/>
			<span class="error">This is an error</span>

   </td>
   
   </tr>
   
   
  <tr>
						<div class="bottom">

						<td colspan="3">	
						<button  id="btnSubmit" type="submit" name="submit"> Register</button>
							
							<div class="clear"></div>
						</div>
						
		
   </tr>
					</form>

					</table>
					
					
<script type="text/javascript">

$(document).ready(function(){ 
    // $("#btnSubmit").click(function() { 
    // alert("Are You Want To Save A New Customer !!!");
    //     $.ajax({
    //     cache: false,
    //     type: 'POST',
    //     url: 'insertCustomer.php',
    //     data: $("#myForm").serialize(),
    //     success: function(d) {
    //         $("#someElement").html(d);
    //     }
    //     });
    // }); 
});

</script>

					
				</div>
	   			

			</div>
			<!-- End Content -->
			<!-- Begin Sidebar -->
			<div id="sidebar">
				<div class="col span_1_of_3">
					<div class="contact_info">
    	 				<h2>Find Us Here</h2>
					    	  <div class="map">
							  <iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3808.1190524273593!2d78.50561511452858!3d17.358003408221517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb98686ae78299%3A0xb15620bbd3e6bec!2sMatrusri%20Engineering%20college!5e0!3m2!1sen!2sin!4v1614748076441!5m2!1sen!2sin"></iframe><br><small><a href="https://maps.google.com/maps?ll=17.357998,78.507804&z=15&t=m&hl=en&gl=IN&mapclient=embed&cid=798652311487278060" style="">View Larger Map</a></small>
							  </div>
      				</div>
      			<div class="company_address">
				     	<h2>Company Information :</h2>
						    	<p><big> ebuy</big>  An online sales system company established in Hyderabad</p>
						   		<p>  </p>
							  	<br> 
								<p>MATRUSRI ENGINEERING COLLEGE</p>
								<p>HYDERABAD</p>
								<p>INDIA</p>
								 <BIG><b>PHONE:</b></BIG>
				   		          <p>+91 8142474849</p>
								   <p>+040 2021232</p>
				   		          <BIG><b>EMAIL:</b></BIG>
				 	 	          <p>ebuy@gmail.com</p>
								  <p>cse20733134matrusri.edu.in</p>
								  <p>cse20733154matrusri.edu.in</p>
								  <p>cse20733160matrusri.edu.in</p>
                                	<BIG><b>FOLLOW US:</b></BIG>
				   		     		<p>Facebook</p>
							 		<p>Twitter</p>
				   </div>
				 </div>
			</div>
			<!-- End Sidebar -->
			<div class="cl">&nbsp;</div>
			<!-- Begin Products -->

			
	
		</div>
		<!-- End Main -->
		<!-- Begin Footer -->
		<div id="footer">
			<div class="boxes">
				<!-- Begin Shell -->
				<div class="shell">
					<div class="box post-box">
						<h2>About ebuy</h2>
						<div class="box-entry">
							<img src="images/logo.png" alt="ebuy" width="160" height="80">
							<p>You can be confident when you're shopping online with ebuy. Our Secure online shopping website encrypts your personal and financial information to ensure your order information is protected.We use industry standard 128-bit encryption. Our Secure online shopping website locks all critical information passed from you to us,
                             such as personal information, in an encrypted envelope, making it extremely difficult for this information to be intercepted. </p>
							<div class="cl">&nbsp;</div>
						</div>
					</div>
					<div class="box social-box">
						<h2>We are Social</h2>
						<ul>
							<li><a href="https://www.facebook.com/ebay/" title="Facebook"><img src="images/social-icon3.png" alt="Facebook"><span>Facebook</span><span class="cl">&nbsp;</span></a></li>
							<li><a href="https://twitter.com/ebuyskt" title="Twitter"><img src="images/social-icon1.png" alt="Twitter"><span>Twitter</span><span class="cl">&nbsp;</span></a></li>						
							<li><a href="https://www.instagram.com/ebuy/" title="Instagram"><img src="images/social-icon2.png" alt="instagram"><span>Instagram</span><span class="cl">&nbsp;</span></a></li>
						</ul>
						<div class="cl">&nbsp;</div>
					</div>
					<div class="box">
						<h2>Information</h2>
						<ul>
							<li><a href="#" title="Privacy Policy">Privacy Policy</a></li>
							<li><a href="contact.php" title="Contact Us">Contact Us</a></li>

						</ul>
					</div>
					<div class="box last-box">
						<h2>Categories</h2>
						<ul>
							<li><a href="#" title="Clothes &amp; Apprel">Clothes &amp; Apprel</a></li>
							<li><a href="#" title="Home &amp; Living">Home &amp; Living</a></li>
							<li><a href="#" title="Artifacts">Artifacts</a></li>
						</ul>
					</div>
					<div class="cl">&nbsp;</div>
				</div>
				<!-- End Shell -->
			</div>
			<div class="copy">
				<!-- Begin Shell -->
				<div class="shell">
					<div class="carts">
						<ul>
							<li><span>We accept</span></li>
							<li><a href="#" title="PayPal"><img src="images/cart-img1.jpg" alt="PayPal"></a></li>
							<li><a href="#" title="VISA"><img src="images/cart-img2.jpg" alt="VISA"></a></li>
							<li><a href="#" title="MasterCard"><img src="images/cart-img3.jpg" alt="MasterCard"></a></li>
						</ul>
					</div>	<p>© ebuy.com. Groups <a href="index.php"><i><font color="fefefe"> Welcome To ebuy Online Shopping Site </font></i></a></p>
					<div class="cl">&nbsp;</div>
					Copyright © 2023 ebuy.com All rights reserved. The information contained in ebuy.com may not be published, broadcast, rewritten, or redistributed without the prior written authority of ebuy.com
				</div>
				<!-- End Shell -->
			</div>
		</div>
		<!-- End Footer -->
		
	<!-- End Wrapper -->
</body>
</html>