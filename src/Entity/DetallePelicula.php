<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Serializer\Annotation\Groups;

/**
 * DetallePelicula
 *
 * @ORM\Table(name="Detalle_Pelicula", indexes={@ORM\Index(name="id_pelicula", columns={"id_pelicula"})})
 * @ORM\Entity
 */
class DetallePelicula
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("detalle_pelicula")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Duracion", type="integer", nullable=true)
     * @Groups("detalle_pelicula")
     */
    private $duracion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Ano", type="integer", nullable=true)
     * @Groups("detalle_pelicula")
     */
    private $ano;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Trailer", type="string", length=255, nullable=true)
     * @Groups("detalle_pelicula")
     */
    private $trailer;

    /**
     * @var float|null
     *
     * @ORM\Column(name="valoracion", type="float", precision=10, scale=0, nullable=true)
     * @Groups("detalle_pelicula")
     */
    private $valoracion;

    /**
     * @var Media
     *
     * @ORM\ManyToOne(targetEntity="Media")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pelicula", referencedColumnName="id")
     * })
     * @Groups("detalle_pelicula")
     */
    private $idPelicula;




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
     * Get the value of duracion
     */
    public function getDuracion(): ?int
    {
        return $this->duracion;
    }

    /**
     * Set the value of duracion
     */
    public function setDuracion(?int $duracion): self
    {
        $this->duracion = $duracion;

        return $this;
    }

    /**
     * Get the value of ano
     */
    public function getAno(): ?int
    {
        return $this->ano;
    }

    /**
     * Set the value of ano
     */
    public function setAno(?int $ano): self
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * Get the value of trailer
     */
    public function getTrailer(): ?string
    {
        return $this->trailer;
    }

    /**
     * Set the value of trailer
     */
    public function setTrailer(?string $trailer): self
    {
        $this->trailer = $trailer;

        return $this;
    }

    /**
     * Get the value of valoracion
     */
    public function getValoracion(): ?float
    {
        return $this->valoracion;
    }

    /**
     * Set the value of valoracion
     */
    public function setValoracion(?float $valoracion): self
    {
        $this->valoracion = $valoracion;

        return $this;
    }

    /**
     * Get the value of idPelicula
     */
    public function getIdPelicula(): Media
    {
        return $this->idPelicula;
    }

    /**
     * Set the value of idPelicula
     */
    public function setIdPelicula(Media $idPelicula): self
    {
        $this->idPelicula = $idPelicula;

        return $this;
    }
}
