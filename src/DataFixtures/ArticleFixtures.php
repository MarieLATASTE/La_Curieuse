<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //create 3 categories
        for($i = 1; $i <= 3; $i++){
            $category = new Category();
            $category->setDesignation('designation'.$i);
            $category->setDescription('description'.$i);
            $category->setImage('image'.$i);

            $manager->persist($category);
        }

        //create 3 articles
        for($j = 1; $j <= 3; $j++){
            $article = new Article(1);
            $article->setReference(10.00)
                    ->setDesignation("Designation of the article n°$j")
                    ->setSlug("Slug of the article n°$j")
                    ->setDescription("Description of the article n°$j")
                    ->setImage("https://cdn.pixabay.com/photo/2016/09/12/20/17/robot-1665620__180.png")
                    ->setPrice(10.00)
                    ->setQuantity(9)
                    ->setCategory($category);

            $manager->persist($article);
        }

        $manager->flush();
    }
}
