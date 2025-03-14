<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class NouvelArticleController extends AbstractController
{
    #[Route('/nouvel/article', name: 'app_nouvel_article')]
    public function index(): Response
    {
        return $this->render('nouvel_article/index.html.twig', [
            'controller_name' => 'NouvelArticleController',
        ]);
    }
}
