<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InscriptionEvent
 *
 * @ORM\Table(name="inscription_event", indexes={@ORM\Index(name="fk_event_inscription", columns={"id_event"}), @ORM\Index(name="fk_user_inscription", columns={"id_usr"})})
 * @ORM\Entity
 */
class InscriptionEvent
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * @var \Event
     *
     * @ORM\ManyToOne(targetEntity="Event")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_event", referencedColumnName="id_event")
     * })
     */
    private $idEvent ;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usr", referencedColumnName="id_user")
     * })
     */
    private $idUsr;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateInc;

    /**
     * @param $DateInc
     */
    public function __construct()
    {
        $this->DateInc = new \DateTime();
    }


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getIdEvent(): ?Event
    {
        return $this->idEvent;
    }

    public function setIdEvent( $idEvent)
    {
        $this->idEvent = $idEvent;

        return $this;
    }

    public function getIdUsr(): ?User
    {
        return $this->idUsr;
    }

    public function setIdUsr( $idUsr)
    {
        $this->idUsr = $idUsr;

        return $this;
    }

    public function getDateInc(): ?\DateTimeInterface
    {
        return $this->DateInc;
    }

    public function setDateInc(\DateTimeInterface $DateInc): self
    {
        $this->DateInc = $DateInc;

        return $this;
    }

    public function __toString()
    {
        return (string) $this->getIdEvent();
    }


}
