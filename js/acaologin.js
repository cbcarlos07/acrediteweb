/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        var campologin = $('#usuario');

        campologin.on('blur', function () {
            getEmpresa();
        });


        function getEmpresa(  ) {

            var login = $('#usuario').val();
            $.ajax({
               url   : 'function/usuario.php',
               type  : 'post',
               dataType: 'json',
               data : {
                   acao  : 'E',
                   login : login
               },
                success  : function (data) {

                    $('#empresa').val( data.empresa );

                }
            });

        }

var mensagem = $('.mensagem');

$('#btn-login').on('click',function () {
    //alert('Click');
    jQuery('#login-form').submit(function(){
        //alert('Submit');
        //var dados = jQuery( this ).serialize();
        var usuario = document.getElementById("usuario").value;
        var senha = document.getElementById("senha").value;

        //var cracha = $('#cracha').value;
        //alert("Usuario: "+usuario+" Senha: "+senha);
        //console.log("Usuario: "+usuario+" Senha: "+senha);
        jQuery.ajax({
            type: "POST",
            url: "function/usuario.php",
            beforeSend: carregando,
            dataType : 'json',
            data: {
                'login' : usuario,
                'senha'   : senha,
                'acao'     : 'L'
            },
            success: function( data )
            {
                //var retorno = data.retorno;
                //alert(retorno);

                console.log("Data: "+data.retorno);
                if(data.retorno == 1){
                  //  alert('Redirect');
                    sucesso();
                }
                else if(data.retorno == 2){
                    erroRestricao();
                }
                else{
                    errosend();
                    $('input[name="senha"]').css("border-color","red").focus();
                    $('input[name="loginname"]').css("border-color","red").focus();
                }
            }
        });

        return false;
    });
});


    
    

function carregando(){
        var mensagem = $('.mensagem');
        //alert('Carregando: '+mensagem);
        mensagem.empty().html('<p class="alert alert-warning"><img src="../img/loading.gif" alt="Carregando..."> Verificando dados!</p>').fadeIn("fast");
        setTimeout(function (){
            
        },300);
        
  }

function errosend(){
        var mensagem = $('.mensagem');
        mensagem.empty().html('<p class="alert alert-danger"><strong>Opa!</strong> Por favor, verifique seu login e/ou sua senha</p>').fadeIn("fast");
}

function erroRestricao(){
    var mensagem = $('.mensagem');
    mensagem.empty().html('<p class="alert alert-danger"><strong>Restrito!</strong> Voc&ecirc; n&atilde;o tem permiss&atilde;o para acessar esse sistema </p>').fadeIn("fast");
}

function sucesso(msg){
        var mensagem = $('.mensagem');
        mensagem.empty().html('<p class="alert alert-success"><strong>OK.</strong> Estamos redirecionando <img src="../img/loading.gif" alt="Carregando..."></p>').fadeIn("fast");
        setTimeout(function (){
            location.href = "pesquisas.php"
        },1500);
        //window.setTimeout()
        //delay(2000);
}