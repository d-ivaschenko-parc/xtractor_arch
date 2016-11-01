<?php
/**
 * @author d.ivaschenko
 */

namespace Readers;


abstract class Reader
{

    /**
     * @return \Model[] $models
     */
    abstract public function read() : array;

}