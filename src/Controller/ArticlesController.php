<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\NouvelArticleRepository;

final class ArticlesController extends AbstractController
{
    #[Route('/articles', name: 'app_articles')]
    public function index(NouvelArticleRepository $repository): Response
    {
      
        $articles = $repository->findAll();
        
        
        return $this->render('Articles/index.html.twig', [
            'NouvelleArticles' => $articles, 
        ]);
    }
}
