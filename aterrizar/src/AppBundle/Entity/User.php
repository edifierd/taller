<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *
     * @ORM\OneToMany(targetEntity="Reserva", mappedBy="user")
     */
    private $reservas;

    /**
     *
     * @ORM\OneToOne(targetEntity="Carrito", inversedBy="user", cascade={"persist"})
     * @ORM\JoinColumn(name="carrito_id", referencedColumnName="id")
     */
    private $carrito;

    public function __construct()
    {
        $this->reservas = new ArrayCollection();
        $this->carrito = new Carrito();
    }

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
     * Set carrito
     *
     * @param string $carrito
     *
     * @return User
     */
    public function setCarrito($carrito)
    {
        $this->carrito = $carrito;

        return $this;
    }

    /**
     * Get carrito
     *
     * @return string
     */
    public function getCarrito()
    {
        return $this->carrito;
    }

    /**
     * Add reserva
     *
     * @param \AppBundle\Entity\Reserva $reserva
     *
     * @return User
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

}
