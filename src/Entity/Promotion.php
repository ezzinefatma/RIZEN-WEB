<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promotion
 *
 * @ORM\Table(name="promotion", indexes={@ORM\Index(name="fk_promotion_produit", columns={"id_prod"})})
 * @ORM\Entity
 */
class Promotion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_prom", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProm;

    /**
     * @var string
     *
     * @ORM\Column(name="date_debut_prom", type="string", length=255, nullable=false)
     */
    private $dateDebutProm;

    /**
     * @var string
     *
     * @ORM\Column(name="date_fin_prom", type="string", length=255, nullable=false)
     */
    private $dateFinProm;

    /**
     * @var int
     *
     * @ORM\Column(name="taux_reduction", type="integer", nullable=false)
     */
    private $tauxReduction;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_prod", referencedColumnName="id_prod")
     * })
     */
    private $idProd;


}
