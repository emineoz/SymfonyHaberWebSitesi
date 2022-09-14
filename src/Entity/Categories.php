<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
class Categories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $category = null;

    #[ORM\Column(length: 100 ,nullable: true)]
    private ?string $Description = null;

    #[ORM\Column(length: 50 ,nullable: true)]
    private ?string $PostingDate = null;

    #[ORM\Column(length: 15,nullable: true)]
    private ?string $status = null;

    #[ORM\Column(length: 110, nullable: true)]
    private ?string $slug = null;

    #[ORM\OneToMany(mappedBy: 'category_id', targetEntity: Product::class)]
    private Collection $products;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Product::class)]
    private Collection $No;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->No = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getPostingDate(): ?string
    {
        return $this->PostingDate;
    }

    public function setPostingDate(string $PostingDate): self
    {
        $this->PostingDate = $PostingDate;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->setCategoryId($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getCategoryId() === $this) {
                $product->setCategoryId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getNo(): Collection
    {
        return $this->No;
    }

    public function addNo(Product $no): self
    {
        if (!$this->No->contains($no)) {
            $this->No->add($no);
            $no->setCategory($this);
        }

        return $this;
    }

    public function removeNo(Product $no): self
    {
        if ($this->No->removeElement($no)) {
            // set the owning side to null (unless already changed)
            if ($no->getCategory() === $this) {
                $no->setCategory(null);
            }
        }

        return $this;
    }

    public function getTitle()
    {
    }
}
