<?php

namespace App\Controller;

// Import necessary classes
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\NouvelleCategorie;
use App\Repository\NouvelleCategorieRepository;

// Final class to prevent inheritance
final class CatégoriesController extends AbstractController
{
    /**
     * Displays the list of categories.
     *
     * @Route("/categories", name="app_categories")
     */
    #[Route('/categories', name: 'app_categories')]
    public function index(NouvelleCategorieRepository $repository): Response
    {
        // Fetch all categories from the database using the repository
        $categories = $repository->findAll();

        // Render the index template and pass the categories to it
        return $this->render('catégories/index.html.twig', [
            'NouvelleCategories' => $categories, // Send categories to the template
        ]);
    }

    /**
     * Displays a single category by its ID.
     *
     * @Route("/categories/{id}", name="app_categories_show")
     */
    #[Route('/categories/{id}', name: 'app_categories_show')]
    public function show(NouvelleCategorie $NouvelleCategorie): Response
    {
        // Render the show template and pass the selected category to it
        return $this->render('catégories/show.html.twig', [
            'NouvelleCategorie' => $NouvelleCategorie, // Send single category to the template
        ]);
    }
}
