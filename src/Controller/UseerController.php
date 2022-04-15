<?php

namespace App\Controller;

use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UseerController extends AbstractController
{
    /**
     * @Route("/userr", name="app_p")
     */
    public function index(): Response
    {

        $produit = $this->getDoctrine()->getManager()->getRepository(Produit::class)->findAll();
        return $this->render('useer/index.html.twig', [
            'b'=>$produit
        ]);
    }

    /**
     * @Route("/show_des/{idProd}", name="show")
     * @param Produit $produit
     * @return Response
     */
    public function show(Produit $produit): Response
    {
        return $this->render("useer/aff.html.twig", [
            "b" => $produit
        ]);
    }
}
