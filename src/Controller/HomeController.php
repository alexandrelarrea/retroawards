<?php

namespace App\Controller;

use App\Repository\AchievementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {

  /**
   * @Route("/", name="home")
   */
  public function index(AchievementRepository $achievementRepo) {
    return $this->render('home/index.html.twig', ['achievements' => $achievementRepo->findRandomWithLimit(12)]);
  }
}