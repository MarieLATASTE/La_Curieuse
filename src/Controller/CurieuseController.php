<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CurieuseController extends AbstractController
{
    /**
     * @Route("/curieuse", name="curieuse")
     */
    public function liste(ArticleRepository $repo): Response
    {
        $articles = $repo->findAll();
 
        return $this->render('curieuse/liste.html.twig', [
            'collection' => 'Curiosi...quoi?',
            'articles' => $articles
        ]);
    }
    /**
     * @Route("/", name="home")
     */
    public function accueil(CategoryRepository $repo): Response
    {

        $category = $repo->findAll();

        return $this->render('curieuse/home.html.twig', [
           'title' => 'Hello! Hello my Fiends!',
           'subtitle' => 'You are welcome to my place',
           'category' => $category
        ]);
    }
    /**
     * @Route("/curieuse/new", name="curieuse_create")
     */
    public function create(){
        return $this->render('curieuse/create.html.twig');
    }
    /**
     * @Route("/curieuse/{id}", name="curieuse_show")
     */
    public function show(Article $article){

        return $this->render('curieuse/show.html.twig',[
            'article' => $article
        ]);
    }
}
