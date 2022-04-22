<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StarsController extends AbstractController
{
    /**
     * @Route("/stars", name="app_stars")
     */
    public function index(): Response
    {
        return $this->render('stars/index.html.twig');
    }
}
