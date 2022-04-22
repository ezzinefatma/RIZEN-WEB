<?php

namespace App\Controller;

use App\Entity\Facture;
use App\Entity\Order;
use App\Form\OrderType;
use App\Form\PaymentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaymentController extends AbstractController
{

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

            return $this->redirectToRoute('aff_paymentuser');
        }
        return $this->render('payment/createPayment.html.twig', ['f' => $form->createView()]);

    }

    /**
     * @Route("/factur", name="aff_paymentuser")
     */
    public function indexuser( ): Response
    {

        $facture = $this->getDoctrine()->getManager()->getRepository(Facture::class)->findAll();
        return $this->render('payment/affichage.html.twig', [
            'b'=>$facture
        ]);
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

    /**
     * @Route("/statistiques", name="app_statistiques")
     */
    public function indexx( )
    {


        return $this->render('statistiques/index.html.twig',[


        ]);
    }
}


