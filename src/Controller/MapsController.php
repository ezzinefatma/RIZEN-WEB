<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MapsController extends AbstractController
{
    /**
     * @Route("/maps", name="app_maps")
     */
    public function index(): Response
    {
        return $this->render('maps/index.html.twig');
    }
}
