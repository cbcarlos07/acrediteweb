<?php

/**
 * Created by PhpStorm.
 * User: carlos.bruno
 * Date: 15/09/2017
 * Time: 12:00
 */
class connection_factory
{
    private $ora_user = "usuario";
    private $ora_senha = "login";
    private $ora_bd = "(DESCRIPTION=
                        (ADDRESS_LIST=
                        (ADDRESS=(PROTOCOL=TCP)(HOST=ipdoserver)(PORT=1521))
                        )
                        (CONNECT_DATA=
                        (SERVICE_NAME=servico)
                        )
                        )";
    public  function  getConnection(){
        putenv("NLS_LANG=PORTUGUESE_BRAZIL.AL32UTF8") or die("Falha ao inserir a variavel de ambiente");
        $ora_conexao = oci_connect($this->ora_user, $this->ora_senha, $this->ora_bd);
        return $ora_conexao;

    }

    public function closeConnection($connection){
        $ora_conexao = oci_close($connection);

    }


}