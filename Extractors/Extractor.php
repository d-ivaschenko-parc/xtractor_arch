<?php
/**
 * @author d.ivaschenko
 */


abstract class Extractor
{
    /**
     * @param string $text
     * @return mixed
     */
    abstract public function extract(string $text) : array;
}