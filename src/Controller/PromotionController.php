<?php

namespace App\Controller;

use App\Entity\Promotion;
use App\Form\PromotionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PromotionController extends AbstractController
{
    /**
     * @Route("/add", name="app_promotion")
     */
    public function indexpr(): Response
    {

        $promotion = $this->getDoctrine()->getManager()->getRepository(Promotion::class)->findAll();
        return $this->render('promotion/affichage.html.twig', [
            's'=>$promotion
        ]);
    }
    /**
     * @Route("/addPromotion", name="addPromotion")
     */
    public function addPromotion(Request $request): Response
    {
        $promotion = new Promotion();

        $form = $this->createForm(PromotionType::class, $promotion);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($promotion);//Add
            $em->flush();

            return $this->redirectToRoute('app_promotion');
        }
        return $this->render('promotion/createpromotion.html.twig', ['f' => $form->createView()]);


    }
    /**
     * @Route("/removePromotion/{idProm}", name="supp_promotion")
     */
    public function suppressionproduit(Promotion $promotion): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($promotion);
        $em->flush();

        return $this->redirectToRoute('app_promotion');


    }
    /**
     * @Route("/modifPromotion/{idProm}", name="modifPromotion")
     */
    public function modifBlog(Request $request,$idProm): Response
    {
        $promotion = $this->getDoctrine()->getManager()->getRepository(Promotion::class)->find($idProm);

        $form = $this->createForm(PromotionType::class,$promotion);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('app_promotion');
        }
        return $this->render('promotion/updatepromotion.html.twig',['f'=>$form->createView()]);




    }
}
