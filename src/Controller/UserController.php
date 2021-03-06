<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="user")
     */
    public function staff(): Response
    {
        return $this->render('user/staff.html.twig', [
            'message' => 'my Fiends',
            'contact' => 'La Curieuse'
        ]);
    }
}
