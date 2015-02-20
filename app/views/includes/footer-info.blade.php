 <div style="width:800px;margin:auto;height: 160px; ">
        
    
         <div class="hotel-info" style="width: 250px;margin:auto;">
            <h4>Sobre DawSharing </h4>   
            <p>DawSharing és una plataforma per compartir vehicles amb les demes persones del món.Registra't, publica o busca el teu viatge i estalvia diners!</p>
  <a style="font-weight:bold;font-size:20px" href="../public/contactar">Contacta amb nosaltres!</a>       
         </div>
     

            <div class="join" style="width: 250px;">
                <h4>Apunta't a DawSharing!</h4>
                <p>Apunta't en aquesta experiencia DawSharing, comparteix o sigues company d'un conductor en el viatge que tú vulguis! Estalvia diners en gasolina! Sel·lecciona les preferencies del viatge i gaudeix del trajecte!. </p>
                <p>És totalment gratuit!</p>
               
            </div>
    
  <?php if (Auth::check()){ ?>
        <div class="member" style="width: 250px;color:whitesmoke;display:none">
            <?php }else{?>
               <div class="member" style="width: 250px;color:whitesmoke;"> 
           <?php } ?>
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
