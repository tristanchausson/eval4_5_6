<?php
// src/Controller/CreerController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Articles;
use App\Entity\Mouvements;
use App\Entity\TypeMouvement;
use App\Entity\Fournisseurs;
use App\Entity\Sens;
use App\Entity\Categorie;
use App\Entity\Unite;

class CreerController extends AbstractController
{
/**
* @Route("/epicerie/creer")
*/
  public function create()
  {
    $entityManager = $this->getDoctrine()->getManager();
    $categories = $entityManager->getRepository('App:Categorie')->findAll();
    $unites = $entityManager->getRepository('App:Unite')->findAll();
    $fournisseurs = $entityManager->getRepository('App:Fournisseurs')->findAll();


    if (isset($_POST['valider']))
    {
    	$article = new Articles;

    	$article->setArticleNom($_POST['nouvelArticle']);
    	$article->setPrixVente($_POST['prixArticle']);

    	$cat = $entityManager->getRepository('App:Categorie')->findOneByCategorieNom($_POST['categorie']);
    	$unite = $entityManager->getRepository('App:Unite')->findOneByUniteType($_POST['unite']);
    	$article->setCategorie($cat);
    	$article->setUnite($unite);
    	$entityManager->persist($article);
    	$entityManager->flush();

    }
    return $this->render('creer.html.twig', [
		'categorie' => $categories,
		'unite' => $unites,
		'fournisseur' => $fournisseurs,
    ]);
  }
}