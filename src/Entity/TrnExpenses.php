<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrnExpensesRepository")
 */
class TrnExpenses
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
    private $user_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $reporting_date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $account_id;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=2)
     */
    private $price;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $qty;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $registrate_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $settled_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MstAccount", inversedBy="trnExpenses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $account;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MstUsers", inversedBy="trnExpenses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getReportingDate(): ?\DateTimeInterface
    {
        return $this->reporting_date;
    }

    public function setReportingDate(\DateTimeInterface $reporting_date): self
    {
        $this->reporting_date = $reporting_date;

        return $this;
    }

    public function getAccountId(): ?int
    {
        return $this->account_id;
    }

    public function setAccountId(int $account_id): self
    {
        $this->account_id = $account_id;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getQty(): ?string
    {
        return $this->qty;
    }

    public function setQty(string $qty): self
    {
        $this->qty = $qty;

        return $this;
    }

    public function getRegistrateDate(): ?\DateTimeInterface
    {
        return $this->registrate_date;
    }

    public function setRegistrateDate(\DateTimeInterface $registrate_date): self
    {
        $this->registrate_date = $registrate_date;

        return $this;
    }

    public function getSettledDate(): ?\DateTimeInterface
    {
        return $this->settled_date;
    }

    public function setSettledDate(?\DateTimeInterface $settled_date): self
    {
        $this->settled_date = $settled_date;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getAccount(): ?MstAccount
    {
        return $this->account;
    }

    public function setAccount(?MstAccount $account): self
    {
        $this->account = $account;

        return $this;
    }

    public function getUser(): ?MstUsers
    {
        return $this->user;
    }

    public function setUser(?MstUsers $user): self
    {
        $this->user = $user;

        return $this;
    }
}
