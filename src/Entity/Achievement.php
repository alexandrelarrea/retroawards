<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AchievementRepository")
 * @ORM\HasLifecycleCallbacks()
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
   * @ORM\Column(type="string", length=255)
   */
  private $title;

  /**
   * @ORM\Column(type="text")
   */
  private $description;

  /**
   * @ORM\Column(type="integer")
   */
  private $points;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $badge;

  /**
   * @ORM\Column(type="integer", nullable=true)
   */
  private $totalAwarded;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $author;

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

  /**
   * @ORM\PrePersist
   */
  public function prePersist() {
    $this->createdAt = new \DateTime();
    $this->updatedAt = new \DateTime();
  }

  /**
   * @ORM\PreUpdate
   */
  public function preUpdate() {
    $this->updatedAt = new \DateTime();
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

  public function getTitle(): ?string {
    return $this->title;
  }

  public function setTitle(string $title): self {
    $this->title = $title;

    return $this;
  }

  public function getDescription(): ?string {
    return $this->description;
  }

  public function setDescription(string $description): self {
    $this->description = $description;

    return $this;
  }

  public function getPoints(): ?int {
    return $this->points;
  }

  public function setPoints(int $points): self {
    $this->points = $points;

    return $this;
  }

  public function getBadge(): ?string {
    return $this->badge;
  }

  public function setBadge(string $badge): self {
    $this->badge = $badge;

    return $this;
  }

  public function getTotalAwarded(): ?int {
    return $this->totalAwarded;
  }

  public function setTotalAwarded(?int $totalAwarded): self {
    $this->totalAwarded = $totalAwarded;

    return $this;
  }

  public function getAuthor(): ?string {
    return $this->author;
  }

  public function setAuthor(?string $author): self {
    $this->author = $author;

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
