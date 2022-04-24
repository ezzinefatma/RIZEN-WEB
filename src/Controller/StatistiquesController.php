<?php

namespace App\Controller;

use App\Entity\Facture;
use App\Entity\Produit;
use App\Repository\ProduitRepository;
use App\Repository\PromotionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
class StatistiquesController extends AbstractController
{
    /**
     * @Route("/stats", name="stats")
     */
    public function statistiques( ProduitRepository $produitRep , PromotionRepository $promotionRep )
    {
        $promotion = $promotionRep->number0fPromotion();
        $produit = $produitRep->number0fProduit();
    $proIdprod = [];

    $proIdprom = [];






foreach ($produit as $produitt) {
    $proIdprod[] = $produitt['count'];

}
foreach ($promotion as $promotionn){
    $proIdprom[] = $promotionn['counte'];
}

        return $this->render('statistiques/index.html.twig' , [
            'proIdprod' => json_encode($proIdprod),

            'proIdprom' => json_encode($proIdprom),


        ]);
            }


}
