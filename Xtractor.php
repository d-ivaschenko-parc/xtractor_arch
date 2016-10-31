<?php

/**
 * @author d.ivaschenko
 */
class Xtractor
{

    protected $models;

    public function __construct($models = [])
    {
        $this->models = $models;
    }

    public function xtract()
    {
        foreach ($this->models as &$model) {
            $model['attributes']['participants'] = (new Participants())->extract($model->text);
        }

        return $this->models;
    }

}