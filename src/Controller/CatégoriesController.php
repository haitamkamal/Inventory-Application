<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\NouvelleCategorie;
use App\Repository\NouvelleCategorieRepository;
use App\Repository\NouvelArticleRepository;


final class CatégoriesController extends AbstractController
{

    #[Route('/categories', name: 'app_categories')]
    public function index(NouvelleCategorieRepository $repository): Response
    {
       
        $categories = $repository->findAll();

        
        return $this->render('catégories/index.html.twig', [
            'NouvelleCategories' => $categories, 
        ]);
    }

 
 #[Route('/categories/{id}', name: 'app_categories_show')]
public function show(NouvelleCategorie $nouvelleCategorie, NouvelArticleRepository $articleRepository): Response
{
    // Fetch articles related to the selected category
    $articles = $articleRepository->findBy(['categorie' => $nouvelleCategorie]);

    // You can either fetch a single article if you intend to display one
    // Example: $article = $articleRepository->findOneBy(['categorie' => $nouvelleCategorie]);

    return $this->render('catégories/show.html.twig', [
        'NouvelleCategorie' => $nouvelleCategorie,  // Pass the selected category
        'articles' => $articles,  // Pass the related articles to the template
    ]);
}


}
