<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire")
 * @ORM\Entity
 */
class Commentaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_com", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCom;

    /**
     * @var int
     *
     * @ORM\Column(name="approuve", type="integer", nullable=true)
     */
    private $approuve;

    /**
     * @var string
     *
     * @ORM\Column(name="content_com", type="string", length=255, nullable=false)
     */
    private $contentCom;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_com", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateCom = 'CURRENT_TIMESTAMP';
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $username;

    /**
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;


    /**
     * @var \Publication
     * @ORM\ManyToOne(targetEntity="Publication")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="publication", referencedColumnName="id_pub",onDelete="CASCADE")
     * })
     */
    private $publication;

    public function getIdCom(): int
    {
        return $this->idCom;
    }

    /**
     * @param int $idCom
     */
    public function setIdCom(int $idCom): void
    {
        $this->idCom = $idCom;
    }


    /**
     * @return string
     */
    public function getContentCom(): string
    {
        return $this->contentCom;
    }

    /**
     * @param string $contentCom
     */
    public function setContentCom(string $contentCom): void
    {
        $this->contentCom = $contentCom;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateCom()
    {
        return $this->dateCom;
    }

    /**
     * @param \DateTime|null $dateCom
     */
    public function setDateCom($dateCom): void
    {
        $this->dateCom = $dateCom;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * @param mixed $publication
     */
    public function setPublication($publication): void
    {
        $this->publication = $publication;
    }

    /**
     * @return int
     */
    public function getApprouve(): int
    {
        return $this->approuve;
    }

    /**
     * @param int $approuve
     */
    public function setApprouve(int $approuve): void
    {
        $this->approuve = $approuve;
    }
}
