<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chat
 *
 * @ORM\Table(name="chat", indexes={@ORM\Index(name="fk_chat_stream", columns={"id_stream"}), @ORM\Index(name="fk_chat_user", columns={"id_user"})})
 * @ORM\Entity
 */
class Chat
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_comment", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idComment;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255, nullable=false)
     */
    private $content;

    /**
     * @var int
     *
     * @ORM\Column(name="report_nbr", type="integer", nullable=false)
     */
    private $reportNbr;

    /**
     * @var \Stream
     *
     * @ORM\ManyToOne(targetEntity="Stream")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_stream", referencedColumnName="id_stream")
     * })
     */
    private $idStream;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;

    public function getIdComment(): ?int
    {
        return $this->idComment;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getReportNbr(): ?int
    {
        return $this->reportNbr;
    }

    public function setReportNbr(int $reportNbr): self
    {
        $this->reportNbr = $reportNbr;

        return $this;
    }

    public function getIdStream(): ?Stream
    {
        return $this->idStream;
    }

    public function setIdStream(?Stream $idStream): self
    {
        $this->idStream = $idStream;

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
