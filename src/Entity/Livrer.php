<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livrer
 *
 * @ORM\Table(name="livrer")
 * @ORM\Entity
 */
class Livrer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_liv", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLiv;

    /**
     * @var int
     *
     * @ORM\Column(name="id_prod", type="integer", nullable=false)
     */
    private $idProd;

    /**
     * @var int
     *
     * @ORM\Column(name="qte", type="integer", nullable=false)
     */
    private $qte;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_cl", type="string", length=255, nullable=false)
     */
    private $adresseCl;


}
