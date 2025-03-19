<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\NouvelArticleRepository;
use App\Entity\NouvelArticle;

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

    #[Route('/articles/{id<\d+>}/supprimer', name: 'articles_delete')]
    public function delete(Request $request, NouvelArticle $nouvelArticle, EntityManagerInterface $manager): Response
    {
        // Handle the POST request (confirmation form submission)
        if ($request->isMethod('POST')) {
            $manager->remove($nouvelArticle);
            $manager->flush();

            // Redirect to the articles list after deletion
            return $this->redirectToRoute('app_articles');
        }

        // Render the confirmation modal for GET requests
        return $this->render('Articles/delete.html.twig', [
            'NouvelleArticle' => $nouvelArticle, // Pass the full article object
        ]);
    }
}