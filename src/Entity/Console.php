<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConsoleRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Console {

  /**
   * @ORM\Id()
   * @ORM\GeneratedValue()
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="integer", nullable=true)
   */
  private $retroId;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $title;

  /**
   * @ORM\Column(type="text", nullable=true)
   */
  private $description;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $icon;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $logo;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $image;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $slug;

  /**
   * @ORM\Column(type="datetime")
   */
  private $createdAt;

  /**
   * @ORM\Column(type="datetime")
   */
  private $updatedAt;

  /**
   * @ORM\OneToMany(targetEntity="App\Entity\Game", mappedBy="console")
   */
  private $games;

  public function __construct() {
    $this->games = new ArrayCollection();
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

  public function setDescription(?string $description): self {
    $this->description = $description;

    return $this;
  }

  public function getIcon(): ?string {
    return $this->icon;
  }

  public function setIcon(string $icon): self {
    $this->icon = $icon;

    return $this;
  }

  public function getLogo(): ?string {
    return $this->logo;
  }

  public function setLogo(string $logo): self {
    $this->logo = $logo;

    return $this;
  }

  public function getImage(): ?string {
    return $this->image;
  }

  public function setImage(string $image): self {
    $this->image = $image;

    return $this;
  }

  public function getSlug(): ?string {
    return $this->slug;
  }

  public function setSlug(string $slug): self {
    $this->slug = $slug;

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
   * @return Collection|Game[]
   */
  public function getGames(): Collection {
    return $this->games;
  }

  public function addGame(Game $game): self {
    if (! $this->games->contains($game)) {
      $this->games[] = $game;
      $game->setConsole($this);
    }

    return $this;
  }

  public function removeGame(Game $game): self {
    if ($this->games->contains($game)) {
      $this->games->removeElement($game);
      // set the owning side to null (unless already changed)
      if ($game->getConsole() === $this) {
        $game->setConsole(null);
      }
    }

    return $this;
  }
}
