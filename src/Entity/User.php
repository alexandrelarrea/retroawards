<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User {

  /**
   * @ORM\Id()
   * @ORM\GeneratedValue()
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $name;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $retroName;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $email;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $password;

  /**
   * @ORM\Column(type="integer", nullable=true)
   */
  private $points;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $avatar;

  /**
   * @ORM\Column(type="datetime", nullable=true)
   */
  private $lastLoginAt;

  /**
   * @ORM\Column(type="datetime")
   */
  private $createdAt;

  /**
   * @ORM\Column(type="datetime")
   */
  private $updatedAt;

  /**
   * @ORM\ManyToMany(targetEntity="App\Entity\Achievement", inversedBy="users")
   */
  private $achievements;

  public function __construct() {
    $this->achievements = new ArrayCollection();
  }

  public function getId(): ?int {
    return $this->id;
  }

  public function getName(): ?string {
    return $this->name;
  }

  public function setName(string $name): self {
    $this->name = $name;

    return $this;
  }

  public function getRetroName(): ?string {
    return $this->retroName;
  }

  public function setRetroName(?string $retroName): self {
    $this->retroName = $retroName;

    return $this;
  }

  public function getEmail(): ?string {
    return $this->email;
  }

  public function setEmail(string $email): self {
    $this->email = $email;

    return $this;
  }

  public function getPassword(): ?string {
    return $this->password;
  }

  public function setPassword(string $password): self {
    $this->password = $password;

    return $this;
  }

  public function getPoints(): ?int {
    return $this->points;
  }

  public function setPoints(?int $points): self {
    $this->points = $points;

    return $this;
  }

  public function getAvatar(): ?string {
    return $this->avatar;
  }

  public function setAvatar(?string $avatar): self {
    $this->avatar = $avatar;

    return $this;
  }

  public function getLastLoginAt(): ?\DateTimeInterface {
    return $this->lastLoginAt;
  }

  public function setLastLoginAt(?\DateTimeInterface $lastLoginAt): self {
    $this->lastLoginAt = $lastLoginAt;

    return $this;
  }

  public function getCreatedAt(): ?\DateTimeInterface {
    return $this->createdAt;
  }

  public function setCreatedAt(\DateTimeInterface $createdAt): self {
    $this->createdAt = $createdAt;

    return $this;
  }

  public function getUpdatedAt(): ?\DateTimeInterface {
    return $this->updatedAt;
  }

  public function setUpdatedAt(\DateTimeInterface $updatedAt): self {
    $this->updatedAt = $updatedAt;

    return $this;
  }

  /**
   * @return Collection|Achievement[]
   */
  public function getAchievements(): Collection {
    return $this->achievements;
  }

  public function addAchievement(Achievement $achievement): self {
    if (! $this->achievements->contains($achievement)) {
      $this->achievements[] = $achievement;
    }

    return $this;
  }

  public function removeAchievement(Achievement $achievement): self {
    if ($this->achievements->contains($achievement)) {
      $this->achievements->removeElement($achievement);
    }

    return $this;
  }
}
