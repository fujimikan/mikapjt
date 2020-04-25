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
     * @ORM\Column(type="string", length=255)
     */
    private $account_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $reporting_date;

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

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAccountName(): ?string
    {
        return $this->account_name;
    }

    public function setAccountName(string $account_name): self
    {
        $this->account_name = $account_name;

        return $this;
    }

    public function getUserId(): ?string
    {
        return $this->user_id;
    }

    public function setUserId(string $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

}
