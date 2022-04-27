<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Publication
 *
 * @ORM\Table(name="publication")
 * @ORM\Entity
 */
class Publication
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_pub", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idPub;

    /**
     * @var string
     *
     * @ORM\Column(name="title_pub", type="string", length=255, nullable=true)
     */
    private $titlePub;
    /**
     * @var string
     *
     * @ORM\Column(name="content_pub", type="string", length=2555, nullable=false)
     */
    private $contentPub;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_pub", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $datePub = 'CURRENT_TIMESTAMP';

    /**
     * @ORM\Column(name="image", type="string", nullable=false)
     * @Assert\NotBlank(message="please upload image")
     * @Assert\File(mimeTypes={"image/jpeg"})
     */
    private $image;

    /**
     * @var int
     *
     * @ORM\Column(name="like_nbr", type="integer", nullable=false)
     */
    private $likeNbr = '0';


    /**
     * @return int
     */
    public function getIdPub(): int
    {
        return $this->idPub;
    }

    /**
     * @param int $idPub
     */
    public function setIdPub(int $idPub): void
    {
        $this->idPub = $idPub;
    }

    /**
     * @return string
     */
    public function getContentPub()
    {
        return $this->contentPub;
    }

    /**
     * @param string $contentPub
     */
    public function setContentPub(string $contentPub)
    {
        $this->contentPub = $contentPub;
    }

    /**
     * @return \DateTime
     */
    public function getDatePub()
    {
        return $this->datePub;
    }

    /**
     * @param \DateTime $datePub
     */
    public function setDatePub($datePub): void
    {
        $this->datePub = $datePub;
    }


    public function getImage()
    {
        return $this->image;
    }


    public function setImage( $image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return int
     */
    public function getLikeNbr()
    {
        return $this->likeNbr;
    }

    /**
     * @param int $likeNbr
     */
    public function setLikeNbr($likeNbr): void
    {
        $this->likeNbr = $likeNbr;
    }


    /**
     * @return string
     */
    public function getTitlePub()
    {
        return $this->titlePub;
    }

    /**
     * @param string $titlePub
     */
    public function setTitlePub(string $titlePub)
    {
        $this->titlePub = $titlePub;
    }


}
