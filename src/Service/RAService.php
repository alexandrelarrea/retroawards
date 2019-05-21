<?php

namespace App\Service;

class RAService {

  protected $key;
  protected $url;
  protected $user;

  public function __construct($key, $url, $user) {
    $this->key = $key;
    $this->url = $url;
    $this->user = $user;
  }

  public function getAchievementsEarnedBetween($user, $dateFrom, $dateTo) {
    $dateFrom = date('Y-m-d H:i:s', strtotime($dateFrom));
    $dateTo = date('Y-m-d H:i:s', strtotime($dateTo));
    return $this->getData("API_GetAchievementsEarnedBetween.php", ['u' => $user, 'f' => $dateFrom, 't' => $dateTo]);
  }

  public function getAchievementsEarnedOnDay($user, $day) {
    $day = date('Y-m-d', strtotime($day));
    return $this->getData("API_GetAchievementsEarnedOnDay.php", ['u' => $user, 'd' => $day]);
  }

  public function getConsoleIDs() {
    return $this->getData('API_GetConsoleIDs.php');
  }

  public function getFeedFor($user, $count = 5, $offset = 0) {
    return $this->getData("API_GetFeed.php", ['u' => $user, 'c' => $count, 'o' => $offset]);
  }

  public function getGameInfo($gameId) {
    return $this->getData("API_GetGame.php", ['i' => $gameId]);
  }

  public function getGameInfoAndUserProgress($user, $gameId) {
    return $this->getData("API_GetGameInfoAndUserProgress.php", ['u' => $user, 'g' => $gameId]);
  }

  public function getGameInfoExtended($gameId) {
    return $this->getData("API_GetGameExtended.php", ['i' => $gameId]);
  }

  public function getGameList($consoleId) {
    return $this->getData("API_GetGameList.php", ['i' => $consoleId]);
  }

  public function getTopTenUsers() {
    return $this->getData('API_GetTopTenUsers.php');
  }

  public function getUser() {
    return $this->user;
  }

  public function getUserProgress($user, $games = []) {
    $games = implode(',', $games);
    return $this->getData("API_GetUserProgress.php", ['u' => $user, 'i' => $games]);
  }

  public function getUserRankAndScore($user) {
    return $this->getData("API_GetUserRankAndScore.php", ['u' => $user]);
  }

  public function getUserRecentlyPlayedGames($user, $count = 5, $offset = 0) {
    return $this->getData("API_GetUserRecentlyPlayedGames.php", ['u' => $user, 'c' => $count, 'o' => $offset]);
  }

  public function getUserSummary($user, $numRecentGames = 5) {
    return $this->getData("API_GetUserSummary.php", ['u' => $user, 'g' => $numRecentGames, 'a' => 5]);
  }

  protected function getAuthParams() {
    return ['z' => $this->user, 'y' => $this->key];
  }

  protected function getData($path, $params = []) {
    $params = array_merge($this->getAuthParams(), $params);
    $data = file_get_contents($this->url . '/' . $path . '?' . http_build_query($params));
    return json_decode($data, true);
  }
}
