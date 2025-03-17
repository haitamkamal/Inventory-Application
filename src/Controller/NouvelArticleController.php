<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\ArticleType;
use App\Entity\NouvelArticle;


final class NouvelArticleController extends AbstractController
{
    #[Route('/nouvelle/article', name: 'app_nouvelle_article')]
    public function new(Request $request,EntityManagerInterface $manager)
    :Response {
        $NouvelArticle = new NouvelArticle;
        $form = $this ->createForm(ArticleType::class,$NouvelArticle);
        $form = $form->handleRequest($request);

        if($form -> isSubmitted()){
            $manager -> persist($NouvelArticle);
            $manager -> flush();
           
            return $this-> redirectToRoute('app_articles');
        }

        return $this->render('nouvel_article/index.html.twig', [
             'form' => $form->createView(), 
        ]);
    }
}
