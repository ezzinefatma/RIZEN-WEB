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
     * @return int
     */
    public function getIdWallet(): int
    {
        return $this->idWallet;
    }

    /**
     * @param int $idWallet
     */
    public function setIdWallet(int $idWallet): void
    {
        $this->idWallet = $idWallet;
    }

    /**
     * @return int
     */
    public function getSolde()
    {
        return $this->solde;
    }

    /**
     * @param int $solde
     */
    public function setSolde($solde): void
    {
        $this->solde = $solde;
    }

    /**
     * @return string
     */
    public function getCardNumber(): ?string
    {
        return $this->cardNumber;
    }

    /**
     * @param string $cardNumber
     */
    public function setCardNumber(string $cardNumber): void
    {
        $this->cardNumber = $cardNumber;
    }

    /**
     * @return int
     */
    public function getCsc(): ?int
    {
        return $this->csc;
    }

    /**
     * @param int $csc
     */
    public function setCsc(int $csc): void
    {
        $this->csc = $csc;
    }

    /**
     * @return string
     */
    public function getExpire(): ?string
    {
        return $this->expire;
    }

    /**
     * @param string $expire
     */
    public function setExpire(string $expire): void
    {
        $this->expire = $expire;
    }

    /**
     * @return \User
     */
    public function getIdUser(): ?\User
    {
        return $this->idUser;
    }

    /**
     * @param \User $idUser
     */
    public function setIdUser(\User $idUser): void
    {
        $this->idUser = $idUser;
    }
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
    private $cardNumber  ;

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


}
