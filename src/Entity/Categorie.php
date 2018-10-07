<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="Categorie", uniqueConstraints={@ORM\UniqueConstraint(name="idCategorie_UNIQUE", columns={"idCategorie"})})
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 */
class Categorie
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCategorie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie_nom", type="string", length=45, nullable=false)
     */
    private $categorieNom;

    public function getIdcategorie(): ?int
    {
        return $this->idcategorie;
    }

    public function getCategorieNom(): ?string
    {
        return $this->categorieNom;
    }

    public function setCategorieNom(string $categorieNom): self
    {
        $this->categorieNom = $categorieNom;

        return $this;
    }


}
