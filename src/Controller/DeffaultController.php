<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class DeffaultController extends AbstractController
{
    #[Route('/', name: 'app_deffault')]
    public function index(): Response
    {
        return $this->render('deffault/index.html.twig', [
            'controller_name' => 'DeffaultController',
        ]);
    }
}
