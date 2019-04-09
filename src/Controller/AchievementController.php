<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AchievementController extends AbstractController {

  /**
   * @Route("/achievement/{id}", name="achievement_show")
   */
  public function show() {
    return $this->render('achievement/show.html.twig');
  }
}
