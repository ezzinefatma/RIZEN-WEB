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


}
