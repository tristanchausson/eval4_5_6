<?php
// src/Controller/EpicerieController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EpicerieController extends AbstractController
{
/**
* @Route("/epicerie/accueil")
*/
  public function epicerie()
  {
    // $epicerie = random_int(0, 100);

    return $this->render('accueil.html.twig', [
      // 'epicerie' => $epicerie,
    ]);
  }
}