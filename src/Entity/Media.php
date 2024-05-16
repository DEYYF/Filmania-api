<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Media
 *
 * @ORM\Table(name="Media", indexes={@ORM\Index(name="Tipo", columns={"Tipo"})})
 * @ORM\Entity(repositoryClass="App\Repository\MediaRepository")
 */
class Media
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("media")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Titulo", type="string", length=255, nullable=false)
     * @Groups("media")
     */
    private $titulo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Descripcion", type="text", length=65535, nullable=true)
     * @Groups("media")
     */
    private $descripcion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Imagen", type="string", length=255, nullable=true)
     * @Groups("media")
     */
    private $imagen;

    /**
     * @var Tipo
     *
     * @ORM\ManyToOne(targetEntity="Tipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Tipo", referencedColumnName="id")
     * })
     * @Groups("media")
     */
    private $tipo;

    




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
     * Get the value of titulo
     */
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     */
    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     */
    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of imagen
     */
    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     */
    public function setImagen(?string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get the value of tipo
     */
    public function getTipo(): Tipo
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     */
    public function setTipo(Tipo $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }
}
