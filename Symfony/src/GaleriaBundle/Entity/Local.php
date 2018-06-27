<?php

namespace GaleriaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Local
 *
 * @ORM\Table(name="local")
 * @ORM\Entity(repositoryClass="GaleriaBundle\Repository\LocalRepository")
 */
class Local
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="superficie", type="integer")
     */
    private $superficie;

    /**
     * @var bool
     *
     * @ORM\Column(name="habilitado", type="boolean")
     */
    private $habilitado;

    /**
     * @var int
     *
     * @ORM\Column(name="costomes", type="integer")
     */
    private $costomes;

    /**
     * @var string
     *
     * @ORM\Column(name="pathimagen", type="string", length=128)
     */
    private $pathimagen;

    /**
     * @var bool
     *
     * @ORM\Column(name="alquilado", type="boolean")
     */
    private $alquilado;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set superficie
     *
     * @param integer $superficie
     *
     * @return Local
     */
    public function setSuperficie($superficie)
    {
        $this->superficie = $superficie;

        return $this;
    }

    /**
     * Get superficie
     *
     * @return int
     */
    public function getSuperficie()
    {
        return $this->superficie;
    }

    /**
     * Set habilitado
     *
     * @param boolean $habilitado
     *
     * @return Local
     */
    public function setHabilitado($habilitado)
    {
        $this->habilitado = $habilitado;

        return $this;
    }

    /**
     * Get habilitado
     *
     * @return bool
     */
    public function getHabilitado()
    {
        return $this->habilitado;
    }

    /**
     * Set costomes
     *
     * @param integer $costomes
     *
     * @return Local
     */
    public function setCostomes($costomes)
    {
        $this->costomes = $costomes;

        return $this;
    }

    /**
     * Get costomes
     *
     * @return int
     */
    public function getCostomes()
    {
        return $this->costomes;
    }

    /**
     * Set pathimagen
     *
     * @param string $pathimagen
     *
     * @return Local
     */
    public function setPathimagen($pathimagen)
    {
        $this->pathimagen = $pathimagen;

        return $this;
    }

    /**
     * Get pathimagen
     *
     * @return string
     */
    public function getPathimagen()
    {
        return $this->pathimagen;
    }

    /**
     * Set alquilado
     *
     * @param boolean $alquilado
     *
     * @return Local
     */
    public function setAlquilado($alquilado)
    {
        $this->alquilado = $alquilado;

        return $this;
    }

    /**
     * Get alquilado
     *
     * @return bool
     */
    public function getAlquilado()
    {
        return $this->alquilado;
    }
}

