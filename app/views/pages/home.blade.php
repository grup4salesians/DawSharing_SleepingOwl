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
        <h3>Últims Viatges</h3>
        <div class="room-grids">
            <?php $viatges = Viatge::orderBy('id', 'desc')->take(6)->get(); ?>

            @foreach($viatges as $key => $val)
                <div class="col-md-6 room-sec">
                    <?php
                        $userInfo = Usuari::where('id', $val->usuari_id)->get();
                        $fotoUser = $userInfo[0]->foto;
                        $ruta = Ruta::where('id', '=', $val->ruta_id)->get();
                        $ruta1 = new blockRuta($val->id, $val->data, $ruta[0]->inici_ruta, $ruta[0]->fi_ruta, $val->preu, $val->numSeientRestant, $val->permissos, $fotoUser);
                    ?>
                        {{ $ruta1->mostrarMapa() }}
                </div>
                
                @if($key%2)
                    <div class="clearfix"></div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@stop