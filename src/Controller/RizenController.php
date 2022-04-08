<?php

namespace App\Controller;

use App\Entity\Wallet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class RizenController extends AbstractController
{
    /**
     * @Route("/rizen", name="app_rizen")
     */
    public function index(): Response
    {
        return $this->render('rizen/index.html.twig', [
            'controller_name' => 'RizenController',
        ]);
    }

        /**
     * @Route("/admin", name="admin")
     */
    public function indexAdmin(): Response
    {
        return $this->render('admin/index.html.twig');
    }

            /**
     * @Route("/user", name="user")
     */
    public function indexUser(): Response
    {
        return $this->render('user/index.html.twig');
    }


            /**
     * @Route("/AddWallet", name="AddWallet")
     */
   /* public function AddWallet(Request $request): Response
    {
        $wallet=new Wallet();
        $form=$this->createForm(EtudiantType::class,$wallet);
        $form->handleRequest($request);
        if($form->isValid())
        {
            $niveau=$wallet->getNiveau();
            $em=$this->getDoctrine();
            $array_projets=$em->getRepository(CostaProjet::class)->findByNiveau($niveau);
            $em->getManager()->persist($wallet);
            $em->getManager()->flush();
            return $this->redirectToRoute('creer');
        }
        return $this->render('@Costa\deEtudiantCorrect\creer.html.twig', array(
            'form'=>$form->createView()
        ));

    }*/
}
