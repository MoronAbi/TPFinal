<?php

namespace GaleriaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Novedades
 *
 * @ORM\Table(name="novedades")
 * @ORM\Entity(repositoryClass="GaleriaBundle\Repository\NovedadesRepository")
 */
class Novedades
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
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(name="usuario", referencedColumnName="id")
     */
    private $usuario;



    /**
     * @var string
     *
     * @ORM\Column(name="texto", type="string")
     */
    private $Texto;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string")
     */
    private $estado;


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
     * Set texto
     *
     * @param string $texto
     *
     * @return Novedades
     */
    public function setTexto($texto)
    {
        $this->Texto = $texto;

        return $this;
    }

    /**
     * Get texto
     *
     * @return string
     */
    public function getTexto()
    {
        return $this->Texto;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Novedades
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }
}

