<?php

/**
 * @author d.ivaschenko
 */
class Xtractor
{
    /** @var Model[]  */
    protected $models;

    /**
     * Xtractor constructor.
     * @param array $models
     */
    public function __construct(array $models = [])
    {
        $this->models = $models;
    }

    /**
     * @return array
     */
    public function xtract() : array
    {
        foreach ($this->models as &$model) {
            $model->attributes['participants'] = (new Participants())->extract($model->text);
        }

        return $this->models;
    }

}