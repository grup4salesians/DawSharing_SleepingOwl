<div class="header">
	 <div class="top-header">
		 <div class="container">
			 <div class="logo">
				 	<a href="index.html"><img src="images/logo.png"/></a>
			 </div>
			 <span class="menu"> </span>
			 <div class="m-clear"></div>
			 <div class="top-menu">
				<ul>
				<!--
					<li class="active"><a href="index.html">START</a></li>
					<li><a class="scroll" href="facilities.html">FACILITIES</a></li>
				-->
				<li><a class="scroll" href="facilities.html">Registra't</a></li>
				<li><a class="scroll" href="facilities.html">Usuaris</a></li>
				<li>
				    <select id="country" onchange="change_country(this.value)" class="frm-field required">
						<option value="null">CA</option>
						<option value="null">ES</option>         
						<option value="AX">EN</option>
					</select>
				</li>
				</ul>
				<script>
					$("span.menu").click(function(){
						$(".top-menu ul").slideToggle(200);
					});
				</script>
			 </div>
			 <div class="clearfix"></div>
		  </div>
	  </div>
	  <div class="banner">
			<div class="banner-info text-center">
			<h3><label>Hello,</label> You've Reached</h3>
			<h1>HOTEL FORTUNE</h1>
			<span></span>
			<ul>
			 <li><a class="scroll" href="#">HOTEL</a><i class="line"></i></li>
			 <li><a class="scroll" href="#">SPA SALOON</a><i class="line2"></i></li>
			 <li><a class="scroll" href="#">FINE DINING</a></li>
			 <div class="clearfix"></div>
			</ul>
			</div>
	  </div>
</div>