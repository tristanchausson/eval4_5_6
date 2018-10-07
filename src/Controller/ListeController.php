<?php
// src/Controller/ListeController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Articles;
use App\Entity\Fournisseurs;

class ListeController extends AbstractController
{
/**
* @Route("/epicerie/liste")
*/	
  public function getArticlesList()
  {
    $entityManager = $this->getDoctrine()->getManager();
    $articles = $entityManager->getRepository('App:Articles')->findAll();
    $fournisseurs = $entityManager->getRepository('App:Fournisseurs')->findAll();
    // dump($articles);
    // die;

    if (isset($_POST['supprimer']))
    {
      $article = $entityManager->getRepository('App:Articles')->findOneByArticleNom($_POST['supprimer']);

      $fournisseur->removeArticle($article);
      $entityManager->flush();
    }
    
    return $this->render('liste.html.twig', [
      'articles' => $articles,
    ]);
  }
}