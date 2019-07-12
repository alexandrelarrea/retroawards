<?php

namespace App\Controller;

use App\Entity\Achievement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AchievementController extends AbstractController {

  /**
   * @Route("/achievement/{id}", name="achievement_show")
   */
  public function show(Achievement $achievement) {
    return $this->render('achievement/show.html.twig', compact('achievement'));
  }
}
