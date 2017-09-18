/**
 * Created by carlos.bruno on 18/09/2017.
 */

    $(document).ready( function () {
        preencherCombo();
    } );

    function preencherCombo(){
       var combo = $('#combo');
       combo.find('option').remove();
       $.ajax({
           url : 'function/pesquisas.php',
           type: 'post',
           dataType: 'json',
           data : {
                acao : 'L'
           },
           success : function (data) {
               combo.append( $('<option />').val( 0 ).text( "Selecione" ) );
               $.each( data, function (i, j ) {
                   combo.append( $('<option />').val( j.id ).text( j.title ) );
               } );
               combo.trigger('chosen:updated');

           }
       });
    }