<?php

namespace App\Entity;

use App\Repository\LineaPedidoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LineaPedidoRepository::class)]
class LineaPedido // id, q, idpr, idpe
    // entidad pedido: id, fecha pedido
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'lineaPedidos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Producto $producto = null;

    #[ORM\Column]
    private ?int $cantidad = null;

    #[ORM\ManyToOne(inversedBy: 'lineaPedidos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pedido $pedido = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProducto(): ?Producto
    {
        return $this->producto;
    }

    public function setProducto(?Producto $producto): static
    {
        $this->producto = $producto;

        return $this;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): static
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getPedido(): ?Pedido
    {
        return $this->pedido;
    }

    public function setPedido(?Pedido $pedido): static
    {
        $this->pedido = $pedido;

        return $this;
    }
}
