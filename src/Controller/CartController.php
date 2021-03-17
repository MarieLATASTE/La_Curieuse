<?php

namespace App\Controller;

use App\Service\Cart\CartService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart_panier")
     */
    public function panier(CartService $cartService): Response
    {
        return $this->render('cart/panier.html.twig', [
            'item' => $cartService->getFullCart(),
            'total' => $cartService->getTotal()
        ]);
    }
    /**
     * @Route("/cart/add/{id}", name="cart_add")
     */
    public function add($id, CartService $cartService)
    {
        $cartService->add($id);

        return $this->redirectToRoute("cart_panier");
    }
    /**
     * @Route("/cart/remove/{id}", name="cart_remove")
     */
    public function remove($id, CartService $cartService)
    {

        $cartService->remove($id);

        return $this->redirectToRoute("cart_panier");
    }
}
