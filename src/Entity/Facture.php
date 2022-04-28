<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Facture
 *
 * @ORM\Table(name="facture", indexes={@ORM\Index(name="id_prod", columns={"id_prod"}), @ORM\Index(name="id_wallet", columns={"id_wallet"})})
 * @ORM\Entity(repositoryClass=FactureRepository::class)
 */
class Facture
{
    /**
     * @var int
     *
     * @ORM\Column(name="numfac", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numfac;

    /**
     * @Assert\Positive
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;


    /**
     * @Assert\NotBlank(message="nom  doit etre non vide")
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;


    /**
     * @Assert\NotBlank(message="prenom  doit etre non vide")
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     *   * @Assert\Positive
     * @var float
     *
     * @ORM\Column(name="prixtot", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixtot;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_prod", referencedColumnName="id_prod")
     * })
     */
    private $idProd;




    /**
     * @Assert\NotBlank(message="prenom  doit etre non vide")
     * @var \Wallet
     *
     * @ORM\ManyToOne(targetEntity="Wallet")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_wallet", referencedColumnName="id_wallet")
     * })
     */
    private $idWallet;

    public function getNumfac(): ?int
    {
        return $this->numfac;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getPrixtot(): ?float
    {
        return $this->prixtot;
    }

    public function setPrixtot(float $prixtot): self
    {
        $this->prixtot = $prixtot;

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

    public function getIdWallet(): ?Wallet
    {
        return $this->idWallet;
    }

    public function setIdWallet(?Wallet $idWallet): self
    {
        $this->idWallet = $idWallet;

        return $this;
    }

    public function __toString()
    {
        return (string)$this->getNumfac();
    }
}
