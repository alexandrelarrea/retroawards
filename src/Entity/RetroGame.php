<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RetroGameRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class RetroGame {

  /**
   * @ORM\Id()
   * @ORM\GeneratedValue()
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="integer")
   */
  private $retroId;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $name;

  /**
   * @ORM\Column(type="datetime")
   */
  private $createdAt;

  /**
   * @ORM\Column(type="datetime")
   */
  private $updatedAt;

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

  public function setRetroId(int $retroId): self {
    $this->retroId = $retroId;

    return $this;
  }

  public function getName(): ?string {
    return $this->name;
  }

  public function setName(string $name): self {
    $this->name = $name;

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
}
