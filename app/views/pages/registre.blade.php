@extends('layouts.default')
@section('title')
Registre
@stop
@section('content')
<div class="Registre_Titol">Registra't per compartir cotxe i viatja amb nosaltres!</div>
<div class="panel-body" style="width: 390px; margin: auto;">
    {{ Form::open(array('url' => 'registre')) }}
    <div class="form-group">
        {{ Form::label('Nom', 'Nom') }}
        {{ Form::text('nom', Input::old('nom'),array('class' => 'Registre_TextBox')) }}
    </div>
    <div class="form-group">
        {{ Form::label('Cognoms', 'Cognoms') }}
        {{ Form::text('cognoms', Input::old('cognoms'),array('class' => 'Registre_TextBox')) }}
    </div>
    <div class="form-group">
        {{ Form::label('Email', 'Email') }}
        {{ Form::text('email', Input::old('email'),array('class' => 'Registre_TextBox')) }}
    </div>
    <div class="form-group">
        {{ Form::label('Contrasenya', 'Contrasenya') }}
        {{ Form::password('contrasenya',array('class' => 'Registre_TextBox')) }}
    </div>
    <div class="form-group">
        {{ Form::label('Telèfon', 'Telèfon (opcional)') }}
        {{ Form::text('telefon', Input::old('telefon'),array('class' => 'Registre_TextBox')) }}
    </div>
    <div class="checkbox" style="margin-left: 23px;">
        {{ Form::checkbox('chkRegistreCondicions', true) }}     
        Accepto les <a href="#" data-toggle="modal" data-target=".bs-example-modal-sm">condicions d'ús</a>

        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <p class='Registre_TitolCondicionsDus'>Condicions d'Ús</p>
                    <p class='Registre_ParagrafCondicionsDus'>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vehicula quis turpis lobortis molestie. Quisque pretium non justo at lobortis. In malesuada sem dolor, a ornare neque faucibus ut. Donec lacus arcu, tincidunt id tincidunt et, convallis eu libero. Vivamus arcu turpis, pellentesque id efficitur a, vestibulum quis eros. Suspendisse sed faucibus turpis, condimentum porttitor sapien. Quisque eget mi blandit, varius tellus ut, feugiat tellus. Sed vel finibus augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis a tortor ut ante faucibus malesuada. Morbi hendrerit interdum volutpat. Vivamus quis semper lectus. Nam velit ligula, tristique ac cursus et, dictum ut est. Nullam ut ex vel orci scelerisque placerat. Donec pellentesque, neque vitae egestas tempor, elit tortor condimentum dui, nec convallis odio est non nisl.
                    </p>
                    <p class='Registre_ParagrafCondicionsDus'>
                        Sed laoreet purus a posuere euismod. Curabitur mollis est non aliquam maximus. Donec a ultrices ligula. Vestibulum at massa lacus. Nulla iaculis felis erat, gravida aliquam justo interdum sit amet. Vestibulum ac mauris ligula. Vivamus quis sapien eget mauris iaculis fringilla. Mauris ut porta est. In vel leo ultrices, consequat dolor eget, tincidunt neque. Morbi imperdiet congue purus, id ultricies nunc fringilla ut. Morbi tristique ipsum eu fermentum congue. Donec sed quam eu ligula ultricies laoreet in non magna. Cras imperdiet scelerisque purus, in efficitur dolor pellentesque quis. Etiam vestibulum neque id nibh tincidunt imperdiet.
                    </p>       
                    <p class='Registre_ParagrafCondicionsDus'>
                        Fusce facilisis est non nibh volutpat vulputate. Duis dolor velit, finibus ut pellentesque eu, rutrum et nunc. In hac habitasse platea dictumst. Cras a ex varius ante egestas convallis non eget ex. Phasellus vestibulum est et volutpat imperdiet. Vivamus condimentum ullamcorper ante in interdum. Cras pellentesque, mauris id mattis tincidunt, arcu turpis porta velit, ut commodo libero mauris non est. Fusce ultrices, augue nec porta bibendum, lorem leo venenatis lorem, eu fringilla enim quam a diam. Duis non mauris id leo efficitur dictum eget a tortor. Suspendisse vehicula neque libero, a lacinia erat vehicula eget. Etiam elementum viverra dui nec dictum. Fusce ullamcorper ex non mauris convallis elementum.
                    </p>       
                    <p class='Registre_ParagrafCondicionsDus'>
                        Pellentesque porta sem et justo sodales iaculis. Donec vel imperdiet nunc. Sed sodales in odio in venenatis. Nunc lacinia nisi sit amet rutrum maximus. Pellentesque porttitor quis enim id fermentum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum suscipit libero ut sagittis blandit. Nullam at mattis nunc. Pellentesque bibendum tristique massa, vel egestas ligula blandit vel. Ut sed consectetur est, auctor ultrices ipsum. Nulla bibendum finibus turpis a commodo. Proin ut mattis lectus. Pellentesque non ipsum blandit, sagittis diam sit amet, tincidunt ligula. Quisque sagittis mi purus, nec accumsan ipsum fringilla id. Vestibulum porttitor neque et justo convallis aliquet.
                    </p>    
                    <p class='Registre_ParagrafCondicionsDus'>
                        Fusce mollis nisi vitae lacus feugiat aliquam. Nullam aliquet pulvinar tincidunt. Fusce fermentum, quam id ullamcorper ornare, magna risus consequat nisl, at volutpat leo tortor ut libero. Donec rutrum, risus at condimentum porta, dui turpis pharetra nulla, quis porttitor eros leo sit amet ex. Nullam tristique mauris quis tristique faucibus. Proin tempus tellus odio, sed varius felis gravida sit amet. Maecenas posuere venenatis ligula, sollicitudin lacinia enim elementum ac. In ac commodo sem. Phasellus malesuada vel lectus ac fermentum. Curabitur rutrum dignissim felis ac laoreet. Curabitur maximus nibh nec venenatis pellentesque. Pellentesque fermentum dui at nulla posuere ultrices. Mauris nec diam vitae nulla maximus pulvinar eget sed arcu. Ut nec sapien vitae mauris rutrum consectetur.
                    </p>    
                    <p class='Registre_ParagrafCondicionsDus'>
                        Etiam facilisis odio convallis, congue felis ac, consequat nulla. Donec massa metus, congue ut lacus vel, tincidunt bibendum erat. Integer ut eros lobortis, sodales eros eget, rutrum nibh. Proin faucibus interdum tortor, in elementum odio molestie et. Morbi vel mollis libero. In et volutpat eros. Ut aliquam, orci id elementum dapibus, ipsum augue elementum erat, sed dignissim enim augue eu odio.
                    </p>      
                    <p class='Registre_ParagrafCondicionsDus'>
                        Cras diam nunc, luctus id sagittis at, mollis sit amet lacus. Aenean eu pulvinar velit. Fusce bibendum pellentesque sem, sit amet convallis odio convallis sed. Quisque vestibulum molestie malesuada. Proin auctor sem vitae suscipit consectetur. Nullam nec ultricies turpis. Cras porta suscipit elit malesuada viverra. Duis dignissim tellus est, ut iaculis lorem blandit vitae. Praesent ullamcorper nisi quis dapibus ornare.
                    </p>     
                    <p class='Registre_ParagrafCondicionsDus'>
                        Suspendisse auctor iaculis enim, vitae congue felis convallis et. Aenean vel dapibus elit, at pharetra felis. Nulla ornare congue orci sed vestibulum. Aliquam eleifend venenatis consequat. Curabitur accumsan euismod mauris, id sollicitudin sem fringilla a. Duis pulvinar ultrices imperdiet. Nam dignissim tortor semper tortor laoreet accumsan. Integer finibus ultrices dui, et porta ipsum faucibus volutpat.
                    </p>  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tancar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{ Form::submit('Registra\'t!',array('class'=> 'Registre_button'))}}
    {{ Form::close() }}
</div>
@stop