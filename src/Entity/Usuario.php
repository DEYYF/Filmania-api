<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Usuario
 *
 * @ORM\Table(name="Usuario")
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("usuario")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Usuarios", type="string", length=255, nullable=false)
     * @Groups("usuario")
     */
    private $usuarios;

    /**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=255, nullable=false)
     * @Groups("usuario")
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=255, nullable=false)
     * @Groups("usuario")
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Genero", type="string", length=50, nullable=true)
     * @Groups("usuario")
     */
    private $genero;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Pais", type="string", length=50, nullable=true)
     * @Groups("usuario")
     */
    private $pais;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Imagen", type="string", length=255, nullable=true)
     * @Groups("usuario")
     */
    private $imagen;




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
     * Get the value of usuarios
     */
    public function getUsuarios(): string
    {
        return $this->usuarios;
    }

    /**
     * Set the value of usuarios
     */
    public function setUsuarios(string $usuarios): self
    {
        $this->usuarios = $usuarios;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of genero
     */
    public function getGenero(): ?string
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     */
    public function setGenero(?string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get the value of pais
     */
    public function getPais(): ?string
    {
        return $this->pais;
    }

    /**
     * Set the value of pais
     */
    public function setPais(?string $pais): self
    {
        $this->pais = $pais;

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
}
