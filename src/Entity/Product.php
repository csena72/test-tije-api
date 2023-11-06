<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;

use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ApiResource(
    operations: [        
        new GetCollection(),
    ],
    normalizationContext: ['groups' => ['read']],
    paginationItemsPerPage: 50,
)]
#[ApiFilter(SearchFilter::class, properties: [
    'supplier_id'   => 'exact',    
])]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read'])]
    private ?int $id = null;

    #[ORM\Column]     
    private ?int $supplier_id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read'])]    
    private ?string $name = null;

    #[ORM\Column(length: 1024, nullable: true)]
    #[Groups(['read'])]
    private ?string $short_description = null;

    #[ORM\Column(length: 20)]
    #[Groups(['read'])]
    private ?string $status = null;

    #[ORM\Column]
    #[Groups(['read'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['read'])]        
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: ProductMedia::class)]
    #[Groups(['read'])]        
    private Collection $media;

    public function __construct()
    {
        $this->media = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSupplierId(): ?int
    {
        return $this->supplier_id;
    }

    public function setSupplierId(int $supplier_id): static
    {
        $this->supplier_id = $supplier_id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->short_description;
    }

    public function setShortDescription(?string $short_description): static
    {
        $this->short_description = $short_description;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, ProductMedia>
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedium(ProductMedia $medium): static
    {
        if (!$this->media->contains($medium)) {
            $this->media->add($medium);
            $medium->setProduct($this);
        }

        return $this;
    }

    public function removeMedium(ProductMedia $medium): static
    {
        if ($this->media->removeElement($medium)) {
            // set the owning side to null (unless already changed)
            if ($medium->getProduct() === $this) {
                $medium->setProduct(null);
            }
        }

        return $this;
    }
}
