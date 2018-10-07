<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ventes
 *
 * @ORM\Table(name="Ventes", uniqueConstraints={@ORM\UniqueConstraint(name="idVentes_UNIQUE", columns={"idVentes"})})
 * @ORM\Entity(repositoryClass="App\Repository\VentesRepository")
 */
class Ventes
{
    /**
     * @var int
     *
     * @ORM\Column(name="idVentes", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idventes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_vente", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateVente = 'CURRENT_TIMESTAMP';

    public function getIdventes(): ?int
    {
        return $this->idventes;
    }

    public function getDateVente(): ?\DateTimeInterface
    {
        return $this->dateVente;
    }

    public function setDateVente(\DateTimeInterface $dateVente): self
    {
        $this->dateVente = $dateVente;

        return $this;
    }


}
