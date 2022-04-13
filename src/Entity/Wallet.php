<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wallet
 *
 * @ORM\Table(name="wallet", indexes={@ORM\Index(name="fk_wallet_user", columns={"id_user"})})
 * @ORM\Entity
 */
class Wallet
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_wallet", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idWallet;

    /**
     * @var int
     *
     * @ORM\Column(name="solde", type="integer", nullable=false)
     */
    private $solde = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="card_number", type="string", length=255, nullable=false)
     */
    private $cardNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="csc", type="integer", nullable=false)
     */
    private $csc;

    /**
     * @var string
     *
     * @ORM\Column(name="expire", type="string", length=255, nullable=false)
     */
    private $expire;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;

    public function getIdWallet(): ?int
    {
        return $this->idWallet;
    }

    public function getSolde(): ?int
    {
        return $this->solde;
    }

    public function setSolde(int $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function getCardNumber(): ?string
    {
        return $this->cardNumber;
    }

    public function setCardNumber(string $cardNumber): self
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    public function getCsc(): ?int
    {
        return $this->csc;
    }

    public function setCsc(int $csc): self
    {
        $this->csc = $csc;

        return $this;
    }

    public function getExpire(): ?string
    {
        return $this->expire;
    }

    public function setExpire(string $expire): self
    {
        $this->expire = $expire;

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
