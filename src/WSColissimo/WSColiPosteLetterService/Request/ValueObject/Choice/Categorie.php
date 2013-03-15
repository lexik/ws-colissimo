<?php

namespace WSColissimo\WSColiPosteLetterService\Request\ValueObject\Choice;

/**
 * Categorie
 *
 * @author Nicolas Cabot <n.cabot@lexik.fr>
 */
class Categorie
{
    const A1 = '1';
    const A2 = '2';
    const A3 = '3';
    const A4 = '4';
    const A5 = '5';
    const A6 = '6';

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
