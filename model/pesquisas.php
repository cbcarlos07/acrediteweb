<?php

/**
 * Created by PhpStorm.
 * User: carlos.bruno
 * Date: 18/09/2017
 * Time: 09:10
 */
class pesquisas
{
    private $id;
    private $title;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return pesquisas
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return pesquisas
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

}