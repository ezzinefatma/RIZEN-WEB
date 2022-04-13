<?php

namespace App\Controller;

use App\Entity\Fournisseur;
use App\Form\FournisseurType;
use App\Form\PromotionType;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FournisseurController extends AbstractController
{
    /**
     * @Route("/addf", name="app_fournisseur")
     */
    public function indexpr(): Response
    {

        $fournisseur = $this->getDoctrine()->getManager()->getRepository(Fournisseur::class)->findAll();
        return $this->render('fournisseur/affichage.html.twig', [
            'b'=>$fournisseur
        ]);
    }
    /**
     * @Route("/addfournisseur", name="addfournisseur")
     */
    public function addfournisseur(Request $request): Response
    {
        $fournisseur = new Fournisseur();

        $form = $this->createForm(FournisseurType::class, $fournisseur);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fournisseur);//Add
            $em->flush();

            return $this->redirectToRoute('app_fournisseur');
        }
        return $this->render('fournisseur/createfournisseur.html.twig', ['f' => $form->createView()]);


    }
    /**
     * @Route("/removefournisseur/{idFou}", name="supp_fournisseur")
     */
    public function suppressionproduit(Fournisseur $fournisseur): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($fournisseur);
        $em->flush();

        return $this->redirectToRoute('app_fournisseur');


    }
    /**
     * @Route("/modiffournisseur/{idFou}", name="modiffournisseur")
     */
    public function modifourni(Request $request,$idFou): Response
    {
        $fournisseur = $this->getDoctrine()->getManager()->getRepository(Fournisseur::class)->find($idFou);

        $form = $this->createForm(FournisseurType::class,$fournisseur);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('app_fournisseur');
        }
        return $this->render('fournisseur/updatefournisseur.html.twig',['f'=>$form->createView()]);




    }
}