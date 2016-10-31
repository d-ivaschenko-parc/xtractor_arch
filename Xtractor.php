<?php

/**
 * @author d.ivaschenko
 */
class Xtractor
{

    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function xtract()
    {
        $this->model['attributes']['participants'] = (new Participants())->extract($this->model->text);

        return $this->model;
    }

}