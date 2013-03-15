<?php

namespace WSColissimo\WSColiPosteLetterService;

use WSColissimo\WSColiPosteLetterService\Request\LetterColissimoRequest;
use WSColissimo\WSColiPosteLetterService\Response\LetterColissimoResponse;

/**
 * ClientInterface for the WSColiPosteLetterService
 *
 * @author Nicolas Cabot <n.cabot@lexik.fr>
 */
interface ClientInterface
{
    /**
     * Ask for the generation of a colissimo letter
     *
     * @param LetterColissimoRequest $request
     *
     * @return LetterColissimoResponse
     */
    public function getLetterColissimo(LetterColissimoRequest $request);
}
