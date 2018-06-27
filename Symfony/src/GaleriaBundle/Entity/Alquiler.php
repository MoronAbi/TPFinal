<?php

namespace GaleriaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alquiler
 *
 * @ORM\Table(name="alquiler")
 * @ORM\Entity(repositoryClass="GaleriaBundle\Repository\AlquilerRepository")
 */
class Alquiler
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
     * @ORM\ManyToOne(targetEntity="Propietario")
     * @ORM\JoinColumn(name="propietario", referencedColumnName="id")
     */
    private $propietario;

    /**
     * @ORM\ManyToOne(targetEntity="Local")
     * @ORM\JoinColumn(name="local", referencedColumnName="id")
     */
    private $local;
    

    /**
     * @var int
     *
     * @ORM\Column(name="plazomes", type="integer")
     */
    private $plazomes;

    /**
     * @var int
     *
     * @ORM\Column(name="costoalquiler", type="integer")
     */
    private $costoalquiler;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alquiler", type="date")
     */
    private $fechaAlquiler;


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
     * Set plazomes
     *
     * @param integer $plazomes
     *
     * @return Alquiler
     */
    public function setPlazomes($plazomes)
    {
        $this->plazomes = $plazomes;

        return $this;
    }

    /**
     * Get plazomes
     *
     * @return int
     */
    public function getPlazomes()
    {
        return $this->plazomes;
    }

    /**
     * Set costoalquiler
     *
     * @param integer $costoalquiler
     *
     * @return Alquiler
     */
    public function setCostoalquiler($costoalquiler)
    {
        $this->costoalquiler = $costoalquiler;

        return $this;
    }

    /**
     * Get costoalquiler
     *
     * @return int
     */
    public function getCostoalquiler()
    {
        return $this->costoalquiler;
    }

    /**
     * Set fechaAlquiler
     *
     * @param \DateTime $fechaAlquiler
     *
     * @return Alquiler
     */
    public function setFechaAlquiler($fechaAlquiler)
    {
        $this->fechaAlquiler = $fechaAlquiler;

        return $this;
    }

    /**
     * Get fechaAlquiler
     *
     * @return \DateTime
     */
    public function getFechaAlquiler()
    {
        return $this->fechaAlquiler;
    }
}

