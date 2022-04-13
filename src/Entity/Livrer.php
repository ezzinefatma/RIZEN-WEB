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

    public function getIdLiv(): ?int
    {
        return $this->idLiv;
    }

    public function getIdProd(): ?int
    {
        return $this->idProd;
    }

    public function setIdProd(int $idProd): self
    {
        $this->idProd = $idProd;

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

    public function getAdresseCl(): ?string
    {
        return $this->adresseCl;
    }

    public function setAdresseCl(string $adresseCl): self
    {
        $this->adresseCl = $adresseCl;

        return $this;
    }


}
