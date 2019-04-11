<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AchievementRepository")
 */
class Achievement {

  /**
   * @ORM\Id()
   * @ORM\GeneratedValue()
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\ManyToOne(targetEntity="App\Entity\Game", inversedBy="achievements")
   * @ORM\JoinColumn(nullable=false)
   */
  private $game;

  /**
   * @ORM\Column(type="integer", nullable=true)
   */
  private $retroId;

  /**
   * @ORM\Column(type="integer")
   */
  private $points;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $badgeEarned;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $badgeLocked;

  /**
   * @ORM\Column(type="datetime")
   */
  private $createdAt;

  /**
   * @ORM\Column(type="datetime")
   */
  private $updatedAt;

  /**
   * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="achievements")
   */
  private $users;

  public function __construct() {
    $this->users = new ArrayCollection();
  }

  public function getId(): ?int {
    return $this->id;
  }

  public function getGame(): ?Game {
    return $this->game;
  }

  public function setGame(?Game $game): self {
    $this->game = $game;

    return $this;
  }

  public function getRetroId(): ?int {
    return $this->retroId;
  }

  public function setRetroId(?int $retroId): self {
    $this->retroId = $retroId;

    return $this;
  }

  public function getPoints(): ?int {
    return $this->points;
  }

  public function setPoints(int $points): self {
    $this->points = $points;

    return $this;
  }

  public function getBadgeEarned(): ?string {
    return $this->badgeEarned;
  }

  public function setBadgeEarned(string $badgeEarned): self {
    $this->badgeEarned = $badgeEarned;

    return $this;
  }

  public function getBadgeLocked(): ?string {
    return $this->badgeLocked;
  }

  public function setBadgeLocked(string $badgeLocked): self {
    $this->badgeLocked = $badgeLocked;

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
   * @return Collection|User[]
   */
  public function getUsers(): Collection {
    return $this->users;
  }

  public function addUser(User $user): self {
    if (! $this->users->contains($user)) {
      $this->users[] = $user;
      $user->addAchievement($this);
    }

    return $this;
  }

  public function removeUser(User $user): self {
    if ($this->users->contains($user)) {
      $this->users->removeElement($user);
      $user->removeAchievement($this);
    }

    return $this;
  }
}
