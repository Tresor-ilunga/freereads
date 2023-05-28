<?php

namespace App\Entity;

use App\Entity\Trait\IdNameTrait;
use App\Repository\StatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatusRepository::class)]
class Status
{
    use IdNameTrait;

    #[ORM\OneToMany(mappedBy: 'status', targetEntity: UserBook::class)]
    private Collection $userBooks;

    public function __construct()
    {
        $this->userBooks = new ArrayCollection();
    }

    /**
     * @return Collection<int, UserBook>
     */
    public function getUserBooks(): Collection
    {
        return $this->userBooks;
    }

    public function addUserBook(UserBook $userBook): self
    {
        if (!$this->userBooks->contains($userBook)) {
            $this->userBooks->add($userBook);
            $userBook->setStatus($this);
        }

        return $this;
    }

    public function removeUserBook(UserBook $userBook): self
    {
        if ($this->userBooks->removeElement($userBook)) {
            // set the owning side to null (unless already changed)
            if ($userBook->getStatus() === $this) {
                $userBook->setStatus(null);
            }
        }

        return $this;
    }
}
