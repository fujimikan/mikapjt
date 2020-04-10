<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MikaTbRepository")
 */
class MikaTb
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $mika_cd;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mika_name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMikaCd(): ?int
    {
        return $this->mika_cd;
    }

    public function setMikaCd(?int $mika_cd): self
    {
        $this->mika_cd = $mika_cd;

        return $this;
    }

    public function getMikaName(): ?string
    {
        return $this->mika_name;
    }

    public function setMikaName(?string $mika_name): self
    {
        $this->mika_name = $mika_name;

        return $this;
    }
}
