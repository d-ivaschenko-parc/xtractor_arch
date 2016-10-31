<?php
/**
 * @author d.ivaschenko
 */


class FullName extends Extractor
{

    /**
     * @param string $text
     * @return array
     */
    public function extract(string $text)
    {
        return $this->getFullNames($text);
    }

    /**
     * @return string
     */
    protected function getFullNames($text)
    {
        $result = [];
        if (preg_match_all('(?<fullname>А-Я[а-я]+\s+[А-Я]{1}\.\s+[А-Я]{1}\.)', $text, $matches, PREG_SET_ORDER)) {

            foreach ($matches as $match) {
                $result[] = $match['fullname'];
            }
            
        }

        return $result;
    }

}