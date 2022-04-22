<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseeController extends AbstractController
{
    /**
     * @Route("/basee", name="app_basee")
     */
    public function index(): Response
    {
        return $this->render('basee/index.html.twig', [
            'controller_name' => 'BaseeController',
        ]);
    }
}
