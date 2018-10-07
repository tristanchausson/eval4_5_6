<?php
// src/Controller/ModifierController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ModifierController extends AbstractController
{
/**
* @Route("/epicerie/modifier")
*/
  public function number()
  {
    $number = random_int(0, 100);

    return $this->render('modifier.html.twig', [
      // 'number' => $number,
    ]);
  }
}