<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeMouvement
 *
 * @ORM\Table(name="Type_mouvement", uniqueConstraints={@ORM\UniqueConstraint(name="idType_mouvement_UNIQUE", columns={"idType_mouvement"})}, indexes={@ORM\Index(name="fk_send_id_idx", columns={"sens_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\TypeMouvementRepository")
 */
class TypeMouvement
{
    /**
     * @var int
     *
     * @ORM\Column(name="idType_mouvement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtypeMouvement;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45, nullable=false)
     */
    private $type;

    /**
     * @var \Sens
     *
     * @ORM\ManyToOne(targetEntity="Sens")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sens_id", referencedColumnName="idSens")
     * })
     */
    private $sens;

    public function getIdtypeMouvement(): ?int
    {
        return $this->idtypeMouvement;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSens(): ?Sens
    {
        return $this->sens;
    }

    public function setSens(?Sens $sens): self
    {
        $this->sens = $sens;

        return $this;
    }


}
