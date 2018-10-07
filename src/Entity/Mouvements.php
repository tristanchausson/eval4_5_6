<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mouvements
 *
 * @ORM\Table(name="Mouvements", uniqueConstraints={@ORM\UniqueConstraint(name="idMouvements_UNIQUE", columns={"idMouvements"})}, indexes={@ORM\Index(name="fk_mouv_article_id_idx", columns={"article_id"}), @ORM\Index(name="fk_mouv_achat_id_idx", columns={"achat_id"}), @ORM\Index(name="fk_mouv_type_mouvement_id_idx", columns={"type_mouvement_id"}), @ORM\Index(name="fk_mouv_vente_id_idx", columns={"vente_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\MouvementsRepository")
 */
class Mouvements
{
    /**
     * @var int
     *
     * @ORM\Column(name="idMouvements", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmouvements;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_mouvement", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateMouvement = 'CURRENT_TIMESTAMP';

    /**
     * @var \Achats
     *
     * @ORM\ManyToOne(targetEntity="Achats")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="achat_id", referencedColumnName="idAchats")
     * })
     */
    private $achat;

    /**
     * @var \Articles
     *
     * @ORM\ManyToOne(targetEntity="Articles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="article_id", referencedColumnName="idArticles")
     * })
     */
    private $article;

    /**
     * @var \TypeMouvement
     *
     * @ORM\ManyToOne(targetEntity="TypeMouvement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_mouvement_id", referencedColumnName="idType_mouvement")
     * })
     */
    private $typeMouvement;

    /**
     * @var \Ventes
     *
     * @ORM\ManyToOne(targetEntity="Ventes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vente_id", referencedColumnName="idVentes")
     * })
     */
    private $vente;

    public function getIdmouvements(): ?int
    {
        return $this->idmouvements;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getDateMouvement(): ?\DateTimeInterface
    {
        return $this->dateMouvement;
    }

    public function setDateMouvement(\DateTimeInterface $dateMouvement): self
    {
        $this->dateMouvement = $dateMouvement;

        return $this;
    }

    public function getAchat(): ?Achats
    {
        return $this->achat;
    }

    public function setAchat(?Achats $achat): self
    {
        $this->achat = $achat;

        return $this;
    }

    public function getArticle(): ?Articles
    {
        return $this->article;
    }

    public function setArticle(?Articles $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getTypeMouvement(): ?TypeMouvement
    {
        return $this->typeMouvement;
    }

    public function setTypeMouvement(?TypeMouvement $typeMouvement): self
    {
        $this->typeMouvement = $typeMouvement;

        return $this;
    }

    public function getVente(): ?Ventes
    {
        return $this->vente;
    }

    public function setVente(?Ventes $vente): self
    {
        $this->vente = $vente;

        return $this;
    }


}
