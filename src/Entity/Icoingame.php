<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Icoingame
 *
 * @ORM\Table(name="icoingame", indexes={@ORM\Index(name="fk_user_icongame", columns={"id_user"})})
 * @ORM\Entity
 */
class Icoingame
{
    /**
     * @var int
     *
     * @ORM\Column(name="idGame", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idgame;

    /**
     * @var string|null
     *
     * @ORM\Column(name="winn", type="string", length=0, nullable=true)
     */
    private $winn;

    /**
     * @var int|null
     *
     * @ORM\Column(name="value_win", type="integer", nullable=true)
     */
    private $valueWin;

    /**
     * @var int
     *
     * @ORM\Column(name="money_waste", type="integer", nullable=false)
     */
    private $moneyWaste;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_remise", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateRemise = 'CURRENT_TIMESTAMP';

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;

    public function getIdgame(): ?int
    {
        return $this->idgame;
    }

    public function getWinn(): ?string
    {
        return $this->winn;
    }

    public function setWinn(?string $winn): self
    {
        $this->winn = $winn;

        return $this;
    }

    public function getValueWin(): ?int
    {
        return $this->valueWin;
    }

    public function setValueWin(?int $valueWin): self
    {
        $this->valueWin = $valueWin;

        return $this;
    }

    public function getMoneyWaste(): ?int
    {
        return $this->moneyWaste;
    }

    public function setMoneyWaste(int $moneyWaste): self
    {
        $this->moneyWaste = $moneyWaste;

        return $this;
    }

    public function getDateRemise(): ?\DateTimeInterface
    {
        return $this->dateRemise;
    }

    public function setDateRemise(\DateTimeInterface $dateRemise): self
    {
        $this->dateRemise = $dateRemise;

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
