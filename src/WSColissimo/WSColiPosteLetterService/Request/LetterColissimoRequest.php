<?php

namespace WSColissimo\WSColiPosteLetterService\Request;

use WSColissimo\WSColiPosteLetterService\Request\ValueObject\Letter;

/**
 * LetterColissimoRequest
 *
 * @author Nicolas Cabot <n.cabot@lexik.fr>
 */
class LetterColissimoRequest
{
    /**
     * @var Letter
     */
    protected $letter;

    /**
     * Contructor
     *
     * @param Letter $letter
     */
    public function __construct(Letter $letter = null)
    {
        $this->letter = $letter;
    }

    /**
     * @return Letter
     */
    public function getLetter()
    {
        return $this->letter;
    }

    /**
     * @param Letter $letter
     */
    public function setLetter(Letter $letter)
    {
        $this->letter = $letter;
    }

    /**
     * Getter
     *
     * @param string $name
     */
    public function __get($name)
    {
        $method = 'get' . ucfirst($name);

        if (method_exists($this, $method)) {
            return $this->$method();
        }
    }
}
