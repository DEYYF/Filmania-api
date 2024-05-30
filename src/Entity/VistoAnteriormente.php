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


    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of idMedia
     */
    public function getIdMedia(): Media
    {
        return $this->idMedia;
    }

    /**
     * Set the value of idMedia
     */
    public function setIdMedia(Media $idMedia): self
    {
        $this->idMedia = $idMedia;

        return $this;
    }

    /**
     * Get the value of idUser
     */
    public function getIdUser(): Usuario
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     */
    public function setIdUser(Usuario $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }
}