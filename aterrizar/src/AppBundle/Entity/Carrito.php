<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Carrito
 *
 * @ORM\Table(name="carrito")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarritoRepository")
 */
class Carrito
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
     * @ORM\OneToOne(targetEntity="User", inversedBy="carrito")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     *
     * @ORM\ManyToMany(targetEntity="ServicioReserva")
     * @ORM\JoinTable(name="carrito_servicios_reserva",
     *      joinColumns={@ORM\JoinColumn(name="carrito_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="servicio_reserva_id", referencedColumnName="id")}
     *      )
     */
    private $servicios_reserva;


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
     * @return Carrito
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
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Carrito
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
     * Add servicio
     *
     * @param \AppBundle\Entity\Servicio $servicio
     *
     * @return Carrito
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
     * Add serviciosReserva
     *
     * @param \AppBundle\Entity\ServicioReserva $serviciosReserva
     *
     * @return Carrito
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