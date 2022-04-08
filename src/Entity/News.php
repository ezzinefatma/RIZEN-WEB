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


}
