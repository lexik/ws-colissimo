<?php

namespace WSColissimo\WSColiPosteLetterService\Request\ValueObject;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

/**
 * Article
 *
 * @author Nicolas Cabot <n.cabot@lexik.fr>
 */
class Article
{
    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $quantite;

    /**
     * @var float
     */
    protected $poids;

    /**
     * @var float
     */
    protected $valeur;

    /**
     * @var string
     */
    protected $numTarifaire;

    /**
     * @var string
     */
    protected $paysOrigine;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param string $quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    /**
     * @return the float
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * @param string $poids
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;
    }

    /**
     * @return the float
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * @param string $valeur
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;
    }

    /**
     * @return string
     */
    public function getNumTarifaire()
    {
        return $this->numTarifaire;
    }

    /**
     * @param string $numTarifaire
     */
    public function setNumTarifaire($numTarifaire)
    {
        $this->numTarifaire = $numTarifaire;
    }

    /**
     * @return string
     */
    public function getPaysOrigine()
    {
        return $this->paysOrigine;
    }

    /**
     * @param string $paysOrigine
     */
    public function setPaysOrigine($paysOrigine)
    {
        $this->paysOrigine = $paysOrigine;
    }

    /**
     * Add validation rules
     *
     * @param ClassMetadata $metadata
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('description', new Assert\NotBlank());
        $metadata->addPropertyConstraint('description', new Assert\Regex(array('pattern' => '/^[ a-zA-Z0-9]{1,64}$/')));

        $metadata->addPropertyConstraint('quantite', new Assert\NotBlank());
        $metadata->addPropertyConstraint('quantite', new Assert\Regex(array('pattern' => '/^[0-9]*$/')));

        $metadata->addPropertyConstraint('poids', new Assert\NotBlank());
        $metadata->addPropertyConstraint('poids', new Assert\Type(array('type' => 'float')));
        $metadata->addPropertyConstraint('poids', new Assert\Range(array('min' => 0, 'max' => 30)));

        $metadata->addPropertyConstraint('valeur', new Assert\NotBlank());
        $metadata->addPropertyConstraint('valeur', new Assert\Type(array('type' => 'float')));
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
