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

                <?php if (Auth::check()) { ?>
                    <li role="presentation" class="dropdown">
                        <a id="dLabel" href="#" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false" style="color:white;">
                             <?php echo Auth::user()->getFullNameAttribute(); ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="#">Els meus viatges</a>
                            </li>
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="#">Missatges</a>
                            </li>
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="#">Perfil</a>
                            </li>
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="#">Ajuda</a>
                            </li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="logout">Sortir</a>
                            </li>
                        </ul>

                    </li>
                <?php } else { ?>
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
                <?php } ?>   


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
