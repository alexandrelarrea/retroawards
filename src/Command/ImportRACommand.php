<?php

namespace App\Command;

use App\Entity\Achievement;
use App\Entity\Game;
use App\Repository\AchievementRepository;
use App\Repository\ConsoleRepository;
use App\Repository\GameRepository;
use App\Repository\RetroGameRepository;
use App\Service\MediaManager;
use App\Service\RAService;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Validator\Constraints\Date;

class ImportRACommand extends Command {

  protected static $defaultName = 'app:import-ra';
  protected $ras;
  protected $em;
  protected $mediaManager;
  protected $retroGameRepo;
  protected $consoleRepo;
  protected $gameRepo;
  protected $achievementRepo;

  public function __construct(?string $name = null, RAService $ras, ObjectManager $em, MediaManager $mediaManager, RetroGameRepository $retroGameRepo, ConsoleRepository $consoleRepo, GameRepository $gameRepo, AchievementRepository $achievementRepo) {
    parent::__construct($name);
    $this->ras = $ras;
    $this->em = $em;
    $this->mediaManager = $mediaManager;
    $this->retroGameRepo = $retroGameRepo;
    $this->consoleRepo = $consoleRepo;
    $this->gameRepo = $gameRepo;
    $this->achievementRepo = $achievementRepo;
  }

  protected function configure() {
    $this
      ->setDescription('Imports data from Retroachievements API')
      ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
      ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description');
  }

  protected function execute(InputInterface $input, OutputInterface $output) {
    $io = new SymfonyStyle($input, $output);
    $arg1 = $input->getArgument('arg1');

    if ($arg1) {
      $io->note(sprintf('You passed an argument: %s', $arg1));
    }

    if ($input->getOption('option1')) {
      // ...
    }

    $console = $this->consoleRepo->findOneByRetroId(2);
    foreach ($this->retroGameRepo->findAll() as $retroGame) {
      $gameData = $this->ras->getGameInfoExtended($retroGame->getRetroId());
      $io->text($this->cleanField($gameData['Title']) . ' (#' . $this->cleanField($gameData['ID']) . ')');
      $game = $this->gameRepo->findOneByRetroId($this->cleanField($gameData['ID']));
      if ($game === null) {
        $game = new Game();
      }
      $game->setConsole($console)
        ->setRetroId($this->cleanField($gameData['ID']))
        ->setTitle($this->cleanField($gameData['Title']))
        ->setForumId($this->cleanField($gameData['ForumTopicID']))
        ->setGenre($this->cleanField($gameData['Genre']))
        ->setPublisher($this->cleanField($gameData['Publisher']))
        ->setDeveloper($this->cleanField($gameData['Developer']))
        ->setIcon($this->extractFileName($gameData['ImageIcon']))
        ->setBoxArt($this->extractFileName($gameData['ImageBoxArt']))
        ->setTitleScreen($this->extractFileName($gameData['ImageTitle']))
        ->setGameScreen($this->extractFileName($gameData['ImageIngame']))
        ->setTotalAchievements($this->cleanField($gameData['NumAchievements']))
        ->setTotalPlayers($this->cleanField($gameData['NumDistinctPlayersHardcore']))
        ->setReleaseDate($this->cleanField($gameData['Released']));

      foreach ($gameData['Achievements'] as $achievementData) {
        $io->text(' - ' . $this->cleanField($achievementData['Title']) . ' (#' . $this->cleanField($achievementData['ID']) . ')');
        $achievement = $this->achievementRepo->findOneByRetroId($this->cleanField($achievementData['ID']));
        if ($achievement === null) {
          $achievement = new Achievement();
        }
        $achievement->setGame($game)
          ->setRetroId($this->cleanField($achievementData['ID']))
          ->setTitle($this->cleanField($achievementData['Title']))
          ->setDescription($this->cleanField($achievementData['Description']))
          ->setPoints($this->cleanField($achievementData['Points']))
          ->setBadge($this->cleanField($achievementData['BadgeName']))
          ->setTotalAwarded($this->cleanField($achievementData['NumAwardedHardcore']))
          ->setAuthor($this->cleanField($achievementData['Author']));

        $this->mediaManager->downloadAchievementBadges($achievement);

        $this->em->persist($achievement);
      }

      $this->mediaManager->downloadGameImages($game);

      $this->em->persist($game);
      sleep(10);
    }

    $this->em->flush();
  }

  protected function extractFileName($field) {
    $field = $this->cleanField($field);
    if (strrpos($field, '/') !== false) {
      $field = substr($field, strrpos($field, '/') + 1);
    }
    return $field;
  }

  protected function cleanField($field) {
    $field = is_string($field) ? trim($field) : $field;
    return strlen($field) > 0 ? $field : null;
  }
}
