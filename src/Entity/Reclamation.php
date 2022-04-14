<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation", indexes={@ORM\Index(name="fk_rec_user", columns={"id_user"})})
 * @ORM\Entity
 */
class Reclamation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_rec", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRec;

    /**
     * @var string
     *
     * @ORM\Column(name="type_rec", type="string", length=255, nullable=false)
     */
    private $typeRec;

    /**
     * @var string
     *
     * @ORM\Column(name="description_rec", type="string", length=255, nullable=false)
     */
    private $descriptionRec;

    /**
     * @var string
     *
     * @ORM\Column(name="statut_rec", type="string", length=0, nullable=false, options={"default"="en_attente"})
     */
    private $statutRec = 'en_attente';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_rec", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateRec = 'CURRENT_TIMESTAMP';

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;

    public function getIdRec(): ?int
    {
        return $this->idRec;
    }

    public function getTypeRec(): ?string
    {
        return $this->typeRec;
    }

    public function setTypeRec(string $typeRec): self
    {
        $this->typeRec = $typeRec;

        return $this;
    }

    public function getDescriptionRec(): ?string
    {
        return $this->descriptionRec;
    }

    public function setDescriptionRec(string $descriptionRec): self
    {
        $this->descriptionRec = $descriptionRec;

        return $this;
    }

    public function getStatutRec(): ?string
    {
        return $this->statutRec;
    }

    public function setStatutRec(string $statutRec): self
    {
        $this->statutRec = $statutRec;

        return $this;
    }

    public function getDateRec(): ?\DateTimeInterface
    {
        return $this->dateRec;
    }

    public function setDateRec(\DateTimeInterface $dateRec): self
    {
        $this->dateRec = $dateRec;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }


}
