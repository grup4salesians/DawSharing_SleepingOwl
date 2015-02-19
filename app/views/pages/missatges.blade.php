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
            <i onclick="Borrar()" class='fa fa-trash fa-3x'></i>
        </div>

        <?php $missatges = Correu::where('destinatari_id', Auth::user()->id)->orderBy('id', 'desc')->get(); ?>
        @foreach($missatges as $key => $missat)
        <?php
        $missatge = new email($missat->id, '15/02/2015', $missat->usuari_id, $missat->assumpte, $missat->contingut, $missat->vist);
        ?>
        {{ $missatge->mostrarEmail() }}
        @endforeach


    </div>
</div>

<script>
    $(".BandejaMails_Mail").click(function () {
        if (event.target.nodeName !== "INPUT") {
            if ($(this).find(".BandejaMails_DadesSenceres").is(":hidden")) {
                $(this).find(".BandejaMails_Dades").hide();
                $(this).find(".BandejaMails_DadesSenceres").show();
                $(this).height("auto");
                var Item = $(this);
                if ($(this).hasClass("BandejaMails_PonerTextoNegrita")) {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo Config::get('constants.BaseUrl') ?>app/views/others/UpdateEstadoMail.php',
                        data: {vist: "1", id: $(this).attr("data-ID")},
                        success: function (data) {
                            Item.removeClass("BandejaMails_PonerTextoNegrita");
                            //console.log("Success:" + data);       
                        },
                        error: function (data) {
                            //console.log("Error: " + data);
                        }
                    });
                }
            }
            else {
                $(this).find(".BandejaMails_Dades").show();
                $(this).find(".BandejaMails_DadesSenceres").hide();
                $(this).height("51px");
            }
        }
    });

    function Borrar() {
        var listID = "";

        $('input[type=checkbox]').each(function () {//Bucle por cada checkbox
            if (this.checked) { //Si el checkbox está chekeado
                listID = listID + " id= " + $(this).parent().parent().attr("data-ID")+" or";
                $(this).parent().parent().hide("slow");
            }
        });
        
        listID = listID.substring(0, listID.length - 2);    //Contiene id = X or id = Y

        $.ajax({
            type: 'POST',
            url: '<?php echo Config::get('constants.BaseUrl')   ?>app/views/others/BorrarMail.php',
            data: {where: listID},
            success: function (data) {
                //console.log("Success:" + data);       
            },
            error: function (data) {
                //console.log("Error: " + data);
                alert(data);
            }
        });


    }

</script>
@stop