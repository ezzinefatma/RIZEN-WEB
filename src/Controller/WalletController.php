<?php

namespace App\Controller;

use App\Form\WalletType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Wallet;

class WalletController extends AbstractController
{
    /**
     * @Route("/", name="app_wallet")
     */
    public function index(): Response
    {
        $wal = $this->getDoctrine()->getManager()->getRepository(Wallet::class)->findAll();
        return $this->render('ctr_wallet/index.html.twig', [
           'b'=>$wal
        ]);
    }

    /**
     * @Route("/addwallet", name="addwallet")
     */
    public function addWallet (Request $request) :Response
    {
        $wall = new Wallet();
        $form = $this-> createForm(WalletType::class,$wall);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form ->isValid())
        {$em = $this -> getDoctrine()->getManager();
            $em -> persist ($wall);
            $em -> flush();
            return $this-> redirectToRoute('app_wallet');
        }
        else
            return $this->render('ctr_wallet/create.html.twig',['f'=> $form->createView()]);
    }

}
