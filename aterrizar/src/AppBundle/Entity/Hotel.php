<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hotel
 *
 * @ORM\Table(name="hotel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HotelRepository")
 */
class Hotel extends Servicio
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var int
     *
     * @ORM\Column(name="disponibilidad", type="integer")
     */
    private $disponibilidad;

    /**
     * @ORM\ManyToOne(targetEntity="Ubicacion", inversedBy="hoteles")
     * @ORM\JoinColumn(name="hotel_id", referencedColumnName="id")
     */
    private $ubicacion;


    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Hotel
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set disponibilidad
     *
     * @param integer $disponibilidad
     *
     * @return Hotel
     */
    public function setDisponibilidad($disponibilidad)
    {
        $this->disponibilidad = $disponibilidad;

        return $this;
    }

    /**
     * Get disponibilidad
     *
     * @return int
     */
    public function getDisponibilidad()
    {
        return $this->disponibilidad;
    }

    /**
     * Set precio
     *
     * @param float $precio
     *
     * @return Hotel
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
     * @return Hotel
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
     * @return Hotel
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
