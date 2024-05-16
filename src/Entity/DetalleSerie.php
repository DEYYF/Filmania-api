<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Serializer\Annotation\Groups;

/**
 * DetalleSerie
 *
 * @ORM\Table(name="Detalle_Serie", indexes={@ORM\Index(name="id_serie", columns={"id_serie"})})
 * @ORM\Entity
 */
class DetalleSerie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("detalle_serie")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Temporadas", type="integer", nullable=true)
     * @Groups("detalle_serie")
     */
    private $temporadas;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Ano", type="integer", nullable=true)
     * @Groups("detalle_serie")
     */
    private $ano;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Trailer", type="string", length=255, nullable=true)
     * @Groups("detalle_serie")
     */
    private $trailer;

    /**
     * @var float|null
     *
     * @ORM\Column(name="valoracion", type="float", precision=10, scale=0, nullable=true)
     * @Groups("detalle_serie")
     */
    private $valoracion;

    /**
     * @var Media
     *
     * @ORM\ManyToOne(targetEntity="Media")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_serie", referencedColumnName="id")
     * })
     * @Groups("detalle_serie")
     */
    private $idSerie;





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
     * Get the value of temporadas
     */
    public function getTemporadas(): ?int
    {
        return $this->temporadas;
    }

    /**
     * Set the value of temporadas
     */
    public function setTemporadas(?int $temporadas): self
    {
        $this->temporadas = $temporadas;

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
     * Get the value of idSerie
     */
    public function getIdSerie(): Media
    {
        return $this->idSerie;
    }

    /**
     * Set the value of idSerie
     */
    public function setIdSerie(Media $idSerie): self
    {
        $this->idSerie = $idSerie;

        return $this;
    }
}
