<?php
// src/Controller/ListeController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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

    if (isset($_POST['supprimer']))
    {
      $article = $entityManager->getRepository('App:Articles')->findOneByArticleNom($_POST['supprimer']);

      try {
        $entityManager->remove($article);
        $entityManager->flush();

      }catch (\Exception $e){
        echo('Impossible de supprimer l\'article car il est contenu dans un mouvement');
        // echo $e->getMessage();
        // $this->addFlash('error', 'Impossible de supprimer l\'article car il est contenu dans un mouvement');
      }
    }
    
    $articles = $entityManager->getRepository('App:Articles')->findAll();

    return $this->render('liste.html.twig', [
      'articles' => $articles,
    ]);
  }
}