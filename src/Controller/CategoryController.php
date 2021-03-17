<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{id}", name="category_show")
     */

    public function show(int $id, CategoryRepository $repository): Response
    {
        $repository = $this->getDoctrine()->getRepository(Category::class);

        // look for a single Product by its primary key (usually "id")
        $category = $repository->find($id);

        $articles = $category->getArticles();

        return $this->render('category/show.html.twig', [
            'category' => $category,
            'articles' => $articles,
        ]);
    }
}
