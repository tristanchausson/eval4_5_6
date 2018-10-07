<?php
// src/Controller/HistoriqueController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Articles;
use App\Entity\Mouvements;
use App\Entity\TypeMouvement;
use App\Entity\Sens;
use App\Entity\Categorie;

class HistoriqueController extends AbstractController
{
/**
* @Route("/epicerie/historique")
*/

  public function getHistory()
  {
	$entityManager = $this->getDoctrine()->getManager();
    $historique = $entityManager->getRepository('App:Mouvements')->findSorted();
    // dump($historique);
    // die;
  
    return $this->render('historique.html.twig', [
		'historique' => $historique,
    ]);
    
  }
}
