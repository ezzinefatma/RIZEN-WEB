<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserStreamHistory
 *
 * @ORM\Table(name="user_stream_history", indexes={@ORM\Index(name="fk_stream_stream_history", columns={"stream_id"}), @ORM\Index(name="fk_user_stream_history", columns={"id_user"})})
 * @ORM\Entity
 */
class UserStreamHistory
{
    /**
     * @var int
     *
     * @ORM\Column(name="history_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $historyId;

    /**
     * @var int
     *
     * @ORM\Column(name="streamer_id", type="integer", nullable=false)
     */
    private $streamerId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $date = 'CURRENT_TIMESTAMP';

    /**
     * @var \Stream
     *
     * @ORM\ManyToOne(targetEntity="Stream")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stream_id", referencedColumnName="id_stream")
     * })
     */
    private $stream;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;

    public function getHistoryId(): ?int
    {
        return $this->historyId;
    }

    public function getStreamerId(): ?int
    {
        return $this->streamerId;
    }

    public function setStreamerId(int $streamerId): self
    {
        $this->streamerId = $streamerId;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getStream(): ?Stream
    {
        return $this->stream;
    }

    public function setStream(?Stream $stream): self
    {
        $this->stream = $stream;

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
