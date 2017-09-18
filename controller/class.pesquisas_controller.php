<?php

/**
 * Created by PhpStorm.
 * User: carlos.bruno
 * Date: 18/09/2017
 * Time: 11:02
 */
class pesquisas_controller
{

    public function getListPesquias(){
        require_once "../dao/class.pesquisas_dao.php";
        $dao = new pesquisas_dao();
        $retorno = $dao->getListPesquias();
        return $retorno;
    }

}