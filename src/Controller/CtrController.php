<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CtrController extends AbstractController
{
    /**
     * @Route("/ctr", name="app_ctr")
     */
    public function index(): Response
    {
        return $this->render('ctr/index.html.twig', [
            'controller_name' => 'CtrController',
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
}
