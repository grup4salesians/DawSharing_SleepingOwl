<div class="b_room">
    <div class="booking_room">
        @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }}<br>        
            @endforeach
        </div>
        @endif
        <div class="reservation">
            <ul>				
                <li  class="span1_of_1 left">

                    <h5>Origen</h5>
                    <div class="book_date">

                        {{ Form::open(array('url' => '/buscarruta')) }}
                        <!--	<input class="date" id="datepicker" type="text" value="2/08/2013" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '2/08/2013';}">
                        -->
                        <input id="searchTextField" type="text" name="searchTextField">

                    </div>					
                </li>
                <li  class="span1_of_1 left">
                    <h5>Destinació</h5>
                    <div class="book_date">

        <!--<input class="date" id="datepicker1" type="text" value="22/08/2013" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '22/08/2013';}">
                        -->
                        <input  id="searchTextFieldFin" type="text" name="searchTextFieldFin">

                    </div>		
                </li>
                <li class="span1_of_3">
                    <div class="date_btn">
                        {{ Form::submit('Buscar',array('class'=> 'Registre_button','name'=>'Buscar'))}}
                        {{ Form::close() }}
                    </div>
                </li>
                <li class="span1_of_3">
                    {{ Form::open(array('url' => '/publicarViatge')) }}
                    <div class="date_btn">
                        <input type="text" style="display:none;" id="PublicarViatgeOrigen" name="PublicarViatgeOrigen">
                        <input type="text" style="display:none;" id="PublicarViatgeDesti" name="PublicarViatgeDesti">

                        {{ Form::submit('Publicar',array('class'=> 'Registre_button','name'=>'Publicar','onclick'=>'CopiarValoresInput()'))}}
                        {{ Form::close() }}
                    </div>
                </li>
                <div class="clearfix"></div>
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<script>
    function CopiarValoresInput() {
        document.getElementById("PublicarViatgeOrigen").value = document.getElementById("searchTextField").value;
        document.getElementById("PublicarViatgeDesti").value = document.getElementById("searchTextFieldFin").value;
    }
</script>