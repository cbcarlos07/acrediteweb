<?php
/**
 * Created by PhpStorm.
 * User: carlos.bruno
 * Date: 15/09/2017
 * Time: 12:09
 */

        $acao = $_POST['acao'];

        $login = "";
        $senha = "";

         if( isset( $_POST['login'] ) )
             $login = strtoupper( $_POST['login'] );

         if( isset( $_POST['senha'] ) )
             $senha =  strtoupper( $_POST['senha'] ) ;

         switch ($acao){
             case 'E':
                 getEmpresa( $login );
                 break;
             case 'L':
                 getLogin( $login, $senha );
                 break;
         }


         function getEmpresa( $login ){
             require_once "../controller/class.usuario_controller.php";

             $uc =  new usuario_controller();
             $empresa = $uc->recuperarEmpresa( $login );

             echo json_encode( array("empresa" => $empresa) );
         }

         function getLogin( $login, $senha ){
             require_once "../controller/class.usuario_controller.php";

             $uc = new usuario_controller();
             $permissao = $uc->verificarPapel( $login );
             //echo "Permissao: ".$permissao;
             if( $permissao > 0 ){

                 $retorno = $uc->verificarLogin( $login, $senha );
                 //echo "Retorno: ".$retorno;
                 if( $retorno > 0 ){

                     echo json_encode( array( "retorno" => $retorno ) );

                 }


             }

         }