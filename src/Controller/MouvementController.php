<?php
// src/Controller/MouvementController.php

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

class MouvementController extends AbstractController
{
/**
* @Route("/epicerie/mouvement")
*/
  public function movements()
  {
    $entityManager = $this->getDoctrine()->getManager();
    $mouvements = $entityManager->getRepository('App:Mouvements')->findAll();
    $sens = $entityManager->getRepository('App:Sens')->findAll();
    $articles = $entityManager->getRepository('App:Articles')->findAll();
    $categories = $entityManager->getRepository('App:Categorie')->findAll();
    $unites = $entityManager->getRepository('App:Unite')->findAll();
    $fournisseurs = $entityManager->getRepository('App:Fournisseurs')->findAll();
    // dump($mouvements);
    // dump($sens);
    // die;

     if (isset($_POST['envoyer']))
    {
    	$mvt = new Mouvements;
    	$typeMouvement = new TypeMouvement;


    	$type = $entityManager->getRepository('App:TypeMouvement')->findOneByType($_POST['type']);
    	$sens = $entityManager->getRepository('App:Sens')->findOneBySens($_POST['sens']);
    	$mvt->setQuantite($_POST['quantite']);
    	$article = $entityManager->getRepository('App:Articles')->findOneByArticleNom($_POST['article']);

    	$mvt->setArticle($article);
    	$mvt->setTypeMouvement($type);
    	$typeMouvement->setSens($sens);
    	$mvt->setDateMouvement(new \DateTime());

    	$entityManager->persist($mvt);
    	$entityManager->flush();
    }

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

    return $this->render('mouvement.html.twig', [
      'type' => $mouvements,
      'sens' => $sens,
      'article' => $articles,
      'categorie' => $categories,
      'unite' => $unites,
      'fournisseur' => $fournisseurs,
    ]);
  }
}