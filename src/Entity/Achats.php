<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Achats
 *
 * @ORM\Table(name="Achats", uniqueConstraints={@ORM\UniqueConstraint(name="idAchats_UNIQUE", columns={"idAchats"})}, indexes={@ORM\Index(name="fk_fournisseur_id_idx", columns={"fournisseur_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\AchatsRepository")
 */
class Achats
{
    /**
     * @var int
     *
     * @ORM\Column(name="idAchats", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idachats;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_achat", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateAchat = 'CURRENT_TIMESTAMP';

    /**
     * @var \Fournisseurs
     *
     * @ORM\ManyToOne(targetEntity="Fournisseurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fournisseur_id", referencedColumnName="idFournisseurs")
     * })
     */
    private $fournisseur;

    public function getIdachats(): ?int
    {
        return $this->idachats;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->dateAchat;
    }

    public function setDateAchat(\DateTimeInterface $dateAchat): self
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    public function getFournisseur(): ?Fournisseurs
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseurs $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }


}
