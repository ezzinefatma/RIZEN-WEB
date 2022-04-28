<?php

namespace App\Entity;
use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */



class Produit
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_prod", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProd;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie_prod", type="string", length=255, nullable=false)
     */
    private $categorieProd;

    /**
     * @Assert\NotBlank(message=" libelle doit etre non vide")
     * @Assert\Length(
     *      min = 5,
     *      minMessage=" Entrer un libelle au mini de 5 caracteres"
     *
     *     )
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @Assert\NotBlank(message=" marque doit etre non vide")
     * @Assert\Length(
     *      min = 5,
     *      minMessage=" Entrer un marque au mini de 5 caracteres"
     *
     *     )
     * @ORM\Column(type="string", length=255)
     */
    private $marque;


    /**
     * @Assert\Positive

     *
     *
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     *
     */




    private $prix;

    /**
     * @Assert\NotBlank(message=" description doit etre non vide")
     * @Assert\Length(
     *      min = 5,
     *      minMessage=" Entrer un description au mini de 5 caracteres"
     *
     *     )
     * @ORM\Column(type="string", length=255)
     */
    private $descriptionProd;

    /**
     * @var string
     *
     * @ORM\Column(name="image_prod", type="string", length=255, nullable=false)
     */
    private $imageProd;

    /**
     * @Assert\NotBlank(message=" disponibilite doit etre non vide")
     * @Assert\Length(
     *      min = 5,
     *      minMessage=" Entrer un disponibilite au mini de 5 caracteres"
     *
     *     )
     * @ORM\Column(type="string", length=255)
     */
    private $disponibilite;

    /**
     * @var float
     *
     * @ORM\Column(name="note", type="float", precision=10, scale=0, nullable=false)
     */
    /**
     * @Assert\NotBlank(message=" note doit etre non vide")
     * @Assert\Length(
     *      max = 1,
     *      maxMessage=" Entrer un note au max de 1 nombre"
     *
     *     )
     * @ORM\Column(type="string", length=255)
     */
    private $note;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    /**
     * @Assert\NotBlank(message=" quantite doit etre non vide")
     * @Assert\Positive
     *  * @var int
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;
    public function __toString(): string
    {
        return (string)$this->getIdProd();
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", inversedBy="idProd")
     * @ORM\JoinTable(name="panier",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_prod", referencedColumnName="id_prod")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_user1", referencedColumnName="id_user")
     *   }
     * )
     */
    private $idUser1;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="idProduit")
     */
    private $idUser2;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idUser1 = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idUser2 = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdProd(): ?int
    {
        return $this->idProd;
    }

    public function getCategorieProd(): ?string
    {
        return $this->categorieProd;
    }

    public function setCategorieProd(string $categorieProd): self
    {
        $this->categorieProd = $categorieProd;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescriptionProd(): ?string
    {
        return $this->descriptionProd;
    }

    public function setDescriptionProd(string $descriptionProd): self
    {
        $this->descriptionProd = $descriptionProd;

        return $this;
    }

    public function getImageProd()
    {
        return $this->imageProd;
    }

    public function setImageProd( $imageProd)
    {
        $this->imageProd = $imageProd;

        return $this;
    }

    public function getDisponibilite(): ?string
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(string $disponibilite): self
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): self
    {
        $this->note = $note;

        return $this;
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

    /**
     * @return Collection<int, User>
     */
    public function getIdUser1(): Collection
    {
        return $this->idUser1;
    }

    public function addIdUser1(User $idUser1): self
    {
        if (!$this->idUser1->contains($idUser1)) {
            $this->idUser1[] = $idUser1;
        }

        return $this;
    }

    public function removeIdUser1(User $idUser1): self
    {
        $this->idUser1->removeElement($idUser1);

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getIdUser2(): Collection
    {
        return $this->idUser2;
    }

    public function addIdUser2(User $idUser2): self
    {
        if (!$this->idUser2->contains($idUser2)) {
            $this->idUser2[] = $idUser2;
            $idUser2->addIdProduit($this);
        }

        return $this;
    }

    public function removeIdUser2(User $idUser2): self
    {
        if ($this->idUser2->removeElement($idUser2)) {
            $idUser2->removeIdProduit($this);
        }

        return $this;
    }



}
