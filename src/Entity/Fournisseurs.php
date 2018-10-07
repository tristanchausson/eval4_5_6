<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Fournisseurs
 *
 * @ORM\Table(name="Fournisseurs", uniqueConstraints={@ORM\UniqueConstraint(name="idFournisseurs_UNIQUE", columns={"idFournisseurs"})})
 * @ORM\Entity(repositoryClass="App\Repository\FournisseursRepository")
 */
class Fournisseurs
{
    /**
     * @var int
     *
     * @ORM\Column(name="idFournisseurs", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfournisseurs;

    /**
     * @var string
     *
     * @ORM\Column(name="fournisseur_nom", type="string", length=45, nullable=false)
     */
    private $fournisseurNom;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Articles", mappedBy="fournisseur")
     */
    private $article;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->article = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdfournisseurs(): ?int
    {
        return $this->idfournisseurs;
    }

    public function getFournisseurNom(): ?string
    {
        return $this->fournisseurNom;
    }

    public function setFournisseurNom(string $fournisseurNom): self
    {
        $this->fournisseurNom = $fournisseurNom;

        return $this;
    }

    /**
     * @return Collection|Articles[]
     */
    public function getArticle(): Collection
    {
        return $this->article;
    }

    public function addArticle(Articles $article): self
    {
        if (!$this->article->contains($article)) {
            $this->article[] = $article;
            $article->addFournisseur($this);
        }

        return $this;
    }

    public function removeArticle(Articles $article): self
    {
        if ($this->article->contains($article)) {
            $this->article->removeElement($article);
            $article->removeFournisseur($this);
        }

        return $this;
    }

}
