<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HistoriqueCoins
 *
 * @ORM\Table(name="historique_coins", indexes={@ORM\Index(name="fk_historique_user", columns={"id_user"})})
 * @ORM\Entity
 */
class HistoriqueCoins
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_h", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idH;

    /**
     * @var int|null
     *
     * @ORM\Column(name="montant_achat", type="integer", nullable=true)
     */
    private $montantAchat;

    /**
     * @var int|null
     *
     * @ORM\Column(name="transaction", type="integer", nullable=true)
     */
    private $transaction;

    /**
     * @var int|null
     *
     * @ORM\Column(name="reÃ§u_money", type="integer", nullable=true)
     */
    private $reã§uMoney;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_hystory", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateHystory = 'CURRENT_TIMESTAMP';

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;

    public function getIdH(): ?int
    {
        return $this->idH;
    }

    public function getMontantAchat(): ?int
    {
        return $this->montantAchat;
    }

    public function setMontantAchat(?int $montantAchat): self
    {
        $this->montantAchat = $montantAchat;

        return $this;
    }

    public function getTransaction(): ?int
    {
        return $this->transaction;
    }

    public function setTransaction(?int $transaction): self
    {
        $this->transaction = $transaction;

        return $this;
    }

    public function getReã§uMoney(): ?int
    {
        return $this->reã§uMoney;
    }

    public function setReã§uMoney(?int $reã§uMoney): self
    {
        $this->reã§uMoney = $reã§uMoney;

        return $this;
    }

    public function getDateHystory(): ?\DateTimeInterface
    {
        return $this->dateHystory;
    }

    public function setDateHystory(\DateTimeInterface $dateHystory): self
    {
        $this->dateHystory = $dateHystory;

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
