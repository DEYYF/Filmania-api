<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Serializer\Annotation\Groups;

/**
 * GeneroMedia
 *
 * @ORM\Table(name="Visto_Anteriormente", indexes={@ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="id_media", columns={"id_media"})})
 * @ORM\Entity
 */
class VistoAnteriormente
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("VistoAnteriormente")
     */
    private $id;

    /**
     * @var Media
     *
     * @ORM\ManyToOne(targetEntity="Media")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_media", referencedColumnName="id")
     * })
     * @Groups("VistoAnteriormente")
     */
    private $idMedia;

    /**
     * @var Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     * @Groups("VistoAnteriormente")
     */
    private $idUser;

}