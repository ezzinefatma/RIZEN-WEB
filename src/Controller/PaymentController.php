<?php

namespace App\Controller;

use App\Entity\Facture;
use App\Form\PaymentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaymentController extends AbstractController
{
    /**
     * @Route("/pyment/{numfac}", name="app_payment")
     */
    public function index( Facture $facture): Response
    {

        $facture = $this->getDoctrine()->getManager()->getRepository(Facture::class)->findBy($facture);
        return $this->render('payment/affichage.html.twig', [
            'b'=>$facture
        ]);
    }
    /**
     * @Route("/addPayment", name="addPayment")
     */
    public function addPayment(Request $request): Response
    {
        $facture = new Facture();

        $form = $this->createForm(PaymentType::class, $facture);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($facture);//Add
            $em->flush();

            return $this->redirectToRoute('app_payment');
        }
        return $this->render('payment/createPayment.html.twig', ['f' => $form->createView()]);

    }
    /**
     * @Route("/facture", name="aff_payment")
     */
    public function indexad( ): Response
    {

        $facture = $this->getDoctrine()->getManager()->getRepository(Facture::class)->findAll();
        return $this->render('payment/affichagead.html.twig', [
            'b'=>$facture
        ]);
    }
    /**
     * @Route("/removefacture/{numfac}", name="supp_facture")
     */
    public function suppressionfacture(Facture $facture): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($facture);
        $em->flush();

        return $this->redirectToRoute('aff_payment');


    }
}
