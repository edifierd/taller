<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Servicio
 *
 * @ORM\Table(name="servicio")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ServicioRepository")
 */
class Servicio
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
     * @ORM\ManyToMany(targetEntity="ServicioReserva", inversedBy="servicios")
     */
    private $servicio_reservas;


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
        $this->reservas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add reserva
     *
     * @param \AppBundle\Entity\Reserva $reserva
     *
     * @return Servicio
     */
    public function addReserva(\AppBundle\Entity\Reserva $reserva)
    {
        $this->reservas[] = $reserva;

        return $this;
    }

    /**
     * Remove reserva
     *
     * @param \AppBundle\Entity\Reserva $reserva
     */
    public function removeReserva(\AppBundle\Entity\Reserva $reserva)
    {
        $this->reservas->removeElement($reserva);
    }

    /**
     * Get reservas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReservas()
    {
        return $this->reservas;
    }

    /**
     * Add servicioReserva
     *
     * @param \AppBundle\Entity\ServicioReserva $servicioReserva
     *
     * @return Servicio
     */
    public function addServicioReserva(\AppBundle\Entity\ServicioReserva $servicioReserva)
    {
        $this->servicio_reservas[] = $servicioReserva;

        return $this;
    }

    /**
     * Remove servicioReserva
     *
     * @param \AppBundle\Entity\ServicioReserva $servicioReserva
     */
    public function removeServicioReserva(\AppBundle\Entity\ServicioReserva $servicioReserva)
    {
        $this->servicio_reservas->removeElement($servicioReserva);
    }

    /**
     * Get servicioReservas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getServicioReservas()
    {
        return $this->servicio_reservas;
    }
}
