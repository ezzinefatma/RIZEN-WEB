<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Promotion
 *
 * @ORM\Table(name="promotion", indexes={@ORM\Index(name="fk_promotion_produit", columns={"id_prod"})})
 * @ORM\Entity(repositoryClass=PromotionRepository::class)
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut_prom", type="date", nullable=false)
     */
    private $dateDebutProm;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin_prom", type="date", nullable=false)
     */
    private $dateFinProm;



    /**
     * @Assert\Positive
     * @Assert\NotBlank(message="tauxReduction  doit etre non vide")
     * @var int
     *
     * @ORM\Column(name="taux_reduction", type="integer", nullable=false)
     */
    private $tauxReduction;

    /**
     * @Assert\NotBlank(message="tauxReduction  doit etre non vide")
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_prod", referencedColumnName="id_prod")
     * })
     */
    private $idProd;
    public function __toString()
    {
        return (string) $this->getIdProm();
    }
    public function getIdProm(): ?int
    {
        return $this->idProm;
    }

    public function getDateDebutProm(): ?\DateTimeInterface
    {
        return $this->dateDebutProm;
    }

    public function setDateDebutProm(\DateTimeInterface $dateDebutProm): self
    {
        $this->dateDebutProm = $dateDebutProm;

        return $this;
    }

    public function getDateFinProm(): ?\DateTimeInterface
    {
        return $this->dateFinProm;
    }

    public function setDateFinProm(\DateTimeInterface $dateFinProm): self
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
