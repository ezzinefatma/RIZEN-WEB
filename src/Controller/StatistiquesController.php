<?php

namespace App\Controller;

use App\Entity\Facture;
use App\Entity\Produit;
use App\Repository\FactureRepository;
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
    public function statistiques(ProduitRepository $produitRep, PromotionRepository $promotionRep, FactureRepository $factureRep)
    {
        $promotion = $promotionRep->number0fPromotion();
        $produit = $produitRep->number0fProduit();
        $facture = $factureRep->number0fFacture();
        $produits = $produitRep->SUMPrixproduit();
        $produts = $produitRep->SUMquantiteproduit();
        $facturee = $factureRep->SUMprixfactur();
        $fact = $factureRep->SUMquantitefacture();
        $prommtaux = $promotionRep->SUMprixprom();

        $proIdprod = [];

        $proIdprom = [];

        $pronumfac = [];
        $proSum = [];
        $proSumq = [];
        $proSump = [];
        $proSumqp = [];
        $pross = [];
        foreach ($produit as $produitt) {
            $proIdprod[] = $produitt['count'];

        }


        foreach ($produits as $produittt) {
            $proSum[] = $produittt['suum'];

        }




            foreach ($produts as $produttt) {

            $proSumq[] = $produttt['suumq'];
        }
        foreach ($promotion as $promotionn) {
            $proIdprom[] = $promotionn['counte'];
        }

        foreach ($prommtaux as $promo) {
            $pross[] = $promo['off'];
        }


        foreach ($facturee as $fac) {
            $proSump[] = $fac['suump'];
        }
        foreach ($fact as $factu) {
            $proSumqp[] = $factu['su'];
        }






        foreach ($facture as $facturee) {
            $pronumfac[] = $facturee['countee'];
        }

        return $this->render('statistiques/index.html.twig', [
            'proIdprod' => json_encode($proIdprod),
            'proSum' => json_encode($proSum),
            'proSumq' => json_encode($proSumq),
            'pronumfac' => json_encode($pronumfac),
            'proIdprom' => json_encode($proIdprom),
            'proSump' => json_encode($proSump),
            'proSumqp' => json_encode($proSumqp),
            'pross' => json_encode($pross),

        ]);
    }
/**
* @Route("/nomb", name ="countStudent")
*/
    public function cou()
    {
        $number = $this->getDoctrine()
            ->getRepository(Produit::class)
            ->SUMPrixproduit();
        return $this->render( 'payment/index.html.twig',
            ['nombr' => $number]);

    }
}