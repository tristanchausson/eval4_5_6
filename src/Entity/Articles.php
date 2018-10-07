<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Articles
 *
 * @ORM\Table(name="Articles", uniqueConstraints={@ORM\UniqueConstraint(name="idArticles_UNIQUE", columns={"idArticles"})}, indexes={@ORM\Index(name="fk_categorie_id_idx", columns={"categorie_id"}), @ORM\Index(name="fk_unite_id_idx", columns={"unite_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\ArticlesRepository")
 */
class Articles
{
    /**
     * @var int
     *
     * @ORM\Column(name="idArticles", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idarticles;

    /**
     * @var string
     *
     * @ORM\Column(name="prix_vente", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $prixVente;

    /**
     * @var string
     *
     * @ORM\Column(name="article_nom", type="string", length=45, nullable=false)
     */
    private $articleNom;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categorie_id", referencedColumnName="idCategorie")
     * })
     */
    private $categorie;

    /**
     * @var \Unite
     *
     * @ORM\ManyToOne(targetEntity="Unite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="unite_id", referencedColumnName="idUnite")
     * })
     */
    private $unite;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Fournisseurs", inversedBy="article")
     * @ORM\JoinTable(name="articles_fournisseurs",
     *   joinColumns={
     *     @ORM\JoinColumn(name="article_id", referencedColumnName="idArticles")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="fournisseur_id", referencedColumnName="idFournisseurs")
     *   }
     * )
     */
    private $fournisseur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fournisseur = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdarticles(): ?int
    {
        return $this->idarticles;
    }

    public function getPrixVente()
    {
        return $this->prixVente;
    }

    public function setPrixVente($prixVente): self
    {
        $this->prixVente = $prixVente;

        return $this;
    }

    public function getArticleNom(): ?string
    {
        return $this->articleNom;
    }

    public function setArticleNom(string $articleNom): self
    {
        $this->articleNom = $articleNom;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getUnite(): ?Unite
    {
        return $this->unite;
    }

    public function setUnite(?Unite $unite): self
    {
        $this->unite = $unite;

        return $this;
    }

    /**
     * @return Collection|Fournisseurs[]
     */
    public function getFournisseur(): Collection
    {
        return $this->fournisseur;
    }

    public function addFournisseur(Fournisseurs $fournisseur): self
    {
        if (!$this->fournisseur->contains($fournisseur)) {
            $this->fournisseur[] = $fournisseur;
        }

        return $this;
    }

    public function removeFournisseur(Fournisseurs $fournisseur): self
    {
        if ($this->fournisseur->contains($fournisseur)) {
            $this->fournisseur->removeElement($fournisseur);
        }

        return $this;
    }

}
