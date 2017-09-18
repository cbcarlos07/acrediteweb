<?php

/**
 * Created by PhpStorm.
 * User: carlos.bruno
 * Date: 18/09/2017
 * Time: 10:54
 */
class pesquisasList
{
  private $_pesquisas = array();
    private $_pesquisasCount = 0;
    public function __construct() {
    }
    public function getPesquisasCount() {
        return $this->_pesquisasCount;
    }
    private function setPesquisasCount($newCount) {
        $this->_pesquisasCount = $newCount;
    }
    public function getPesquisas($_pesquisasNumberToGet) {
        if ( (is_numeric($_pesquisasNumberToGet)) &&
            ($_pesquisasNumberToGet <= $this->getPesquisasCount())) {
            return $this->_pesquisas[$_pesquisasNumberToGet];
        } else {
            return NULL;
        }
    }
    public function addPesquisas(Pesquisas $_pesquisas_in) {
        $this->setPesquisasCount($this->getPesquisasCount() + 1);
        $this->_pesquisas[$this->getPesquisasCount()] = $_pesquisas_in;
        return $this->getPesquisasCount();
    }
    public function removePesquisas(Pesquisas $_pesquisas_in) {
        $counter = 0;
        while (++$counter <= $this->getPesquisasCount()) {
            if ($_pesquisas_in->getAuthorAndTitle() ==
                $this->_pesquisas[$counter]->getAuthorAndTitle())
            {
                for ($x = $counter; $x < $this->getPesquisasCount(); $x++) {
                    $this->_pesquisas[$x] = $this->_pesquisas[$x + 1];
                }
                $this->setPesquisasCount($this->getPesquisasCount() - 1);
            }
        }
        return $this->getPesquisasCount();
    }
}