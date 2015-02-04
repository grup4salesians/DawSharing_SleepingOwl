<!DOCTYPE html>
<html>
<head>
<title>Car sharing</title>
@include ('includes\head')
</head>
<body>
<!--header starts-->
@include ('includes\header')
<!---strat-date-piker---->


<div class="online_reservation">
		   <div class="b_room">
			  <div class="booking_room">
				  <div class="reservation">
					  <ul>				
						 <li  class="span1_of_1 left">
							<h5>Origen</h5>
							<div class="book_date">
								<form>
								<!--	<input class="date" id="datepicker" type="text" value="2/08/2013" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '2/08/2013';}">
								-->
								<input id="idText1" type="text">
								</form>
							</div>					
						 </li>
						 <li  class="span1_of_1 left">
							<h5>Destinació</h5>
							<div class="book_date">
								<form>
									<!--<input class="date" id="datepicker1" type="text" value="22/08/2013" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '22/08/2013';}">
									-->
									<input id="idText2" type="text">
								</form>
						    </div>		
						 </li>
						 <li class="span1_of_3">
							<div class="date_btn">
									<form>
										<input type="submit" value="Buscar" />
									</form>
								</div>
						 </li>
						 <li class="span1_of_3">
							<div class="date_btn">
									<form>
										<input type="submit" value="Publicar" />
									</form>
								</div>
						 </li>
						 <div class="clearfix"></div>
					 </ul>
				 </div>
			  </div>
				<div class="clearfix"></div>
		  </div>
	  </div>
</div>
<!---->
<div class="package text-center">
	 <div class="container">
		 <h3>Book A Package</h3>
		 <p>Sed euismod sem id consequat rutrum. Ut convallis lorem a orci mollis, eu vulputate libero aliquet. Praesent egestas nisi sed purus tincidunt faucibus. Aliquam lobortis orci lacus, sed faucibus augue dapibus vitae. Ut vitae mi sapien. Phasellus a eros justo.
		 Curabitur odio massa, tincidunt nec nibh sit amet</p>
		<!-- requried-jsfiles-for owl -->
				<link href="css/owl.carousel.css" rel="stylesheet">
							    <script src="js/owl.carousel.js"></script>
							        <script>
							    $(document).ready(function() {
							      $("#owl-demo").owlCarousel({
							        items : 1,
							        lazyLoad : true,
							        autoPlay : true,
							        navigation : true,
							        navigationText :  false,
							        pagination : false,
							      });
							    });
							    </script>
			<!-- //requried-jsfiles-for owl -->
		  <div id="owl-demo" class="owl-carousel">
			  <div class="item text-center image-grid">	
					<ul>
					 <li><img src="images/1.jpg" alt=""></li>			    
					 <li><img src="images/2.jpg" alt=""></li>				 
					 <li><img src="images/3.jpg" alt=""></li>
					 </ul>
			  </div>
			  <div class="item text-center image-grid">	
					<ul>
					<li> <img src="images/3.jpg" alt=""></li>			    
					 <li><img src="images/4.jpg" alt=""></li>				 
					 <li><img src="images/5.jpg" alt=""></li>
					 </ul>
			  </div>
			  <div class="item text-center image-grid">	
					<ul>
					<li> <img src="images/6.jpg" alt=""></li>			    
					 <li><img src="images/2.jpg" alt=""></li>				 
					 <li><img src="images/8.jpg" alt=""></li>
					 </ul>
			  </div>
		  </div> 		
	 </div>
</div>
<!---->
<!---->
<div class="rooms text-center">
	 <div class="container">
		 <h3>Our Room Types</h3>
		 <div class="room-grids">
			 <div class="col-md-4 room-sec">
				 <img src="images/pic1.jpg" alt=""/>
				 <h4>Standard Double Room</h4>
				 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent scelerisque lectus vitae dui sollicitudin commodo.</p>
				 <div class="items">
					 <li><a href="#"><span class="img1"> </span></a></li>
					 <li><a href="#"><span class="img2"> </span></a></li>
					 <li><a href="#"><span class="img3"> </span></a></li>
					 <li><a href="#"><span class="img4"> </span></a></li>
					 <li><a href="#"><span class="img5"> </span></a></li>
					 <li><a href="#"><span class="img6"> </span></a></li>
				 </div>
			 </div>
			 <div class="col-md-4 room-sec">
				 <img src="images/pic2.jpg" alt=""/>
				 <h4>Supperior Double Room</h4>
				 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent scelerisque lectus vitae dui sollicitudin commodo.</p>
				 <div class="items">					
					 <li><a href="#"><span class="img1"> </span></a></li>
					 <li><a href="#"><span class="img2"> </span></a></li>
					 <li><a href="#"><span class="img3"> </span></a></li>
					 <li><a href="#"><span class="img4"> </span></a></li>
					 <li><a href="#"><span class="img5"> </span></a></li>
					 <li><a href="#"><span class="img6"> </span></a></li>
				 </div>
			 </div>
			 <div class="col-md-4 room-sec">
				 <img src="images/pic3.jpg" alt=""/>
				 <h4>Family Room</h4>
				 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent scelerisque lectus vitae dui sollicitudin commodo.</p>
				 <div class="items">
					 <li><a href="#"><span class="img1"> </span></a></li>
					 <li><a href="#"><span class="img2"> </span></a></li>
					 <li><a href="#"><span class="img3"> </span></a></li>
					 <li><a href="#"><span class="img4"> </span></a></li>
					 <li><a href="#"><span class="img5"> </span></a></li>
					 <li><a href="#"><span class="img6"> </span></a></li>
				 </div>
			 </div>
			 <div class="clearfix"></div>
			 <div class="col-md-4 room-sec">
				 <img src="images/pic4.jpg" alt=""/>
				 <h4>Standard Single Room</h4>
				 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent scelerisque lectus vitae dui sollicitudin commodo.</p>
				 <div class="items">
					 <li><a href="#"><span class="img1"> </span></a></li>
					 <li><a href="#"><span class="img2"> </span></a></li>
					 <li><a href="#"><span class="img3"> </span></a></li>
					 <li><a href="#"><span class="img4"> </span></a></li>
					 <li><a href="#"><span class="img5"> </span></a></li>
					 <li><a href="#"><span class="img6"> </span></a></li>
				 </div>
			 </div>
			 <div class="col-md-4 room-sec">
				 <img src="images/pic5.jpg" alt=""/>
				 <h4>Supperior Single Room</h4>
				 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent scelerisque lectus vitae dui sollicitudin commodo.</p>
				 <div class="items">
					 <li><a href="#"><span class="img1"> </span></a></li>
					 <li><a href="#"><span class="img2"> </span></a></li>
					 <li><a href="#"><span class="img3"> </span></a></li>
					 <li><a href="#"><span class="img4"> </span></a></li>
					 <li><a href="#"><span class="img5"> </span></a></li>
					 <li><a href="#"><span class="img6"> </span></a></li>
				 </div>
			 </div>
			 <div class="col-md-4 room-sec">
				 <img src="images/pic6.jpg" alt=""/>
				 <h4>VIP Room</h4>
				 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent scelerisque lectus vitae dui sollicitudin commodo.</p>
				 <div class="items">
					 <li><a href="#"><span class="img1"> </span></a></li>
					 <li><a href="#"><span class="img2"> </span></a></li>
					 <li><a href="#"><span class="img3"> </span></a></li>
					 <li><a href="#"><span class="img4"> </span></a></li>
					 <li><a href="#"><span class="img5"> </span></a></li>
					 <li><a href="#"><span class="img6"> </span></a></li>
				 </div>
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<!---->
@include ('includes\footer')
<!---->
@include ('includes\footer-info')
<!---->

</body>
</html>