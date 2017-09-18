<?php

/**
 * Created by PhpStorm.
 * User: carlos.bruno
 * Date: 15/09/2017
 * Time: 12:01
 */
class usuario_dao
{
    public function recuperarEmpresa ($user){
        require_once  'class.connection_factory.php';
        $conn = new connection_factory();
        $conexao = $conn->getConnection();
        $i = "";

        $sql_text = "SELECT  
                        E.DS_MULTI_EMPRESA EMPRESA  
                      FROM   
                      DBASGU.USUARIOS                  U  
                      ,DBAMV.USUARIO_MULTI_EMPRESA     M  
                      ,DBAMV.MULTI_EMPRESAS            E  
                      WHERE  
                           U.CD_USUARIO = :NAME_USER  
                      AND  U.CD_USUARIO = M.CD_ID_USUARIO ";
        try {
            $stmt = oci_parse($conexao, $sql_text);
            //echo "Variavel use $user";
            oci_bind_by_name($stmt, ":NAME_USER", $user);
            oci_execute($stmt);
            if ($row = oci_fetch_array($stmt, OCI_ASSOC)){
                $i = $row['EMPRESA'];
            }
            $conn->closeConnection($conexao);
        } catch (PDOException $ex) {
            echo " Erro: ".$ex->getMessage();
        }
        return $i;
    }


    public function recuperarSenha ($user)
    {
        require_once 'class.connection_factory.php';
        $conn = new connection_factory();
        $conexao = $conn->getConnection();
        $i = "NAO";
        $sql_text = "select dbaadv.senhausuariomv(:USERNAME)  SENHA FROM DUAL";
        try {
            $stmt = oci_parse($conexao, $sql_text);
            oci_bind_by_name($stmt, ":USERNAME", $user);
            oci_execute($stmt);
            if ($row = oci_fetch_array($stmt, OCI_ASSOC)) {
                $i = $row['SENHA'];
            }
            $conn->closeConnection($conexao);
        } catch (PDOException $ex) {
            echo " Erro: " . $ex->getMessage();
        }
        return $i;
    }

    public function verificarPapel ($login){
        require_once 'class.connection_factory.php';
        //    System.out.println("DAO");
        $teste = false;
        $conn = new connection_factory();
        $conexao = $conn->getConnection();
        try {
            $sql_text = "SELECT * FROM DBAMV.V_TI_PAPEL V WHERE V.USUARIO  = :LOGIN";


            $stmt =  oci_parse($conexao, $sql_text);
            oci_bind_by_name($stmt, ":LOGIN", $login);
            oci_execute($stmt);
            if($row = oci_fetch_array($stmt, OCI_ASSOC)){

                $teste = true;

            }
            $conn->closeConnection($conexao);
        } catch (PDOException $ex) {
            echo " Erro: ".$ex->getMessage();
        }

        return $teste;
    }

    public function verificarLogin($login, $senha){
        $retorno = 0;
        $usuario_banco = "";
        $senha_banco = "";
        require_once 'class.connection_factory.php';
      //  require  ('./lib/nusoap.php');
        $conn = new connection_factory();
        $conexao = $conn->getConnection();
        $sql = "SELECT DBAADV.SENHAUSUARIOMV(:usuario) CD_SENHA FROM DUAL ";
        try {
            $stmt =  oci_parse($conexao, $sql);
            oci_bind_by_name($stmt, ":usuario", $login, -1);
            oci_execute($stmt);
            if($row = oci_fetch_array($stmt, OCI_ASSOC)){


                $senha_banco   = $row['CD_SENHA'];

            }
            //echo "Usuario Form: ".$login."\n";
            //echo "Senha Form: ".$senha;
            $conn->closeConnection($conexao);
           // echo "Senha banco: ".$senha_banco. " senha: ".$senha;
            if( $senha == $senha_banco ){
                $retorno = 1;
            }

        } catch (PDOException $ex) {
            echo " Erro: ".$ex->getMessage();
        }

        return $retorno;
    }
}