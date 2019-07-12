<?php

namespace App\Service;

use App\Entity\Game;
use App\Entity\Achievement;

class MediaManager {

  protected $gamePath;
  protected $badgePath;
  protected $raImgUrl;
  protected $raBadgeUrl;

  public function __construct($gamePath, $badgePath, $raImgUrl, $raBadgeUrl) {
    $this->gamePath = $gamePath;
    $this->badgePath = $badgePath;
    $this->raImgUrl = $raImgUrl;
    $this->raBadgeUrl = $raBadgeUrl;
  }

  /**
   * Downloads all game related images, and creates black and white version of game icon
   * @param Game $game
   */
  public function downloadGameImages(Game $game) {
    foreach (['Icon', 'BoxArt', 'TitleScreen', 'GameScreen'] as $field) {
      $image = $game->{'get' . $field}();
      file_put_contents($this->gamePath . '/' . $image, file_get_contents($this->raImgUrl . '/' . $image));
    }
    $icon = imagecreatefrompng($this->gamePath . '/' . $game->getIconImage());
    if ($icon && imagefilter($icon, IMG_FILTER_GRAYSCALE)) {
      imagepng($icon, $this->gamePath . '/' . $game->getIconImage(true));
      imagedestroy($icon);
    }
  }

  /**
   * Downloads achievement related icons
   * @param Achievement $achievement
   */
  public function downloadAchievementBadges(Achievement $achievement) {
    foreach (['unlocked', 'locked'] as $type) {
      $badge = $achievement->getBadgeImage($type == 'locked');
      file_put_contents($this->badgePath . '/' . $badge, file_get_contents($this->raBadgeUrl . '/' . $badge));
    }
  }
}
