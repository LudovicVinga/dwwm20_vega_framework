<?php
namespace App\Controller;

use AttributesRouter\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use VegaCore\AbstractController\AbstractController;

class WelcomeController extends AbstractController
{

    #[Route('/', name: 'app_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

    #[Route('/article/{id<\d+>}', name: 'app_show', methods: ['GET'])]
    public function show(int $id): Response
    {
        return new Response("article {$id}");
    }
}