<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reserva
 *
 * @ORM\Table(name="reserva")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReservaRepository")
 */
class Reserva
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
     *
     * @ORM\ManyToMany(targetEntity="ServicioReserva")
     * @ORM\JoinTable(name="reserva_servicios_reserva",
     *      joinColumns={@ORM\JoinColumn(name="reserva_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="servicio_reserva_id", referencedColumnName="id")}
     *      )
     */
    private $servicios_reserva;

    /**
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="reservas")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetimetz")
     */
    private $fecha;

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
     * Set servicios
     *
     * @param array $servicios
     *
     * @return Reserva
     */
    public function setServicios($servicios)
    {
        $this->servicios = $servicios;

        return $this;
    }

    /**
     * Get servicios
     *
     * @return array
     */
    public function getServicios()
    {
        return $this->servicios;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->servicios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add servicio
     *
     * @param \AppBundle\Entity\Servicio $servicio
     *
     * @return Reserva
     */
    public function addServicio(\AppBundle\Entity\Servicio $servicio)
    {
        $this->servicios[] = $servicio;

        return $this;
    }

    /**
     * Remove servicio
     *
     * @param \AppBundle\Entity\Servicio $servicio
     */
    public function removeServicio(\AppBundle\Entity\Servicio $servicio)
    {
        $this->servicios->removeElement($servicio);
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Reserva
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return Reserva
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fecha_inicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     *
     * @return Reserva
     */
    public function setFechaFin($fechaFin)
    {
        $this->fecha_fin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime
     */
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Reserva
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
     * Add serviciosReserva
     *
     * @param \AppBundle\Entity\ServicioReserva $serviciosReserva
     *
     * @return Reserva
     */
    public function addServiciosReserva(\AppBundle\Entity\ServicioReserva $serviciosReserva)
    {
        $this->servicios_reserva[] = $serviciosReserva;

        return $this;
    }

    /**
     * Remove serviciosReserva
     *
     * @param \AppBundle\Entity\ServicioReserva $serviciosReserva
     */
    public function removeServiciosReserva(\AppBundle\Entity\ServicioReserva $serviciosReserva)
    {
        $this->servicios_reserva->removeElement($serviciosReserva);
    }

    /**
     * Get serviciosReserva
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getServiciosReserva()
    {
        return $this->servicios_reserva;
    }
}
