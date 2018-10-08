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
  public function modify()
  {
    $entityManager = $this->getDoctrine()->getManager();
    $categories = $entityManager->getRepository('App:Categorie')->findAll();
    $unites = $entityManager->getRepository('App:Unite')->findAll();
    $fournisseurs = $entityManager->getRepository('App:Fournisseurs')->findAll();

   	if (isset($_GET['a'])) {
   		$article = $entityManager->getRepository('App:Articles')->findOneByIdarticles($_GET['a']);
   	}

    if (isset($_POST['valider']))
    {
   		$article = $entityManager->getRepository('App:Articles')->findOneByIdarticles($_GET['a']);

    	$article->setArticleNom($_POST['nouvelArticle']);
    	$article->setPrixVente($_POST['prixArticle']);

    	$cat = $entityManager->getRepository('App:Categorie')->findOneByCategorieNom($_POST['categorie']);
    	$unite = $entityManager->getRepository('App:Unite')->findOneByUniteType($_POST['unite']);
    	$article->setCategorie($cat);
    	$article->setUnite($unite);
    	
    	$entityManager->persist($article);
    	$entityManager->flush();

    }

    return $this->render('modifier.html.twig', [
		'cat' => $article->getCategorie()->getCategorieNom(),
		'unit' => $article->getUnite()->getUniteType(),
		'frs' => $article->getFournisseur()[0]->getfournisseurNom(),
		'nom' => $article->getArticleNom(),
		'prix' => $article->getPrixVente(),
		'categorie' => $categories,
		'unite' => $unites,
		'fournisseur' => $fournisseurs,
    ]);
  }
}