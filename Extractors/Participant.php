<?php
/**
 * @author d.ivaschenko
 */


//"Суд пригласил в зал истца Сидорова А.Е., который заявил что отвечики Иванова А. И. и Петров А. Е. избили его на улице"
class Participants extends Extractor
{
    const PARTICIPANTS_TYPES = [
        'Истец',
        'Ответчик',
    ];

    /**
     * @param string $text
     * @return array
     */
    public function extract(string $text) : array
    {
        return $this->getParticipants($text);
    }

    /**
     * @param string $text
     * @return array
     */
    private function getParticipants(string $text) : array
    {
        $participants = [];
        if (preg_match_all($this->getRegexp(), $text, $matches, PREG_SET_ORDER)) {

            $participant = [];
            /** @var array $matches */
            foreach ($matches as $match) {
                $participant['type'] = ['type' => $match['participantType']];
                $participant['names'] = (new FullName)->extract($match['names']);
            }

            if (!empty($participant)) {
                $participants[] = $participant;
            }
        }

        return $participants;
    }

    private function getRegexp() : string
    {
        $participantsOr = '('.implode('|', static::PARTICIPANTS_TYPES).')';
        return '/(?<participantType>'.$participantsOr.')(?<names>.+?)($|'.$participantsOr.')/uis';
    }

}