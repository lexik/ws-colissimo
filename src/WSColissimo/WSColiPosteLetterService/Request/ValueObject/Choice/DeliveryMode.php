<?php

namespace WSColissimo\WSColiPosteLetterService\Request\ValueObject\Choice;

/**
 * DeliveryMode
 *
 * @author Nicolas Cabot <n.cabot@lexik.fr>
 */
class DeliveryMode
{
    const DOM = 'DOM';
    const RDV = 'RDV';
    const BPR = 'BPR';
    const ACP = 'ACP';
    const CDI = 'CDI';
    const A2P = 'A2P';
    const MRL = 'MRL';
    const CIT = 'CIT';
    const DOS = 'DOS';

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
