<?php

/**
 * Created by PhpStorm.
 * User: carlos.bruno
 * Date: 18/09/2017
 * Time: 10:55
 */
class pesquisasListIterator
{
    protected $pesquisasList;
    protected $currentPesquisas = 0;

    public function __construct(PesquisasList $pesquisasList_in) {
        $this->pesquisasList = $pesquisasList_in;
    }
    public function getCurrentPesquisas() {
        if (($this->currentPesquisas > 0) &&
            ($this->pesquisasList->getPesquisasCount() >= $this->currentPesquisas)) {
            return $this->pesquisasList->getPesquisas($this->currentPesquisas);
        }
    }
    public function getNextPesquisas() {
        if ($this->hasNextPesquisas()) {
            return $this->pesquisasList->getPesquisas(++$this->currentPesquisas);
        } else {
            return NULL;
        }
    }
    public function hasNextPesquisas() {
        if ($this->pesquisasList->getPesquisasCount() > $this->currentPesquisas) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}