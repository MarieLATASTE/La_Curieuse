<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping\Id;
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
     * @Route("/curieuse/deco/{id}", name="curieuse_deco")
     */
    public function deco(Category $category, $id): Response
    {
     

        return $this->render('curieuse/curieuse_deco.html.twig', [
            'category' => 'hi'
        ]);
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
