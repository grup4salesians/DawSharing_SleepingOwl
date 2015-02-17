@extends('layouts.default')
@section('title')
Contactar
@stop
@section('subtitle')
Contacta amb nosaltres!
@stop
@section('content')
<div class="paginacontactar">


    <div class="rooms text-center">
        <p>
        <h2>Pots contactar amb nosaltres a través del correu electònic,teléfon o missatge via web:</h2>
        </p>
        <p style='font-weight:bold;'>Correu electrònic: contactar@dawsharing.com</p>
        <p style='font-weight:bold;'>Teléfon: 933301923</p>


        <div class='contactar'>

            @if ($errors->has())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }}<br>        
                @endforeach
            </div>
            @endif
            {{ Form::open(array('url' => '/contactar')) }}

            {{ Form::label('Nom', 'Nom/Organització') }}
            <br>
            {{ Form::text('nom', Input::old('nom'),array()) }}
            <br>
            {{ Form::label('Correu', 'Correu') }}
            <br>
            {{ Form::text('correu', Input::old('correu'),array()) }}
            <br>
            {{ Form::label('Telèfon', 'Telèfon') }}
            <br>
            {{ Form::text('telefon', Input::old('telefon'),array()) }}
            <br>
            {{ Form::label('missatge', 'Missatge') }}
            <br>
            {{ Form::textarea('missatge', Input::old('missatge'),array()) }}
            {{ Form::submit('Enviar!',array('class'=> 'Registre_button'))}}
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop
