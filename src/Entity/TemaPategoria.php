<?php

namespace App\Entity;

use App\Repository\TemaPategoriaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TemaPategoriaRepository::class)]
class TemaPategoria
{
    #[ORM\Id]
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Tema $tema = null;

    #[ORM\Id]
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pategoria $pategoria = null;

    #[ORM\Column]
    private array $json = [];
    
    public function getTema(): ?Tema
    {
        return $this->tema;
    }

    public function setTema(?Tema $tema): static
    {
        $this->tema = $tema;

        return $this;
    }

    public function getPategoria(): ?Pategoria
    {
        return $this->pategoria;
    }

    public function setPategoria(?Pategoria $pategoria): static
    {
        $this->pategoria = $pategoria;

        return $this;
    }

    public function getJson(): array
    {
        return $this->json;
    }

    public function setJson(array $json): static
    {
        $this->json = $json;

        return $this;
    }
}
