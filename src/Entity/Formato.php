<?php

namespace App\Entity;

use App\Repository\FormatoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormatoRepository::class)]
class Formato
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $tipo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cantidad_formato = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $info_adicional = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): static
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getCantidadFormato(): ?string
    {
        return $this->cantidad_formato;
    }

    public function setCantidadFormato(?string $cantidad_formato): void
    {
        $this->cantidad_formato = $cantidad_formato;
    }



    public function getInfoAdicional(): ?string
    {
        return $this->info_adicional;
    }

    public function setInfoAdicional(?string $info_adicional): static
    {
        $this->info_adicional = $info_adicional;

        return $this;
    }
}
