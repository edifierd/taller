<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vuelo
 *
 * @ORM\Table(name="vuelo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VueloRepository")
 */
class Vuelo extends Servicio
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
     * @ORM\Column(name="aerolinea", type="string", length=255)
     */
    private $aerolinea;

    /**
     * @var int
     *
     * @ORM\Column(name="disponible", type="integer")
     */
    private $disponible;

    /**
     * @ORM\ManyToOne(targetEntity="Ubicacion", inversedBy="vuelos_desde")
     * @ORM\JoinColumn(name="vuelo_origen_id", referencedColumnName="id")
     */
    private $ubicacion_origen;

    /**
     * @ORM\ManyToOne(targetEntity="Ubicacion", inversedBy="vuelos_hasta")
     * @ORM\JoinColumn(name="vuelo_destino_id", referencedColumnName="id")
     */
    private $ubicacion_destino;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetimetz")
     */
    private $fecha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_llegada", type="datetimetz")
     */
    private $fecha_llegada;

    /**
     * Set precio
     *
     * @param float $precio
     *
     * @return Vuelo
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
     * Set aerolinea
     *
     * @param string $aerolinea
     *
     * @return Vuelo
     */
    public function setAerolinea($aerolinea)
    {
        $this->aerolinea = $aerolinea;

        return $this;
    }

    /**
     * Get aerolinea
     *
     * @return string
     */
    public function getAerolinea()
    {
        return $this->aerolinea;
    }

    /**
     * Set disponible
     *
     * @param integer $disponible
     *
     * @return Vuelo
     */
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;

        return $this;
    }

    /**
     * Get disponible
     *
     * @return int
     */
    public function getDisponible()
    {
        return $this->disponible;
    }

    /**
     * Set ubicacionOrigen
     *
     * @param \AppBundle\Entity\Ubicacion $ubicacionOrigen
     *
     * @return Vuelo
     */
    public function setUbicacionOrigen(\AppBundle\Entity\Ubicacion $ubicacionOrigen = null)
    {
        $this->ubicacion_origen = $ubicacionOrigen;

        return $this;
    }

    /**
     * Get ubicacionOrigen
     *
     * @return \AppBundle\Entity\Ubicacion
     */
    public function getUbicacionOrigen()
    {
        return $this->ubicacion_origen;
    }

    /**
     * Set ubicacionDestino
     *
     * @param \AppBundle\Entity\Ubicacion $ubicacionDestino
     *
     * @return Vuelo
     */
    public function setUbicacionDestino(\AppBundle\Entity\Ubicacion $ubicacionDestino = null)
    {
        $this->ubicacion_destino = $ubicacionDestino;

        return $this;
    }

    /**
     * Get ubicacionDestino
     *
     * @return \AppBundle\Entity\Ubicacion
     */
    public function getUbicacionDestino()
    {
        return $this->ubicacion_destino;
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Vuelo
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Vuelo
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }


    /**
     * Set fechaLlegada
     *
     * @param \DateTime $fechaLlegada
     *
     * @return Vuelo
     */
    public function setFechaLlegada($fechaLlegada)
    {
        $this->fecha_llegada = $fechaLlegada;

        return $this;
    }

    /**
     * Get fechaLlegada
     *
     * @return \DateTime
     */
    public function getFechaLlegada()
    {
        return $this->fecha_llegada;
    }

    public function actualizar(){
      $this->disponible -= 1;
    }

    public function getDuracion(){
      $fec = date_diff($this->fecha_llegada, $this->fecha);
      $horas = $fec->h;
      $horas = $horas + ($fec->days*24);
      return $horas."hs"." ".$fec->m."min";
    }

    public function getPrecioEntre($f1, $f2) {
      return $this->precio;
    }
}
