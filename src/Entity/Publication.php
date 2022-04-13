<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publication
 *
 * @ORM\Table(name="publication", indexes={@ORM\Index(name="fk_publication_user", columns={"id_user"})})
 * @ORM\Entity
 */
class Publication
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_pub", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPub;

    /**
     * @var string
     *
     * @ORM\Column(name="content_pub", type="string", length=255, nullable=false)
     */
    private $contentPub;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_pub", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $datePub = 'CURRENT_TIMESTAMP';

    /**
     * @var int
     *
     * @ORM\Column(name="like_nbr", type="integer", nullable=false)
     */
    private $likeNbr = '0';

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;

    public function getIdPub(): ?int
    {
        return $this->idPub;
    }

    public function getContentPub(): ?string
    {
        return $this->contentPub;
    }

    public function setContentPub(string $contentPub): self
    {
        $this->contentPub = $contentPub;

        return $this;
    }

    public function getDatePub(): ?\DateTimeInterface
    {
        return $this->datePub;
    }

    public function setDatePub(\DateTimeInterface $datePub): self
    {
        $this->datePub = $datePub;

        return $this;
    }

    public function getLikeNbr(): ?int
    {
        return $this->likeNbr;
    }

    public function setLikeNbr(int $likeNbr): self
    {
        $this->likeNbr = $likeNbr;

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


}
