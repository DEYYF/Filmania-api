<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Serializer\Annotation\Groups;

/**
 * LibreriaMedia
 *
 * @ORM\Table(name="Libreria_Media", indexes={@ORM\Index(name="id_media", columns={"id_media"}), @ORM\Index(name="id_libreria", columns={"id_libreria"})})
 * @ORM\Entity
 */
class LibreriaMedia
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var Media
     *
     * @ORM\ManyToOne(targetEntity="Media")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_media", referencedColumnName="id")
     * })
     */
    private $idMedia;

    /**
     * @var Libreria
     *
     * @ORM\ManyToOne(targetEntity="Libreria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_libreria", referencedColumnName="id")
     * })
     */
    private $idLibreria;





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
     * Get the value of idLibreria
     */
    public function getIdLibreria(): Libreria
    {
        return $this->idLibreria;
    }

    /**
     * Set the value of idLibreria
     */
    public function setIdLibreria(Libreria $idLibreria): self
    {
        $this->idLibreria = $idLibreria;

        return $this;
    }
}
