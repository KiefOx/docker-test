<?php

namespace App\Controller;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    public function __construct(
        private EntityManagerInterface $em
    )
    {
    }

    #[Route(['', '/'], name: 'home')]
    public function index(): Response
    {

        $posts = $this->em->getRepository(Post::class)->findAll();

        return $this->render('home/index.html.twig', [
            'posts' => $posts
        ]);
    }
}
