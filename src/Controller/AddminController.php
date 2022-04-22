<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddminController extends AbstractController
{
    /**
     * @Route("/addmin", name="app_addmin")
     */
    public function index(): Response
    {
        return $this->render('admin/dhash.html.twig');
    }
}
