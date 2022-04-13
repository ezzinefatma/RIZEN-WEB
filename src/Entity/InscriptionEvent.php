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
     * @var \DateTime
     *
     * @ORM\Column(name="date_ins", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateIns = 'CURRENT_TIMESTAMP';

    /**
     * @var \Event
     *
     * @ORM\ManyToOne(targetEntity="Event")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_event", referencedColumnName="id_event")
     * })
     */
    private $idEvent;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usr", referencedColumnName="id_user")
     * })
     */
    private $idUsr;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateIns(): ?\DateTimeInterface
    {
        return $this->dateIns;
    }

    public function setDateIns(\DateTimeInterface $dateIns): self
    {
        $this->dateIns = $dateIns;

        return $this;
    }

    public function getIdEvent(): ?Event
    {
        return $this->idEvent;
    }

    public function setIdEvent(?Event $idEvent): self
    {
        $this->idEvent = $idEvent;

        return $this;
    }

    public function getIdUsr(): ?User
    {
        return $this->idUsr;
    }

    public function setIdUsr(?User $idUsr): self
    {
        $this->idUsr = $idUsr;

        return $this;
    }


}
