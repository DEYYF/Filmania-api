<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Serializer\Annotation\Groups;

/**
 * GeneroMedia
 *
 * @ORM\Table(name="Genero_Media", indexes={@ORM\Index(name="id_genero", columns={"id_genero"}), @ORM\Index(name="id_media", columns={"id_media"})})
 * @ORM\Entity
 */
class GeneroMedia
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("genero_media")
     */
    private $id;

    /**
     * @var Media
     *
     * @ORM\ManyToOne(targetEntity="Media")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_media", referencedColumnName="id")
     * })
     * @Groups("genero_media")
     */
    private $idMedia;

    /**
     * @var Genero
     *
     * @ORM\ManyToOne(targetEntity="Genero")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_genero", referencedColumnName="id")
     * })
     * @Groups("genero_media")
     */
    private $idGenero;




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
     * Get the value of idGenero
     */
    public function getIdGenero(): Genero
    {
        return $this->idGenero;
    }

    /**
     * Set the value of idGenero
     */
    public function setIdGenero(Genero $idGenero): self
    {
        $this->idGenero = $idGenero;

        return $this;
    }
}
