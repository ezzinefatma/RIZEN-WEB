<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     *
     * @ORM\Column(name="titre_stream", type="string", length=255, nullable=false)
     */
    private $titreStream;

    /**
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
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=0, nullable=false)
     */
    private $status;

    /**
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
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

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
    public function __toString()
    {
        return (string) $this->getIdStream();
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }


}
