<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Order
 *
 * @ORM\Table(name="order")
 * @ORM\Entity
 */
class Order
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_or", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOr;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_prod", type="integer", nullable=true)
     */
    private $idProd;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_achat", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixAchat;

    /**
     * @var int
     *
     * @ORM\Column(name="qte", type="integer", nullable=false)
     */
    private $qte;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_client", type="string", length=255, nullable=false)
     */
    private $nomClient;

    /**
     * @var string
     *
     * @ORM\Column(name="adress_client", type="string", length=255, nullable=false)
     */
    private $adressClient;

    /**
     * @var int
     *
     * @ORM\Column(name="tele", type="integer", nullable=false)
     */
    private $tele;

    public function getIdOr(): ?int
    {
        return $this->idOr;
    }

    public function getIdProd(): ?int
    {
        return $this->idProd;
    }

    public function setIdProd(?int $idProd): self
    {
        $this->idProd = $idProd;

        return $this;
    }

    public function getPrixAchat(): ?float
    {
        return $this->prixAchat;
    }

    public function setPrixAchat(float $prixAchat): self
    {
        $this->prixAchat = $prixAchat;

        return $this;
    }

    public function getQte(): ?int
    {
        return $this->qte;
    }

    public function setQte(int $qte): self
    {
        $this->qte = $qte;

        return $this;
    }

    public function getNomClient(): ?string
    {
        return $this->nomClient;
    }

    public function setNomClient(string $nomClient): self
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    public function getAdressClient(): ?string
    {
        return $this->adressClient;
    }

    public function setAdressClient(string $adressClient): self
    {
        $this->adressClient = $adressClient;

        return $this;
    }

    public function getTele(): ?int
    {
        return $this->tele;
    }

    public function setTele(int $tele): self
    {
        $this->tele = $tele;

        return $this;
    }


}
