<div class="top-header">
    <div class="container">
        <div class="logo">
            <a href="../public"><span style="Font-family: 'Quicksand', sans-serif;font-weight:bold;font-size: 30px;color:#a94442; padding: 10px; border:1px solid black;border-top-left-radius:10px;background-color: #E7CB2C;">DAW</span><span style="Font-family: 'Quicksand', sans-serif;font-weight:bold;font-size: 30px;color:#E7CB2C; padding: 10px; border:1px solid black;border-bottom-right-radius:10px;background-color: #a94442">SHARING</span></a>
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
                        <a id="dLabel" href="#" data-toggle="dropdown" aria-haspopup="true" role="button" style="color:white;">
                            <?php echo Auth::user()->getFullNameAttribute(); ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="#">Els meus viatges</a>
                            </li>
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="missatges">Missatges</a>
                            </li>
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="perfil">Perfil</a>
                            </li>
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="../public/contactar">Contactar</a>
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
                <?php if (!Auth::check()) { ?>
                    <li><a class="scroll" href="registre">Registra't</a></li>                
                    <?php
                }
                ?>

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
