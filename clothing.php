<?php
include("config.php");
include("usersession.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en-US" xmlns="http://www.w3.org/1999/xhtml" dir="ltr" class="cufon-active cufon-ready cufon-active cufon-ready"><head>
	<title> ebuy Groups </title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<link rel="shortcut icon" href="images/favicon.png">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
		<link rel="stylesheet" href="css/proStyle.css" type="text/css" media="all">
	   	<link rel="stylesheet" href="css/userlogin.css" type="text/css" media="all">
	 	<link rel="stylesheet" href="css/cart.css" type="text/css" media="all">
	 <link rel="stylesheet" href="css/chatStyle.css" type="text/css" media="screen"> 

	 
	 <link rel="stylesheet" href="css/audioplayer.css" type="text/css" media="screen">

		<script>
			/*
				VIEWPORT BUG FIX
				iOS viewport scaling bug fix, by @mathias, @cheeaun and @jdalton
			*/
			(function(doc){var addEvent='addEventListener',type='gesturestart',qsa='querySelectorAll',scales=[1,1],meta=qsa in doc?doc[qsa]('meta[name=viewport]'):[];function fix(){meta.content='width=device-width,minimum-scale='+scales[0]+',maximum-scale='+scales[1];doc.removeEventListener(type,fix,true);}if((meta=meta[meta.length-1])&&addEvent in doc){fix();scales=[.25,1.6];doc[addEvent](type,fix,true);}}(document));
		</script>
	<script src="js/jquery-1.6.2.min.js" type="text/javascript" charset="utf-8"></script>

	<script src="js/cufon-yui.js" type="text/javascript"></script><style type="text/css">cufon{text-indent:0!important;}@media screen,projection{cufon{display:inline!important;display:inline-block!important;position:relative!important;vertical-align:middle!important;font-size:1px!important;line-height:1px!important;}cufon cufontext{display:-moz-inline-box!important;display:inline-block!important;width:0!important;height:0!important;overflow:hidden!important;text-indent:-10000in!important;}cufon canvas{position:relative!important;}}@media print{cufon{padding:0!important;}cufon canvas{display:none!important;}}</style><style type="text/css">cufon{text-indent:0!important;}@media screen,projection{cufon{display:inline!important;display:inline-block!important;position:relative!important;vertical-align:middle!important;font-size:1px!important;line-height:1px!important;}cufon cufontext{display:-moz-inline-box!important;display:inline-block!important;width:0!important;height:0!important;overflow:hidden!important;text-indent:-10000in!important;}cufon canvas{position:relative!important;}}@media print{cufon{padding:0!important;}cufon canvas{display:none!important;}}</style>
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
				<h1 id="logo"><a class="notext" href="#" title="Suncart">ebuy</a></h1>
				<div id="top-nav">
					<ul>
						<li><a href="#" title="Login Email"> <span class="janan"> <?php echo "Your Email Is: ". "<i><b>".$login_session."</b></i>" ;?> </span></a></li>
						
							 <li > <a href="contact.php" title="Contact"> <span class="jananalibritish"> Contact  </span></a>  </li>
					       <li class="janan"><a href="logout.php"><span class="jananalibritish">Logout </span></a></li>
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

	if (isset($_SESSION["cart_session"])) {
		$total = 0;
		echo '<ul>';
		foreach ($_SESSION["cart_session"] as $cart_itm) {
			echo '<li class="cart-itm">';
			echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>'."</br>";
			echo '<h3  style="color: green" ><big> '.$cart_itm["name"].' </big></h3>';
			echo '<div class="p-code"><b><i>ID:</i></b><strong style="color: #d7565b" ><big> '.$cart_itm["code"].' </big></strong></div>';
			echo '<span><b><i>Shopping Cart</i></b>( <strong style="color: #d7565b" ><big> '.$cart_itm["TiradaProductTiga"].'</big></strong>) </span>';
			echo '<div class="p-price"><b><i>Price:</b></i> <strong style="color: #d7565b" ><big>'.$currency.$cart_itm["Qiimaha"].'</big></strong></div>';
			echo '</li>';
			$subtotal = ($cart_itm["Qiimaha"] * $cart_itm["TiradaProductTiga"]);
			$total += $subtotal;
		}
		echo '</ul>';
		echo '<span class="check-out-txt"><strong style="color:green" ><i>Total:</i> <big style="color:green" >'.$currency.number_format($total, 2).'</big></strong> <a   class="a-btnjanan"  href="view_cart.php"> <span class="a-btn-text">Check Out</span></a></span>';
		echo '&nbsp;&nbsp;<a   class="a-btnjanan"  href="cart_update.php?emptycart=1&return_url='.$current_url.'"><span class="a-btn-text">Clear Cart</span></a>';
	} else {
		echo ' <h4>(Your Shopping Cart Is Empty!!!)</h4>';
	}
	
?>
<!-- <dd class="active" style="display: block;">
 <h4>(Your Shopping Cart Is Empty!!!)</h4>
</dd> -->
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
							<!--
							<ul>
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
									<a href="">Craft</a>
									
								</li>
								
								<li>
									<a href="">Clothes</a>
									
								</li>
								
							</ul>
-->
						</div>
					</li>
					  <li><a href="">About Us</a></li>
					  <li><a href="customer.php">Free Sign Up</a> </li>
				</ul>
				<div class="cl">&nbsp;</div>
			</div>
			<!-- End Shell -->
		</div>
		<!-- End Navigation -->
<!-- Begin Slider -->
<div id="slider">
			<!-- Begin Shell -->
			<div class="shell">
				<ul class="slider-items">
					<li>
						<img src="images/s1.png" alt="Slide Image" />
						<div class="slide-entry">
							
						</div>
					</li>
					<li>
						<img src="images/s2.png" alt="Slide Image" />
						<div class="slide-entry">
							
						</div>
					</li>
					<li>
						<img src="images\artisan.jpg"alt="Slide Image" />
						<div class="slide-entry">
							
						</div>
					
				</ul>
				<div class="cl">&nbsp;</div>
				<div class="slider-nav">
					
				</div>
			</div>
			<!-- End Shell -->
		</div>
		<!-- End Slider -->
		<!-- Begin Main -->
		<div id="main" class="shell">
			<!-- Begin Content -->
			<div id="content">
				<div class="post">
					<h2>Welcome!</h2>
					<img src="images/local2.jpg" alt="Post Image" height="160" width="260">
E-buy is a platform where all the local vendors and tribals advertise their product to online community.Our Purpose Is To Sustainably Make the Pleasure and Benefits of Tribal products Accessible to the Many.

Our Purpose Is To Sustainably Make the Pleasure and Benefits of Tribalproducts Accessible to the Many,and help local vendors sell theirproducts online.					

You can be confident when you're shopping online with ebuy. Our Secure online shopping website encrypts your personal and financial information to ensure your order information is protected.We use industry standard 128-bit encryption. Our Secure online shopping website locks all critical information passed from you to us, such as personal information, in an encrypted envelope, making it extremely difficult for this information to be intercepted.<p></p>
					<div class="cl">&nbsp;</div>
				</div>
			</div>
			<!-- End Content -->
			
			<div class="cl">&nbsp;</div>
			<!-- Begin Products -->
			<div id="products">
				<h2>Featured Products</h2>

	      <div class="section group">
		  
		  <div class="grid_1_of_4 images_1_of_4"><form method="post" action="cart_update.php"><div class="product-thumb"><img src="images\1689594060_sock[1].jpg"></div><div class="product-content"><h2><b>Knit Wool Crew Socks</b> </h2><div class="product-desc">Vintage Winter Sock</div><div class="product-info"><p><span class="price"> Price:<big style="color:green">₹900</big></span></p>Qty <input type="text" name="product_qty" value="1" size="3"><div class="button"><span><img src="images/cart.jpg" alt=""><button class="cart-button">Add to Cart</button></span> </div></div></div><input type="hidden" name="Product_ID" value="36"><input type="hidden" name="type" value="add"><input type="hidden" name="return_url" value="aHR0cDovL2xvY2FsaG9zdC9lYnV5L2luZGV4LnBocA=="></form></div>
			<div class="grid_1_of_4 images_1_of_4"><form method="post" action="cart_update.php"><div class="product-thumb"><img src="images\1689594120_Potli_purse[1].jpg"></div><div class="product-content"><h2><b>Embroidered Potli Purse Bag</b> </h2><div class="product-desc">Indian Potli Handbag</div><div class="product-info"><p><span class="price"> Price:<big style="color:green">₹3500</big></span></p>Qty <input type="text" name="product_qty" value="1" size="3"><div class="button"><span><img src="images/cart.jpg" alt=""><button class="cart-button">Add to Cart</button></span> </div></div></div><input type="hidden" name="Product_ID" value="37"><input type="hidden" name="type" value="add"><input type="hidden" name="return_url" value="aHR0cDovL2xvY2FsaG9zdC9lYnV5L2luZGV4LnBocA=="></form></div>
			<div class="grid_1_of_4 images_1_of_4"><form method="post" action="cart_update.php"><div class="product-thumb"><img src="images\1689594240_Phone_purse[1].jpg"></div><div class="product-content"><h2><b>Montana West Leather Purse</b> </h2><div class="product-desc">Shoulder Bag</div><div class="product-info"><p><span class="price"> Price:<big style="color:green">₹1300</big></span></p>Qty <input type="text" name="product_qty" value="1" size="3"><div class="button"><span><img src="images/cart.jpg" alt=""><button class="cart-button">Add to Cart</button></span> </div></div></div><input type="hidden" name="Product_ID" value="38"><input type="hidden" name="type" value="add"><input type="hidden" name="return_url" value="aHR0cDovL2xvY2FsaG9zdC9lYnV5L2luZGV4LnBocA=="></form></div>
			<div class="grid_1_of_4 images_1_of_4"><form method="post" action="cart_update.php"><div class="product-thumb"><img src="images\1689594360_Color_cap[1].jpg"></div><div class="product-content"><h2><b>Handmade Cloche Crochet Hats</b> </h2><div class="product-desc">Knitted Beanies Cap</div><div class="product-info"><p><span class="price"> Price:<big style="color:green">₹1200</big></span></p>Qty <input type="text" name="product_qty" value="1" size="3"><div class="button"><span><img src="images/cart.jpg" alt=""><button class="cart-button">Add to Cart</button></span> </div></div></div><input type="hidden" name="Product_ID" value="39"><input type="hidden" name="type" value="add"><input type="hidden" name="return_url" value="aHR0cDovL2xvY2FsaG9zdC9lYnV5L2luZGV4LnBocA=="></form></div>
			<div class="grid_1_of_4 images_1_of_4"><form method="post" action="cart_update.php"><div class="product-thumb"><img src="images\1689594420_Straw_Hat[1].jpg"></div><div class="product-content"><h2><b>Handmade Beach Wide Brim Cap</b> </h2><div class="product-desc">Outdoor Sun Hat</div><div class="product-info"><p><span class="price"> Price:<big style="color:green">₹1400</big></span></p>Qty <input type="text" name="product_qty" value="1" size="3"><div class="button"><span><img src="images/cart.jpg" alt=""><button class="cart-button">Add to Cart</button></span> </div></div></div><input type="hidden" name="Product_ID" value="40"><input type="hidden" name="type" value="add"><input type="hidden" name="return_url" value="aHR0cDovL2xvY2FsaG9zdC9lYnV5L2luZGV4LnBocA=="></form></div>
			<div class="grid_1_of_4 images_1_of_4"><form method="post" action="cart_update.php"><div class="product-thumb"><img src="images\1689594600_Blue_Doormat[1].jpg"></div><div class="product-content"><h2><b>Multi Color Hand Woven Striped Carpet</b> </h2><div class="product-desc">Doormats</div><div class="product-info"><p><span class="price"> Price:<big style="color:green">₹1000</big></span></p>Qty <input type="text" name="product_qty" value="1" size="3"><div class="button"><span><img src="images/cart.jpg" alt=""><button class="cart-button">Add to Cart</button></span> </div></div></div><input type="hidden" name="Product_ID" value="41"><input type="hidden" name="type" value="add"><input type="hidden" name="return_url" value="aHR0cDovL2xvY2FsaG9zdC9lYnV5L2luZGV4LnBocA=="></form></div>
			<div class="grid_1_of_4 images_1_of_4"><form method="post" action="cart_update.php"><div class="product-thumb"><img src="images\1689594720_Multicolor_mat[1].jpg"></div><div class="product-content"><h2><b>Multicolor Hand Woven Braided Rag</b> </h2><div class="product-desc">Feet Cotton + Jute</div><div class="product-info"><p><span class="price"> Price:<big style="color:green">₹1800</big></span></p>Qty <input type="text" name="product_qty" value="1" size="3"><div class="button"><span><img src="images/cart.jpg" alt=""><button class="cart-button">Add to Cart</button></span> </div></div></div><input type="hidden" name="Product_ID" value="42"><input type="hidden" name="type" value="add"><input type="hidden" name="return_url" value="aHR0cDovL2xvY2FsaG9zdC9lYnV5L2luZGV4LnBocA=="></form></div>
			<div class="grid_1_of_4 images_1_of_4"><form method="post" action="cart_update.php"><div class="product-thumb"><img src="images\1689594780_Purple_Saree[1].jpg"></div><div class="product-content"><h2><b>Purple Handloom Cotton Butta Saree</b> </h2><div class="product-desc">Rich Zari Border</div><div class="product-info"><p><span class="price"> Price:<big style="color:green">₹5000</big></span></p>Qty <input type="text" name="product_qty" value="1" size="3"><div class="button"><span><img src="images/cart.jpg" alt=""><button class="cart-button">Add to Cart</button></span> </div></div></div><input type="hidden" name="Product_ID" value="43"><input type="hidden" name="type" value="add"><input type="hidden" name="return_url" value="aHR0cDovL2xvY2FsaG9zdC9lYnV5L2luZGV4LnBocA=="></form></div>
			<div class="grid_1_of_4 images_1_of_4"><form method="post" action="cart_update.php"><div class="product-thumb"><img src="images\1689594900_Black_Saree[1].jpg"></div><div class="product-content"><h2><b>Black Kanchipuram Handmade Silk Saree</b> </h2><div class="product-desc">pure mulberry silk	</div><div class="product-info"><p><span class="price"> Price:<big style="color:green">₹25000</big></span></p>Qty <input type="text" name="product_qty" value="1" size="3"><div class="button"><span><img src="images/cart.jpg" alt=""><button class="cart-button">Add to Cart</button></span> </div></div></div><input type="hidden" name="Product_ID" value="44"><input type="hidden" name="type" value="add"><input type="hidden" name="return_url" value="aHR0cDovL2xvY2FsaG9zdC9lYnV5L2luZGV4LnBocA=="></form></div>    </div>
			<div class="grid_1_of_4 images_1_of_4"><form method="post" action="cart_update.php"><div class="product-thumb"><img src="images\1689595080_Kontanch_Saree[1].jpg"></div><div class="product-content"><h2><b>Kontanch Party Wear Cotton Saree</b> </h2><div class="product-desc">buttas over blouse</div><div class="product-info"><p><span class="price"> Price:<big style="color:green">₹1000</big></span></p>Qty <input type="text" name="product_qty" value="1" size="3"><div class="button"><span><img src="images/cart.jpg" alt=""><button class="cart-button">Add to Cart</button></span> </div></div></div><input type="hidden" name="Product_ID" value="45"><input type="hidden" name="type" value="add"><input type="hidden" name="return_url" value="aHR0cDovL2xvY2FsaG9zdC9lYnV5L2luZGV4LnBocA=="></form></div>    </div>
			<div class="grid_1_of_4 images_1_of_4"><form method="post" action="cart_update.php"><div class="product-thumb"><img src="images\1689595140_Dothi[1].jpg"></div><div class="product-content"><h2><b>Cotton Traditional Single Dhoti</b> </h2><div class="product-desc">Big Gold Border</div><div class="product-info"><p><span class="price"> Price:<big style="color:green">₹400</big></span></p>Qty <input type="text" name="product_qty" value="1" size="3"><div class="button"><span><img src="images/cart.jpg" alt=""><button class="cart-button">Add to Cart</button></span> </div></div></div><input type="hidden" name="Product_ID" value="46"><input type="hidden" name="type" value="add"><input type="hidden" name="return_url" value="aHR0cDovL2xvY2FsaG9zdC9lYnV5L2luZGV4LnBocA=="></form></div>
            <div class="grid_1_of_4 images_1_of_4"><form method="post" action="cart_update.php"><div class="product-thumb"><img src="images\1689595320_Blue_Dress[1].jpg"></div><div class="product-content"><h2><b>Blue floral Flare cotton dress</b> </h2><div class="product-desc">Comes with pockets</div><div class="product-info"><p><span class="price"> Price:<big style="color:green">₹4000</big></span></p>Qty <input type="text" name="product_qty" value="1" size="3"><div class="button"><span><img src="images/cart.jpg" alt=""><button class="cart-button">Add to Cart</button></span> </div></div></div><input type="hidden" name="Product_ID" value="47"><input type="hidden" name="type" value="add"><input type="hidden" name="return_url" value="aHR0cDovL2xvY2FsaG9zdC9lYnV5L2luZGV4LnBocA=="></form></div>
            <div class="grid_1_of_4 images_1_of_4"><form method="post" action="cart_update.php"><div class="product-thumb"><img src="images\1689600120_Kunbi_Saree[1].jpg"></div><div class="product-content"><h2><b>Kunbi Handloom Saree</b> </h2><div class="product-desc">heavy dobby border</div><div class="product-info"><p><span class="price"> Price:<big style="color:green">₹3300</big></span></p>Qty <input type="text" name="product_qty" value="1" size="3"><div class="button"><span><img src="images/cart.jpg" alt=""><button class="cart-button">Add to Cart</button></span> </div></div></div><input type="hidden" name="Product_ID" value="52"><input type="hidden" name="type" value="add"><input type="hidden" name="return_url" value="aHR0cDovL2xvY2FsaG9zdC9lYnV5L2luZGV4LnBocA=="></form></div>
            <div class="grid_1_of_4 images_1_of_4"><form method="post" action="cart_update.php"><div class="product-thumb"><img src="images\1689600240_Green_Sock[1].jpg"></div><div class="product-content"><h2><b>Woonie Striped Socks</b> </h2><div class="product-desc">Handmade Sock Grey</div><div class="product-info"><p><span class="price"> Price:<big style="color:green">₹300</big></span></p>Qty <input type="text" name="product_qty" value="1" size="3"><div class="button"><span><img src="images/cart.jpg" alt=""><button class="cart-button">Add to Cart</button></span> </div></div></div><input type="hidden" name="Product_ID" value="53"><input type="hidden" name="type" value="add"><input type="hidden" name="return_url" value="aHR0cDovL2xvY2FsaG9zdC9lYnV5L2luZGV4LnBocA=="></form></div>
            <div class="grid_1_of_4 images_1_of_4"><form method="post" action="cart_update.php"><div class="product-thumb"><img src="images\1689600300_Baby_Dress[1].jpg"></div><div class="product-content"><h2><b>Handmade baby dress</b> </h2><div class="product-desc">	0-9 months</div><div class="product-info"><p><span class="price"> Price:<big style="color:green">₹1200</big></span></p>Qty <input type="text" name="product_qty" value="1" size="3"><div class="button"><span><img src="images/cart.jpg" alt=""><button class="cart-button">Add to Cart</button></span> </div></div></div><input type="hidden" name="Product_ID" value="54"><input type="hidden" name="type" value="add"><input type="hidden" name="return_url" value="aHR0cDovL2xvY2FsaG9zdC9lYnV5L2luZGV4LnBocA=="></form></div>
        </div>
			
				<div class="cl">&nbsp;</div>
			</div>
			<!-- End Products -->
			
			
      <!-- Begin Products Slider
	  <div id="product-slider" class="jcarousel-container jcarousel-container-horizontal" style="position: relative; display: block;">
				<h2>Best Products</h2>
				<div class="jcarousel-clip jcarousel-clip-horizontal" style="position: relative;"><ul class="jcarousel-list jcarousel-list-horizontal" style="overflow: hidden; position: relative; top: 0px; margin: 0px; padding: 0px; left: -1419.08px; width: 2845px;">
				
		  						<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-1 jcarousel-item-1-horizontal" jcarouselindex="1" style="float: left; list-style: none;">
						<a href="products.php" title="Product Link"><img src="images/1614742800_buddha wodden.jpg" alt="IMAGES"></a>
						<div class="info">
							<h4><b>Buddha sculpture</b></h4>
							<span class="number"><span>Price:<big style="color:green">₹350</big></span></span>
					
							<div class="cl">&nbsp;</div>
							 
						</div>
					</li>
					 					<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-2 jcarousel-item-2-horizontal" jcarouselindex="2" style="float: left; list-style: none;">
						<a href="products.php" title="Product Link"><img src="images/1614742860_butti.webp" alt="IMAGES"></a>
						<div class="info">
							<h4><b>Butti</b></h4>
							<span class="number"><span>Price:<big style="color:green">₹210</big></span></span>
					
							<div class="cl">&nbsp;</div>
							 
						</div>
					</li>
					 					<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-3 jcarousel-item-3-horizontal" jcarouselindex="3" style="float: left; list-style: none;">
						<a href="products.php" title="Product Link"><img src="images/1614742920_carpet.jpg" alt="IMAGES"></a>
						<div class="info">
							<h4><b>Carpet 1</b></h4>
							<span class="number"><span>Price:<big style="color:green">₹400</big></span></span>
					
							<div class="cl">&nbsp;</div>
							 
						</div>
					</li>
					 					<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-4 jcarousel-item-4-horizontal" jcarouselindex="4" style="float: left; list-style: none;">
						<a href="products.php" title="Product Link"><img src="images/1614742980_carpet2.jpg" alt="IMAGES"></a>
						<div class="info">
							<h4><b>carpet 2</b></h4>
							<span class="number"><span>Price:<big style="color:green">₹350</big></span></span>
					
							<div class="cl">&nbsp;</div>
							 
						</div>
					</li>
					 					<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-5 jcarousel-item-5-horizontal" jcarouselindex="5" style="float: left; list-style: none;">
						<a href="products.php" title="Product Link"><img src="images/1614743280_claypot.jpg" alt="IMAGES"></a>
						<div class="info">
							<h4><b>claypot</b></h4>
							<span class="number"><span>Price:<big style="color:green">₹400</big></span></span>
					
							<div class="cl">&nbsp;</div>
							 
						</div>
					</li>
					 					<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-6 jcarousel-item-6-horizontal" jcarouselindex="6" style="float: left; list-style: none;">
						<a href="products.php" title="Product Link"><img src="images/1614743340_hang.webp" alt="IMAGES"></a>
						<div class="info">
							<h4><b>hang</b></h4>
							<span class="number"><span>Price:<big style="color:green">₹450</big></span></span>
					
							<div class="cl">&nbsp;</div>
							 
						</div>
					</li>
					 					<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-7 jcarousel-item-7-horizontal" jcarouselindex="7" style="float: left; list-style: none;">
						<a href="products.php" title="Product Link"><img src="images/1614743400_bhil.webp" alt="IMAGES"></a>
						<div class="info">
							<h4><b>painting 1</b></h4>
							<span class="number"><span>Price:<big style="color:green">₹600</big></span></span>
					
							<div class="cl">&nbsp;</div>
							 
						</div>
					</li>
					 					<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-8 jcarousel-item-8-horizontal" jcarouselindex="8" style="float: left; list-style: none;">
						<a href="products.php" title="Product Link"><img src="images/1614743520_bhil2.webp" alt="IMAGES"></a>
						<div class="info">
							<h4><b>painting 2</b></h4>
							<span class="number"><span>Price:<big style="color:green">₹650</big></span></span>
					
							<div class="cl">&nbsp;</div>
							 
						</div>
					</li>
					 					<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-9 jcarousel-item-9-horizontal" jcarouselindex="9" style="float: left; list-style: none;">
						<a href="products.php" title="Product Link"><img src="images/1614744060_kurta.webp" alt="IMAGES"></a>
						<div class="info">
							<h4><b>kurth</b></h4>
							<span class="number"><span>Price:<big style="color:green">₹850</big></span></span>
					
							<div class="cl">&nbsp;</div>
							 
						</div>
					</li>
					 					<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-10 jcarousel-item-10-horizontal" jcarouselindex="10" style="float: left; list-style: none;">
						<a href="products.php" title="Product Link"><img src="images/1614744540_payal.webp" alt="IMAGES"></a>
						<div class="info">
							<h4><b>payal</b></h4>
							<span class="number"><span>Price:<big style="color:green">₹250</big></span></span>
					
							<div class="cl">&nbsp;</div>
							 
						</div>
					</li>
					 					<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-11 jcarousel-item-11-horizontal" jcarouselindex="11" style="float: left; list-style: none;">
						<a href="products.php" title="Product Link"><img src="images/1614744600_lamp.webp" alt="IMAGES"></a>
						<div class="info">
							<h4><b>lamp 2</b></h4>
							<span class="number"><span>Price:<big style="color:green">₹350</big></span></span>
					
							<div class="cl">&nbsp;</div>
							 
						</div>
					</li>
					 					<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-12 jcarousel-item-12-horizontal" jcarouselindex="12" style="float: left; list-style: none;">
						<a href="products.php" title="Product Link"><img src="images/1614744720_rusticpot.jpg" alt="IMAGES"></a>
						<div class="info">
							<h4><b>Rustic pot</b></h4>
							<span class="number"><span>Price:<big style="color:green">₹300</big></span></span>
					
							<div class="cl">&nbsp;</div>
							 
						</div>
					</li>
					 					<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-13 jcarousel-item-13-horizontal" jcarouselindex="13" style="float: left; list-style: none;">
						<a href="products.php" title="Product Link"><img src="images/1614745320_snack.png" alt="IMAGES"></a>
						<div class="info">
							<h4><b>Namkeen</b></h4>
							<span class="number"><span>Price:<big style="color:green">₹50</big></span></span>
					
							<div class="cl">&nbsp;</div>
							 
						</div>
					</li>
					 					<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-14 jcarousel-item-14-horizontal" jcarouselindex="14" style="float: left; list-style: none;">
						<a href="products.php" title="Product Link"><img src="images/1614745500_clean.png" alt="IMAGES"></a>
						<div class="info">
							<h4><b>cleaning set</b></h4>
							<span class="number"><span>Price:<big style="color:green">₹450</big></span></span>
					
							<div class="cl">&nbsp;</div>
							 
						</div>
					</li>
					 					<li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-15 jcarousel-item-15-horizontal" jcarouselindex="15" style="float: left; list-style: none;">
						<a href="products.php" title="Product Link"><img src="images/1614745560_soft.png" alt="IMAGES"></a>
						<div class="info">
							<h4><b>Drinks</b></h4>
							<span class="number"><span>Price:<big style="color:green">₹300</big></span></span>
					
							<div class="cl">&nbsp;</div>
							 
						</div>
					</li>
					 				</ul></div>
				<div class="cl">&nbsp;</div>
			<div class="jcarousel-prev jcarousel-prev-horizontal" style="display: block;"></div><div class="jcarousel-next jcarousel-next-horizontal" style="display: block;"></div></div><!-- End Products Slider -->
			
		</div>
		 End Main -->
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
							<li><a href="#" title="Contact Us">Contact Us</a></li>

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
		
	

</body></html>