<?php

namespace App\Entity;

use App\Repository\FriendRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FriendRepository::class)
 */
class Friend
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array")
     */
    private $cars = [];

    public function getCars(): ?array
    {
        return $this->cars;
    }

    public function setCars(array $cars): self
    {
        $this->cars = $cars;

        return $this;
    }

}