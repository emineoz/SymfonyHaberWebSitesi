<?php

namespace App\Entity;

use App\Repository\SettingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SettingRepository::class)]
class Setting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $title = null;

    #[ORM\Column(length: 255,nullable: true)]
    private ?string $keywords = null;

    #[ORM\Column(length: 255,nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 100,nullable: true)]
    private ?string $company = null;

    #[ORM\Column(length: 255,nullable: true)]
    private ?string $adress = null;

    #[ORM\Column(length: 15,nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(length: 15,nullable: true)]
    private ?string $fax = null;

    #[ORM\Column(length: 50,nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $smtpserver = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $smtpemail = null;

    #[ORM\Column(length: 20,nullable: true)]
    private ?string $smtppassword = null;

    #[ORM\Column(nullable: true)]
    private ?int $smtpport = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $aboutus = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $contact = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    public function setKeywords(string $keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSmtpserver(): ?string
    {
        return $this->smtpserver;
    }

    public function setSmtpserver(?string $smtpserver): self
    {
        $this->smtpserver = $smtpserver;

        return $this;
    }

    public function getSmtpemail(): ?string
    {
        return $this->smtpemail;
    }

    public function setSmtpemail(?string $smtpemail): self
    {
        $this->smtpemail = $smtpemail;

        return $this;
    }

    public function getSmtppassword(): ?string
    {
        return $this->smtppassword;
    }

    public function setSmtppassword(string $smtppassword): self
    {
        $this->smtppassword = $smtppassword;

        return $this;
    }

    public function getSmtpport(): ?int
    {
        return $this->smtpport;
    }

    public function setSmtpport(?int $smtpport): self
    {
        $this->smtpport = $smtpport;

        return $this;
    }

    public function getAboutus(): ?string
    {
        return $this->aboutus;
    }

    public function setAboutus(?string $aboutus): self
    {
        $this->aboutus = $aboutus;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
