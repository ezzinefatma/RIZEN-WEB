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


}
