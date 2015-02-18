@extends('layouts.default')
@section('title')
Mails
@stop
@section('content')
@include('includes.email')

<!---->
<!---->
<div class="rooms text-center">
            <p />
    <div class="BandejaMails_Main">
        <div class="BadenjaMails_Header">        
            <i class='fa fa-trash fa-3x'></i>
        </div>
        
         <?php $missatges = Correu::where('usuari_id',Auth::user()->id)->orderBy('id', 'desc')->get(); ?>
            @foreach($missatges as $key => $missat)
                    <?php
                        $missatge = new email($missat->id, '15/02/2015', $missat->usuari_id,  $missat->assumpte,substr($missat->contingut,0,100),$missat->vist);
                    ?>
                         {{ $missatge->mostrarEmail() }}
            @endforeach
        
        
    </div>
</div>
@stop