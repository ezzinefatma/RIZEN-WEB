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


}
