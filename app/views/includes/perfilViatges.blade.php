@include('includes.blockRuta')
<script type="text/javascript">
    $(document).ready(function(){

        $('#sandbox-container .input-group.date').datepicker({
            format: "dd/mm/yyyy",
            startDate: "today",
            language: "es",
            multidate: false,
            todayHighlight: true
        });

        $('#abrirFiltro').click(function(){
        	$('#filtroPerfilVi').toggle();
        });
    });
</script>
<?php 
if(isset($_GET['DataAnada']) && isset($_GET['DataTornada'])){
	$data1=$_GET['DataAnada'];
	$data2=$_GET['DataTornada'];
}
else{
	$data1=date('d-m-Y');
	$data2=date('d-m-Y', strtotime($data1 . ' + 1 day'));
}

?>
<a href="#" id="abrirFiltro">Filtrar</a> | <a href="?nofiltrar">Eliminr Filtre</a> 
<div id="filtroPerfilVi" style="display:none">
	{{ Form::open(array('method'=>'GET', 'url' => '/perfil','id'=>'PublicarViatge_Form', 'style' => 'position:relative;')) }}
	<div id="anadaData" style="float:left; margin:0 18px 15px 0">
	{{ Form::label('andaData', 'Inici', array('style' => 'display: block;')) }}
	    <div id="sandbox-container" style="width:188px;display:inline-block;">
	        <div class="input-group date">
	            <input readonly name="DataAnada" type="text" class="form-control" style="cursor: inherit;" value="{{$data1}}"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
	        </div>
	    </div>
	    <div id="anadaHora" style="display:inline-block;">
	            <div class="input-group bootstrap-timepicker" style="width: 182px;">
	                <input id="inAnadaHora" name="inAnadaHora" type="text" class="form-control">
	                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
	            </div>
	     
	            <script type="text/javascript">
	                $('#inAnadaHora').timepicker();
	            </script>
	        </div>
	</div>
	<div id="tornadaData" style="float:left; margin:0 18px 15px 0">
	{{ Form::label('tornadaData', 'Fi', array('style' => 'display: block;')) }}
	    <div id="sandbox-container" style="width:188px;display:inline-block;">
	        <div class="input-group date">
	            <input readonly name="DataTornada" type="text" class="form-control" style="cursor: inherit;" value="{{$data2}}"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
	        </div>
	    </div>
	    <div id="tornadaHora" style="display:inline-block;">
	        <div class="input-group bootstrap-timepicker" style="width: 182px;">
	            <input id="inTornadaHora" name="inTornadaHora" type="text" class="form-control">
	            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
	        </div>
	 
	        <script type="text/javascript">
	            $('#inTornadaHora').timepicker();
	        </script>
	    </div>
	</div>
	<div id="estatViatge"style="float:left; margin:0 18px 15px 0">
		{{ Form::label('estatViatge', 'Estat del diatge', array('style' => 'display: block;')) }}
		<select name="estat" class="form-control">
			<option value="acceptat;creador">Acceptat i/o Creador</option>
			<option value="acceptat">Acceptat</option>
			<option value="creador">Creador</option>
			<option value="pendent">Pendent</option>
			<option value="denegat">Denegat</option>
		</select>
		
	</div>
	{{ Form::submit('Filtrar',array('class'=> 'Registre_button','id'=>'filtrar', 'style' => 'width: 150px;margin:17px;'))}}
	{{ Form::close() }}
</div>

<?php
$passatgers = Passatger::where('usuari_id', Auth::user()->id)->get();
//$viatgesJoin = DB::table('viatges')->where('viatges.usuari_id', Auth::user()->id)->join('passatgers', 'viatges.usuari_id', '=', 'passatgers.usuari_id')->orderBy('data')->paginate(20);
if(isset($_GET['DataAnada']) && isset($_GET['DataTornada'])){
	$date1 = $_GET['DataAnada'].' '.$_GET['inAnadaHora'];
	$date1 = str_replace('/', '-', $date1);
	$date1 = new DateTime($date1);
	//echo $date1->format('Y-m-d H:i:s');
	$date2 = $_GET['DataTornada'].' '.$_GET['inTornadaHora'];
	$date2 = str_replace('/', '-', $date2);
	$date2 = new DateTime($date2);
	//echo $date2->format('Y-m-d H:i:s');

	$estatPassVi = explode(';', $_GET['estat']);
	$viatgesJoin = DB::table('viatges')->where('passatgers.usuari_id', Auth::user()->id)
										->where('data', '>=', date('Y-m-d'))
										->whereBetween('data', array($date1, $date2))
										->whereIn('estat', $estatPassVi)
										->join('passatgers', 'viatges.id', '=', 'passatgers.viatge_id')->orderBy('data')->paginate(20);
}
else{
	$viatgesJoin = DB::table('viatges')->where('passatgers.usuari_id', Auth::user()->id)
										->where('data', '>=', date('Y-m-d'))
										->join('passatgers', 'viatges.id', '=', 'passatgers.viatge_id')
										->orderBy('data')->paginate(20);
}
echo "<div style='clear:both;'><b>Total:</b> ".$viatgesJoin->getTotal()."</div>";
echo "<div style='overflow:auto;height: 740px;position: relative;width: 583px;'>";
foreach ($viatgesJoin as $key => $viatges) {
	$estatPassatger = $viatges->estat;
	switch ($estatPassatger) {
		case 'acceptat':
			# code...
			$colorEstat = "rgb(228, 247, 230)";
			break;
		case 'pendent':
			# code...
			$colorEstat = "#FFF0AD";
			break;
		case 'denegat':
			# code...
			$colorEstat = "rgb(247, 228, 228)";
			break;
		case 'creador':
			# code...
			$colorEstat = "rgb(228, 247, 230)";
			break;
		default:
			# code...
			$colorEstat = "#FFF0AD";
			break;
	}
    //$viatges = Viatge::where('id', $val->viatge_id)->where('data', '>=', date('d-m-Y'))->orderBy('id', 'desc')->get(); 
    $userInfo = Usuari::where('id', $viatges->usuari_id)->get();
    $fotoUser = $userInfo[0]->foto;
    $ruta = Ruta::where('id', $viatges->ruta_id)->get();
    $ruta1 = new blockRuta($viatges->viatge_id, $viatges->data, $ruta[0]->inici_ruta, $ruta[0]->fi_ruta, $viatges->preu, $viatges->numSeientRestant, $viatges->permissos, $fotoUser);
    echo "<div style='width: 550px;background-color: $colorEstat; margin-bottom:10px;'>";
    echo $ruta1->mostrarMapa();
    echo "<span style='text-transform: capitalize;margin: 1px auto;text-align: center;display: block;'>".$estatPassatger."</spam>";
    echo '</div>';
}
echo "</div>";
if (isset($_GET['DataAnada'])) {
	# code...

	echo $viatgesJoin->appends(['DataAnada' => $_GET['DataAnada'], 'inAnadaHora' => $_GET['inAnadaHora'], 'DataTornada' => $_GET['DataTornada'], 'inTornadaHora' => $_GET['inTornadaHora'], 'estat' => $_GET['estat']])->links();
}
else{
	echo $viatgesJoin->links();
}
?>