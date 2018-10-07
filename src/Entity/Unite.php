<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Unite
 *
 * @ORM\Table(name="Unite", uniqueConstraints={@ORM\UniqueConstraint(name="idUnite_UNIQUE", columns={"idUnite"})})
 * @ORM\Entity(repositoryClass="App\Repository\UniteRepository")
 */
class Unite
{
    /**
     * @var int
     *
     * @ORM\Column(name="idUnite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idunite;

    /**
     * @var string
     *
     * @ORM\Column(name="unite_type", type="string", length=45, nullable=false)
     */
    private $uniteType;

    public function getIdunite(): ?int
    {
        return $this->idunite;
    }

    public function getUniteType(): ?string
    {
        return $this->uniteType;
    }

    public function setUniteType(string $uniteType): self
    {
        $this->uniteType = $uniteType;

        return $this;
    }


}
