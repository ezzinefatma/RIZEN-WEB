<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity
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
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=255, nullable=false)
     */
    private $marque;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="description_prod", type="string", length=255, nullable=false)
     */
    private $descriptionProd;

    /**
     * @var string
     *
     * @ORM\Column(name="image_prod", type="string", length=255, nullable=false)
     */
    private $imageProd;

    /**
     * @var string
     *
     * @ORM\Column(name="disponibilite", type="string", length=255, nullable=false)
     */
    private $disponibilite;

    /**
     * @var float
     *
     * @ORM\Column(name="note", type="float", precision=10, scale=0, nullable=false)
     */
    private $note;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;

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

}
