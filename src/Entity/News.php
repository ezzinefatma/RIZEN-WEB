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
     * @var \string
     *
     * @ORM\Column(name="date_news", type="string", nullable=false , length=255)
     */
    private $dateNews ;

    public function getidNews(): ?int
    {
        return $this->idNews;
    }

    public function gettitreNews(): ?string
    {
        return $this->titreNews;
    }

    public function settitreNews(string $titreNews): self
    {
        $this->titreNews = $titreNews;

        return $this;
    }

    public function getcontenuNews(): ?string
    {
        return $this->contenuNews;
    }

    public function setcontenuNews(string $contenuNews): self
    {
        $this->contenuNews = $contenuNews;

        return $this;
    }

    public function getdateNews(): ?string
    {
        return $this->dateNews;
    }

    public function setdateNews(string $dateNews): self
    {
        $this->dateNews = $dateNews;

        return $this;
    }


}
