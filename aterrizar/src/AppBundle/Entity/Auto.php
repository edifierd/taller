<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Auto
 *
 * @ORM\Table(name="auto")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AutoRepository")
 */
class Auto extends Servicio
{

    // /**
    //  * @var int
    //  *
    //  * @ORM\Column(name="id", type="integer")
    //  * @ORM\Id
    //  */
    // private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="float")
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="empresa", type="string", length=255)
     */
    private $empresa;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=255)
     */
    private $modelo;

    /**
     * @ORM\ManyToOne(targetEntity="Ubicacion", inversedBy="autos")
     * @ORM\JoinColumn(name="auto_id", referencedColumnName="id")
     */
    private $ubicacion;


    /**
     * Set empresa
     *
     * @param string $empresa
     *
     * @return Auto
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return string
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     *
     * @return Auto
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set precio
     *
     * @param float $precio
     *
     * @return Auto
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set ubicacion
     *
     * @param \AppBundle\Entity\Ubicacion $ubicacion
     *
     * @return Auto
     */
    public function setUbicacion(\AppBundle\Entity\Ubicacion $ubicacion = null)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return \AppBundle\Entity\Ubicacion
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Auto
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
