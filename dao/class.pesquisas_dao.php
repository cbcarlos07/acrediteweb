<?php

/**
 * Created by PhpStorm.
 * User: carlos.bruno
 * Date: 18/09/2017
 * Time: 10:00
 */
class pesquisas_dao
{
  private $conn;
  public function getListPesquias(){
      require_once "class.connection_factorypostgres.php";
      require_once "../model/pesquisas.php";
      require_once "../services/class.pesquisasList.php";

      $objList = new pesquisasList();


      try{
          $conn = new PDO( "pgsql:dbname=pocketham; user=postgres; password=pocketham2017; host=10.51.100.7; port=5432" );
          $stmt = $conn->query( 'SELECT * FROM posts WHERE is_visible = true' );
         // $sql = "SELECT * FROM posts WHERE is_visible = true";
        //  $stmt = $this->conn->prepare( $sql );
        //  $stmt->execute();

          while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ){

                    $obj = new pesquisas();
                    $obj->setId( $row['id'] );
                    $obj->setTitle( $row['title'] );
                    $objList->addPesquisas( $obj );

          }
           $this->conn =  null;

      }catch ( PDOException $exception ){
          echo "Erro: ".$exception->getMessage();
      }

      return $objList;

  }
}