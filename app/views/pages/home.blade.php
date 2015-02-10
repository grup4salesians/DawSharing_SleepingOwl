@extends('layouts.buscar')
@section('title')
Home
@stop
@section('subtitle')
Troba companys per viatjar
@stop
@section('content')
 @include('includes.blockRuta')

<!---->
<!---->
<div class="rooms text-center">
    <div class="container">
        <p />
        <h3>Our Room Types</h3>
        <div class="room-grids">
            <div class="col-md-6 room-sec">
                <?php
                    $ruta1 = new blockRuta(1, "02/04/2015 - 12:23", "Barcelona", "Madrid", 24, 2, "b-f-j-d-h-k-d");
                    echo $ruta1->mostrarMapa();
                ?>
            </div>
            <div class="col-md-6 room-sec">
                <?php
                    $ruta1 = new blockRuta(1, "02/04/2015 - 12:23", "Barcelona", "Madrid", 24, 2, "b-f-j-d-h-k-d");
                    echo $ruta1->mostrarMapa();
                ?>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6 room-sec">
                <?php
                    $ruta1 = new blockRuta(1, "02/04/2015 - 12:23", "Barcelona", "Madrid", 24, 2, "b-f-j-d-h-k-d");
                    echo $ruta1->mostrarMapa();
                ?>

            </div>
            <div class="col-md-6 room-sec">
                <?php
                    $ruta1 = new blockRuta(1, "02/04/2015 - 12:23", "Barcelona", "Madrid", 24, 2, "b-f-j-d-h-k-d");
                    echo $ruta1->mostrarMapa();
                ?>

            </div>
            <div class="clearfix"></div>
            <div class="col-md-6 room-sec">
                <?php
                    $ruta1 = new blockRuta(1, "02/04/2015 - 12:23", "Barcelona", "Madrid", 24, 2, "b-f-j-d-h-k-d");
                    echo $ruta1->mostrarMapa();
                ?>

            </div>
            <div class="col-md-6 room-sec">
                <?php
                    $ruta1 = new blockRuta(1, "02/04/2015 - 12:23", "Barcelona", "Madrid", 24, 2, "b-f-j-d-h-k-d");
                    echo $ruta1->mostrarMapa();
                ?>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@stop