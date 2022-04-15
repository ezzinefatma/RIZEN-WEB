<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Fournisseur
 *
 * @ORM\Table(name="fournisseur")
 * @ORM\Entity
 */
class Fournisseur
{
    /**
     * @var int
     *
     * @ORM\Column(name="idFou", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfou;
    /**
     * @Assert\NotBlank(message=" nom doit etre non vide")
     * @Assert\Length(
     *      min = 4,
     *      minMessage=" Entrer un nom au mini de 5 caracteres"
     *
     *     )
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @Assert\NotBlank(message=" prenom doit etre non vide")
     * @Assert\Length(
     *      min = 4,
     *      minMessage=" Entrer un prenom au mini de 5 caracteres"
     *
     *     )
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @Assert\NotBlank(message=" ville doit etre non vide")
     * @Assert\Length(
     *      min = 4,
     *      minMessage=" Entrer un ville au mini de 5 caracteres"
     *
     *     )
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @Assert\NotBlank(message=" adresse doit etre non vide")
     * @Assert\Length(
     *      min = 4,
     *      minMessage=" Entrer un adresse au mini de 5 caracteres"
     *
     *     )
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;




    /**
     * @Assert\NotBlank(message="TELE  doit etre non vide")
     * @Assert\Length(
     *      min = 8,
     *      max = 8,
     *      minMessage = "doit etre =8 ",
     *      maxMessage = "doit etre =8" )
     * @var int
     *
     * @ORM\Column(name="tele", type="integer", nullable=false)
     */
    private $tele;

    public function getIdfou(): ?int
    {
        return $this->idfou;
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

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

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
