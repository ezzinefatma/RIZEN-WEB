<?php

namespace App\Controller;


use App\Repository\ProduitRepository;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Command\Proxy\EnsureProductionSettingsDoctrineCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{


    /**
     * @Route("/uu", name="index")
     */
    public function index(SessionInterface $session, ProduitRepository  $produitRepository)
    {

        $panier = $session->get("panier", []);

        // On "fabrique" les données
        $dataPanier = [];
        $total = 0;

        foreach($panier as $idProd => $quantite){
            $product = $produitRepository->find($idProd);
            $dataPanier[] = [
                "produit" => $product,
                "quantite" => $quantite
            ];
            $total += $product->getPrix() * $quantite;
        }

        return $this->render('cart/index.html.twig', compact("dataPanier", "total"));

    }

    /**
     * @Route("/add/{id}", name="add")
     */
    public function add(Produit $produit, SessionInterface $session)
    {
        // On récupère le panier actuel
        $panier = $session->get("panier", []);
        $idProd = $produit->getIdProd();

        if(!empty($panier[$idProd])){
            $panier[$idProd]++;
        }else{
            $panier[$idProd] = 1;
        }

        // On sauvegarde dans la session
        $session->set("panier", $panier);

        return $this->redirectToRoute("cart_index");
    }

}