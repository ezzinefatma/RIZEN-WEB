<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @ORM\Table(name="news")
 * @ORM\Entity
 */
class News
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_news", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNews;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_news", type="string", length=255, nullable=false)
     */
    private $titreNews;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu_news", type="string", length=1000, nullable=false)
     */
    private $contenuNews;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_news", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateNews = 'CURRENT_TIMESTAMP';

    public function getIdNews(): ?int
    {
        return $this->idNews;
    }

    public function getTitreNews(): ?string
    {
        return $this->titreNews;
    }

    public function setTitreNews(string $titreNews): self
    {
        $this->titreNews = $titreNews;

        return $this;
    }

    public function getContenuNews(): ?string
    {
        return $this->contenuNews;
    }

    public function setContenuNews(string $contenuNews): self
    {
        $this->contenuNews = $contenuNews;

        return $this;
    }

    public function getDateNews(): ?\DateTimeInterface
    {
        return $this->dateNews;
    }

    public function setDateNews(\DateTimeInterface $dateNews): self
    {
        $this->dateNews = $dateNews;

        return $this;
    }


}
