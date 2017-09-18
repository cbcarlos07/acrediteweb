<?php
/**
 * Created by PhpStorm.
 * User: carlos.bruno
 * Date: 18/09/2017
 * Time: 11:07
 */
   $acao = $_POST['acao'];

   switch ( $acao ){
       case 'L':
           getListaPesquias();
           break;
   }

   function getListaPesquias(){
       require_once "../services/class.pesquisasListIterator.php";
       require_once "../controller/class.pesquisas_controller.php";

       $objController = new pesquisas_controller();
       $lista = $objController->getListPesquias();
       $listIterator = new pesquisasListIterator( $lista );

       $array = [];
       while ( $listIterator->hasNextPesquisas() ){

           $obj = $listIterator->getNextPesquisas();
           $array[] = array(
               "id" => $obj->getId(),
                "title" => $obj->getTitle()
           );

       }

       echo json_encode( $array );

   }