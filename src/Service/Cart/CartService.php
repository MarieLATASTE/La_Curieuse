<?php

namespace App\Service\Cart;

use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService {

    protected $session;
    protected $articleRepository;

    public function __construct(SessionInterface $session, ArticleRepository $articleRepository)
    {
        $this->session = $session;
        $this->articleRepository = $articleRepository;
    }

    public function add(int $id)
    {
        $cart = $this->session->get('cart', []);

        if(!empty($cart[$id])) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }

        $this->session->set('cart', $cart);
    }

    public function remove(int $id)
    {               
        $cart = $this->session->get('cart', []);

        if(!empty($cart[$id])) {
            unset($cart[$id]);
        }
        
       $this->session->set('cart', $cart);
    }

    public function getFullCart() : array
    {       
        $cart = $this->session->get('cart', []);

        $cartWidthData = [];

        foreach($cart as $id => $quantity) {
            $cartWidthData[] = [
                'article' => $this->articleRepository->find($id),
                'quantity' => $quantity
            ];
        }
        return $cartWidthData;
    }


    public function getTotal() : float
{
        $total = 0;

        foreach($this->getFullCart() as $item) {
            $total = $item['article']->getPrice() * $item['quantity'];
        }
        return $total;
    }
}