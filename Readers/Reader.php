<?php
/**
 * @author d.ivaschenko
 */

namespace Readers;


abstract class Reader
{

    /**
     * @return \Model[] $model
     */
    abstract public function read();

}