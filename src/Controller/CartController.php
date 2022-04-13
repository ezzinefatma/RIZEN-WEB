<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="app_cart")
     */
    public function index(): Response
    {
        return $this->render('cart/index.html.twig'
        );
    }

    /**
     * @Route("/carte/{idProd}", name="app_carte")
     */

     public function cart(SessionInterface  $session, Produit  $produit){
         $panier = $session->get("panier" ,[]);

        $idPro =$produit->getIdProd();
        if(!empty($panier[$idPro])){
            $panier[$idPro]++;

        }else{
            $panier[$idPro]=1;
        }

        $session->set("panier",$panier);
     return $this->redirectToRoute('app_cart');

     }
}
