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

    public function getIdProm(): ?int
    {
        return $this->idProm;
    }

    public function getDateDebutProm(): ?string
    {
        return $this->dateDebutProm;
    }

    public function setDateDebutProm(string $dateDebutProm): self
    {
        $this->dateDebutProm = $dateDebutProm;

        return $this;
    }

    public function getDateFinProm(): ?string
    {
        return $this->dateFinProm;
    }

    public function setDateFinProm(string $dateFinProm): self
    {
        $this->dateFinProm = $dateFinProm;

        return $this;
    }

    public function getTauxReduction(): ?int
    {
        return $this->tauxReduction;
    }

    public function setTauxReduction(int $tauxReduction): self
    {
        $this->tauxReduction = $tauxReduction;

        return $this;
    }

    public function getIdProd(): ?Produit
    {
        return $this->idProd;
    }

    public function setIdProd(?Produit $idProd): self
    {
        $this->idProd = $idProd;

        return $this;
    }


}
