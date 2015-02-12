<div class="container">
         <div class="hotel-info">
            <h4>Sobre DawSharing </h4>
            <p>DawSharing és una plataforma per compartir vehicles amb les demes persones del món.Registra't, publica o busca el teu viatge i estalvia diners!</p>

        </div>

            <div class="join">
                <h4>Apunta't a DawSharing!</h4>
                <p>Apunta't en aquesta experiencia DawSharing, comparteix o sigues company d'un conductor en el viatge que tú vulguis! Estalvia diners en gasolina! Sel·lecciona les preferencies del viatge i gaudeix del trajecte!. </p>
                <p>És totalment gratuit!</p>
            </div>
        <div class="member" style="margin-top:-130px; max-width: 200px;">
            <h4>Inicia Sessió</h4>
            
             {{ Form::open(array('url' => '/login')) }}

            {{ Form::label('correu', 'Correu') }}
            {{ Form::text('correu', Input::old('correu')) }}


            {{ Form::label('contraseña', 'Contraseña') }}
            {{ Form::password('password'); }}

        {{ Form::submit('Enviar')}}
        {{ Form::close() }}
        
        
            
        </div>


</div>
<h6>Copyright DawSharing Grup 4 Salesians Sarrià S2Q - 2015</h6>	  
