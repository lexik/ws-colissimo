<?php

namespace WSColissimo\WSColiPosteLetterService\Request\ValueObject\Choice;

/**
 * AlertType
 *
 * @author Nicolas Cabot <n.cabot@lexik.fr>
 */
class AlertType
{
    const NONE = 'none';
    const SMS  = 'SMS';
    const MAIL = 'Mail';
    const ALL  = 'all';

    /**
     * Return an array of the class constants
     *
     * @return array
     */
    public static function getChoices()
    {
        $choices = array();

        $reflect = new \ReflectionClass(__CLASS__);
        $constants = array_keys($reflect->getConstants());

        foreach ($constants as $constant) {
            $choices[] = $reflect->getConstant($constant);
        }

        return $choices;
    }
}
