<?php

namespace App\Entity;

use App\Repository\MateriaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MateriaRepository::class)]
class Materia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\OneToMany(targetEntity: Tema::class, mappedBy: 'materia', orphanRemoval: true)]
    private Collection $temas;

    public function __construct()
    {
        $this->temas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, Tema>
     */
    public function getTemas(): Collection
    {
        return $this->temas;
    }

    public function addTema(Tema $tema): static
    {
        if (!$this->temas->contains($tema)) {
            $this->temas->add($tema);
            $tema->setMateria($this);
        }

        return $this;
    }

    public function removeTema(Tema $tema): static
    {
        if ($this->temas->removeElement($tema)) {
            // set the owning side to null (unless already changed)
            if ($tema->getMateria() === $this) {
                $tema->setMateria(null);
            }
        }

        return $this;
    }
}
