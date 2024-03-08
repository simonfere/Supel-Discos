<?php

namespace App\Entity;

use App\Repository\ProductoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductoRepository::class)]
class Producto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(targetEntity: Valoracion::class, mappedBy: 'id_producto')]
    private Collection $valoracions;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\ManyToOne(inversedBy: 'productos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Artista $artista = null;

    #[ORM\Column(length: 255)]
    private ?string $ano_salida = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $precio = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pais = null;

    #[ORM\ManyToOne]
    private ?Formato $formato = null;

    public function __construct()
    {
        $this->valoracions = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->nombre;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Valoracion>
     */
    public function getValoracions(): Collection
    {
        return $this->valoracions;
    }

    public function addValoracion(Valoracion $valoracion): static
    {
        if (!$this->valoracions->contains($valoracion)) {
            $this->valoracions->add($valoracion);
            $valoracion->setIdProducto($this);
        }

        return $this;
    }

    public function removeValoracion(Valoracion $valoracion): static
    {
        if ($this->valoracions->removeElement($valoracion)) {
            // set the owning side to null (unless already changed)
            if ($valoracion->getIdProducto() === $this) {
                $valoracion->setIdProducto(null);
            }
        }

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getArtista(): ?Artista
    {
        return $this->artista;
    }

    public function setArtista(?Artista $artista): static
    {
        $this->artista = $artista;

        return $this;
    }

    public function getAnoSalida(): ?string
    {
        return $this->ano_salida;
    }

    public function setAnoSalida(string $ano_salida): static
    {
        $this->ano_salida = $ano_salida;

        return $this;
    }

    public function getPrecio(): ?string
    {
        return $this->precio;
    }

    public function setPrecio(string $precio): static
    {
        $this->precio = $precio;

        return $this;
    }

    public function getPais(): ?string
    {
        return $this->pais;
    }

    public function setPais(?string $pais): static
    {
        $this->pais = $pais;

        return $this;
    }

    public function getFormato(): ?Formato
    {
        return $this->formato;
    }

    public function setFormato(?Formato $formato): static
    {
        $this->formato = $formato;

        return $this;
    }
}
