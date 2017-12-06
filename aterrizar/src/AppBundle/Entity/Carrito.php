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
     * @ORM\OneToOne(targetEntity="User", mappedBy="carrito", cascade={"persist"})
     */
    private $user;

     /**
      *
      * @ORM\OneToMany(targetEntity="ServicioReserva", mappedBy="carrito", cascade={"persist", "remove"})
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
     * Constructor
     */
    public function __construct()
    {
        $this->servicios_reserva = new \Doctrine\Common\Collections\ArrayCollection();
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
