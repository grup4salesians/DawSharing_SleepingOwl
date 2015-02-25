<div id="cont-Pas-1" style="display: none" class="visible PublicarViatge_CampsPas1 col-md-6 testtest">
    @if ($errors->has())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        {{ $error }}<br>        
        @endforeach
    </div>
    @endif
    <div class="form-group">
        {{ Form::label('MeuVehicle', 'El meu vehicle') }}
        {{ Form::select('meuVehicle', $arrayVehicles,null,array('class' => 'PublicarViatge_Elementos','id'=>'meuVehicle')) }}
        <a href="#">{{ Form::button('Afegir Vehicle',array('class'=>'btn btn-default','style'=>'float: right;','id'=>'btnAfegirVehicle')) }}</a>    
    </div>

    <div class="form-group">
        {{ Form::label('Origen', 'Origen') }}
        {{ Form::text('searchTextField',$origen,array('class' => 'PublicarViatge_Elementos','id'=>'searchTextField')) }} 

    </div>   
    <div class="form-group">
        {{ Form::label('Destinacio', 'Destinació') }}
        {{ Form::text('searchTextFieldFin',$desti,array('class' => 'PublicarViatge_Elementos','id'=>'searchTextFieldFin')) }} 
    </div>
</div>