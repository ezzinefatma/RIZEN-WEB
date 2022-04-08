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
     * @ORM\Column(name="re├зu_money", type="integer", nullable=true)
     */
    private $reузuMoney;

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


}
