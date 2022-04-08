<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pinned
 *
 * @ORM\Table(name="pinned", indexes={@ORM\Index(name="fk_pub_pinned", columns={"id_pub"})})
 * @ORM\Entity
 */
class Pinned
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_pin", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPin;

    /**
     * @var \Publication
     *
     * @ORM\ManyToOne(targetEntity="Publication")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pub", referencedColumnName="id_pub")
     * })
     */
    private $idPub;


}
