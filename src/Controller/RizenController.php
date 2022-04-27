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
        return $this->render('BackEnd/index.html.twig');
    }

            /**
     * @Route("/user", name="user")
     */
    public function indexUser(): Response
    {
        return $this->render('user/index.html.twig');
    }


}
