<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GameRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Game {

  /**
   * @ORM\Id()
   * @ORM\GeneratedValue()
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\ManyToOne(targetEntity="App\Entity\Console", inversedBy="games")
   * @ORM\JoinColumn(nullable=false)
   */
  private $console;

  /**
   * @ORM\Column(type="integer", nullable=true)
   */
  private $retroId;

  /**
   * @ORM\Column(type="integer", nullable=true)
   */
  private $forumId;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $title;

  /**
   * @ORM\Column(type="text", nullable=true)
   */
  private $description;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $genre;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $publisher;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $developer;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $icon;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $boxArt;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $titleScreen;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $gameScreen;

  /**
   * @ORM\Column(type="integer")
   */
  private $totalAchievements;

  /**
   * @ORM\Column(type="integer", nullable=true)
   */
  private $totalPlayers;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $releaseDate;

  /**
   * @ORM\Column(type="datetime")
   */
  private $createdAt;

  /**
   * @ORM\Column(type="datetime")
   */
  private $updatedAt;

  /**
   * @ORM\OneToMany(targetEntity="App\Entity\Achievement", mappedBy="game", orphanRemoval=true)
   */
  private $achievements;

  public function __construct() {
    $this->achievements = new ArrayCollection();
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

  public function getConsole(): ?Console {
    return $this->console;
  }

  public function setConsole(?Console $console): self {
    $this->console = $console;

    return $this;
  }

  public function getRetroId(): ?int {
    return $this->retroId;
  }

  public function setRetroId(?int $retroId): self {
    $this->retroId = $retroId;

    return $this;
  }

  public function getForumId(): ?int {
    return $this->forumId;
  }

  public function setForumId(?int $forumId): self {
    $this->forumId = $forumId;

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

  public function setDescription(?string $description): self {
    $this->description = $description;

    return $this;
  }

  public function getGenre(): ?string {
    return $this->genre;
  }

  public function setGenre(?string $genre): self {
    $this->genre = $genre;

    return $this;
  }

  public function getPublisher(): ?string {
    return $this->publisher;
  }

  public function setPublisher(?string $publisher): self {
    $this->publisher = $publisher;

    return $this;
  }

  public function getDeveloper(): ?string {
    return $this->developer;
  }

  public function setDeveloper(?string $developer): self {
    $this->developer = $developer;

    return $this;
  }

  public function getIcon(): ?string {
    return $this->icon;
  }

  public function setIcon(string $icon): self {
    $this->icon = $icon;

    return $this;
  }

  public function getBoxArt(): ?string {
    return $this->boxArt;
  }

  public function setBoxArt(string $boxArt): self {
    $this->boxArt = $boxArt;

    return $this;
  }

  public function getTitleScreen(): ?string {
    return $this->titleScreen;
  }

  public function setTitleScreen(?string $titleScreen): self {
    $this->titleScreen = $titleScreen;

    return $this;
  }

  public function getGameScreen(): ?string {
    return $this->gameScreen;
  }

  public function setGameScreen(?string $gameScreen): self {
    $this->gameScreen = $gameScreen;

    return $this;
  }

  public function getTotalAchievements(): ?int {
    return $this->totalAchievements;
  }

  public function setTotalAchievements(int $totalAchievements): self {
    $this->totalAchievements = $totalAchievements;

    return $this;
  }

  public function getTotalPlayers(): ?int {
    return $this->totalPlayers;
  }

  public function setTotalPlayers(?int $totalPlayers): self {
    $this->totalPlayers = $totalPlayers;

    return $this;
  }

  public function getReleaseDate(): ?string {
    return $this->releaseDate;
  }

  public function setReleaseDate(?string $releaseDate): self {
    $this->releaseDate = $releaseDate;

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
      $achievement->setGame($this);
    }

    return $this;
  }

  public function removeAchievement(Achievement $achievement): self {
    if ($this->achievements->contains($achievement)) {
      $this->achievements->removeElement($achievement);
      // set the owning side to null (unless already changed)
      if ($achievement->getGame() === $this) {
        $achievement->setGame(null);
      }
    }

    return $this;
  }
}
