<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 */
class Player
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
    private $nickname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="integer")
     */
    private $neighborhood;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $trainer_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $trainer_code;

    /**
     * @ORM\Column(type="smallint")
     */
    private $level;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): self
    {
        $this->nickname = $nickname;

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

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getNeighborhood(): ?int
    {
        return $this->neighborhood;
    }

    public function setNeighborhood(int $neighborhood): self
    {
        $this->neighborhood = $neighborhood;

        return $this;
    }

    public function getTrainerName(): ?string
    {
        return $this->trainer_name;
    }

    public function setTrainerName(string $trainer_name): self
    {
        $this->trainer_name = $trainer_name;

        return $this;
    }

    public function getTrainerCode(): ?string
    {
        return $this->trainer_code;
    }

    public function setTrainerCode(string $trainer_code): self
    {
        $this->trainer_code = $trainer_code;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }
}
