<?php

namespace App\Controller;

// Import necessary classes
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\CategorieType;
use App\Entity\NouvelleCategorie;

// Final class to prevent inheritance
final class NouvelleCategorieController extends AbstractController
{
    /**
     * Handles the creation of a new category.
     *
     * @Route("/nouvelle/catégorie", name="app_nouvelle_catégorie")
     */
    #[Route('/nouvelle/catégorie', name: 'app_nouvelle_catégorie')]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        // Create a new category object
        $NouvelleCategorie = new NouvelleCategorie();
        
        // Create the form and bind it to the category object
        $form = $this->createForm(CategorieType::class, $NouvelleCategorie);
        
        // Handle the request: check if form data has been submitted and map it to the object
        $form->handleRequest($request);

        // Check if form is submitted and valid
        if ($form->isSubmitted() && $form->isValid()) {
            // Persist the new category in the database
            $manager->persist($NouvelleCategorie);
            $manager->flush();
            
            // Redirect to the categories page after successful creation
            return $this->redirectToRoute('app_categories');
        }

        // Render the form view if it's not submitted or invalid
        return $this->render('nouvelle_categorie/index.html.twig', [
            'form' => $form->createView(), // Pass the form view to Twig
        ]);
    }
}
