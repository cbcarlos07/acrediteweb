<?php

/**
 * Created by PhpStorm.
 * User: carlos.bruno
 * Date: 15/09/2017
 * Time: 12:11
 */
class usuario_controller
{
    public function recuperarEmpresa ($user){
        require_once '../dao/class.usuario_dao.php';
        $ud = new Usuario_DAO();
        $teste = $ud->recuperarEmpresa($user);
        return $teste;
    }

    public function recuperarSenha ($user){
        require_once '../dao/class.usuario_dao.php';
        $ud = new Usuario_DAO();
        $teste = $ud->recuperarSenha($user);
        return $teste;
    }
    public function verificarPapel ($login){
        require_once '../dao/class.usuario_dao.php';
        $ud = new Usuario_DAO();
        $teste = $ud->verificarPapel($login);
        return $teste;
    }

    public function verificarLogin($login, $senha){
        require_once '../dao/class.usuario_dao.php';
        $ud = new Usuario_DAO();
        $teste = $ud->verificarLogin($login, $senha);
        return $teste;
    }
}