<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Stream
 *
 * @ORM\Table(name="stream", indexes={@ORM\Index(name="fk_stream_user", columns={"id_user"})})
 * @ORM\Entity
 */
class Stream
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_stream", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idStream;

    /**
     * @var string
     *@Assert\Length(
     *      min = 5,
     *      minMessage=" Entrer un titre au mini de 8 caracteres"
     * )
     * @ORM\Column(name="titre_stream", type="string", length=255, nullable=false)
     */
    private $titreStream;

    /**
     * @Assert\NotBlank(message="description  doit etre non vide")
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=0, nullable=false)
     */
    private $categorie;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_like", type="integer", nullable=false)
     */
    private $nbrLike = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_report", type="integer", nullable=false)
     */
    private $nbrReport = '0';

    /**
     * @var string
     * @Assert\Url(
     *
     *  message = "The url '{{ value }}' is not a valid url",
     * )
     * @Assert\NotBlank(message="description  doit etre non vide")
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="description  doit etre non vide")
     * @ORM\Column(name="status", type="string", length=0, nullable=false)
     */
    private $status;

    /**
     * @Assert\NotBlank(message="description  doit etre non vide")
     * @var string
     *
     * @ORM\Column(name="background_pic", type="string", length=255, nullable=false)
     */
    private $backgroundPic;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @param $createdAt
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }


    public function getIdStream(): ?int
    {
        return $this->idStream;
    }

    public function getTitreStream(): ?string
    {
        return $this->titreStream;
    }

    public function setTitreStream(string $titreStream): self
    {
        $this->titreStream = $titreStream;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getNbrLike(): ?int
    {
        return $this->nbrLike;
    }

    public function setNbrLike(int $nbrLike): self
    {
        $this->nbrLike = $nbrLike;

        return $this;
    }

    public function getNbrReport(): ?int
    {
        return $this->nbrReport;
    }

    public function setNbrReport(int $nbrReport): self
    {
        $this->nbrReport = $nbrReport;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getBackgroundPic(): ?string
    {
        return $this->backgroundPic;
    }

    public function setBackgroundPic(string $backgroundPic): self
    {
        $this->backgroundPic = $backgroundPic;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }


    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }


    public function __toString()
    {
        return (string) $this->getIdStream();
    }

}
