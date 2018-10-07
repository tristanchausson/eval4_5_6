<?php
// src/Controller/CreerController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreerController extends AbstractController
{
/**
* @Route("/epicerie/creer")
*/
  public function number()
  {
    $number = random_int(0, 100);

    return $this->render('creer.html.twig', [
      // 'number' => $number,
    ]);
  }
}