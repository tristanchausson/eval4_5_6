<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sens
 *
 * @ORM\Table(name="Sens", uniqueConstraints={@ORM\UniqueConstraint(name="idSens_UNIQUE", columns={"idSens"})})
 * @ORM\Entity(repositoryClass="App\Repository\SensRepository")
 */
class Sens
{
    /**
     * @var int
     *
     * @ORM\Column(name="idSens", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsens;

    /**
     * @var string
     *
     * @ORM\Column(name="sens", type="string", nullable=false)
     */
    private $sens;

    public function getIdsens(): ?int
    {
        return $this->idsens;
    }

    public function getSens(): ?string
    {
        return $this->sens;
    }

    public function setSens(string $sens): self
    {
        $this->sens = $sens;

        return $this;
    }


}
