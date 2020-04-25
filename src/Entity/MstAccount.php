<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MstAccountRepository")
 */
class MstAccount
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $account_code;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $sub_account_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $account_name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TrnExpenses", mappedBy="account")
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

    public function getAccountCode(): ?string
    {
        return $this->account_code;
    }

    public function setAccountCode(string $account_code): self
    {
        $this->account_code = $account_code;

        return $this;
    }

    public function getSubAccountCode(): ?string
    {
        return $this->sub_account_code;
    }

    public function setSubAccountCode(string $sub_account_code): self
    {
        $this->sub_account_code = $sub_account_code;

        return $this;
    }

    public function getAccountName(): ?string
    {
        return $this->account_name;
    }

    public function setAccountName(string $account_name): self
    {
        $this->account_name = $account_name;

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
            $trnExpense->setAccount($this);
        }

        return $this;
    }

    public function removeTrnExpense(TrnExpenses $trnExpense): self
    {
        if ($this->trnExpenses->contains($trnExpense)) {
            $this->trnExpenses->removeElement($trnExpense);
            // set the owning side to null (unless already changed)
            if ($trnExpense->getAccount() === $this) {
                $trnExpense->setAccount(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getAccountName();
    }
}
