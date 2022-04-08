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


}
