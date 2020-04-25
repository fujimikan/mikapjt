<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MstUsersRepository")
 */
class MstUsers
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_name;

    /**
     * @ORM\Column(type="integer")
     */
    private $attribute;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TrnExpenses", mappedBy="user")
     */
    private $trnExpenses;

    public function __construct()
    {
        $this->trnExpenses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserName(): ?string
    {
        return $this->user_name;
    }

    public function setUserName(string $user_name): self
    {
        $this->user_name = $user_name;

        return $this;
    }

    public function getAttribute(): ?int
    {
        return $this->attribute;
    }

    public function setAttribute(int $attribute): self
    {
        $this->attribute = $attribute;

        return $this;
    }

    /**
     * @return Collection|TrnExpenses[]
     */
    public function getTrnExpenses(): Collection
    {
        return $this->trnExpenses;
    }

    public function addTrnExpense(TrnExpenses $trnExpense): self
    {
        if (!$this->trnExpenses->contains($trnExpense)) {
            $this->trnExpenses[] = $trnExpense;
            $trnExpense->setUser($this);
        }

        return $this;
    }

    public function removeTrnExpense(TrnExpenses $trnExpense): self
    {
        if ($this->trnExpenses->contains($trnExpense)) {
            $this->trnExpenses->removeElement($trnExpense);
            // set the owning side to null (unless already changed)
            if ($trnExpense->getUser() === $this) {
                $trnExpense->setUser(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getUserName();
    }
}
