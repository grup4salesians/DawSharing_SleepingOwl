<div class="top-header">
    <div class="container">
        <div class="logo">
                       <!--<a href="index.html"><img src="images/logo.png"/></a>-->
        </div>
        <span class="menu"> </span>
        <div class="m-clear"></div>
        <div class="top-menu">
            <ul>
                 <!--   <li class="active"><a href="index.html">START</a></li>
                        <li><a class="scroll" href="facilities.html">FACILITIES</a></li> 
                   -->
                              
                <li>

    		<a href="#" data-toggle="modal" data-target=".bs-example-modal-sm">Inicia Sessió</a>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="height: 200px;">
        @include('includes.login')
    </div>
  </div>
</div>
 

                </li>
                <!--<li><a class="scroll" href="facilities.html"></a></li>-->
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
                $("span.menu").click(function () {
                    $(".top-menu ul").slideToggle(200);
                });
            </script>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
