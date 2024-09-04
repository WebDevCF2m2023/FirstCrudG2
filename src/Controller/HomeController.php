<?php

namespace App\Controller;

# gestionnaire de nos entités
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Article;


class HomeController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(EntityManagerInterface $em): Response
    {
        // on récupère tous les articles
        $articles = $em->getRepository(Article::class)->findAll();
        return $this->render('home/index.html.twig', [
            // variables envoyées à twig
            'titre' => 'Homepage',
            'articles' => $articles,
        ]);
    }
}
