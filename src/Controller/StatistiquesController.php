<?php
// src/Controller/StatistiquesController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Articles;
use App\Entity\Mouvements;
use App\Entity\TypeMouvement;
use App\Entity\Sens;
use App\Entity\Categorie;

class StatistiquesController extends AbstractController
{
/**
* @Route("/epicerie/statistiques")
*/
  public function statistiques()
  {
	$entityManager = $this->getDoctrine()->getManager();
    $mouvements = $entityManager->getRepository('App:Mouvements')->findByTypeMouvement(1);
    $articles = $entityManager->getRepository('App:Articles')->findAll();
    $categories = $entityManager->getRepository('App:Categorie')->findAll();
    
    $total = 0;
    
    foreach($mouvements as  $mouvement) {
    	foreach ($articles as $article) {
    		if($article === $mouvement->getArticle())
    		{
    			$total += ($mouvement->getQuantite()*$article->getPrixVente());
    		}
    	}
    }

    $totalActuel = 0;
    $totalCategorie = [];

	foreach ($categories as $categorie) {
	    foreach ($articles as $article) {
    		if($categorie === $article->getCategorie())
    		{
    			foreach($mouvements as  $mouvement) {
			    		if($article === $mouvement->getArticle())
			    		{
			    			$totalActuel += ($mouvement->getQuantite()*$article->getPrixVente());
			    		}
			    }
    		}
    	}
    	$totalCategorie[$categorie->getCategorieNom()]=$totalActuel;
    	$totalActuel = 0;
    	// dump($totalCategorie);

	}

    // dump($total);
    // dump($totalCategorie);
    // die;

    return $this->render('statistiques.html.twig', [
      'total' => $total,
      'totalCat' => $totalCategorie
    ]);
  }
}