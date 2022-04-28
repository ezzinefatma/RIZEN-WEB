<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommandeController extends AbstractController
{
    /**
     * @Route("/commande", name="app_commande")
     */
    public function index(): Response
    {
        $addressGps = null;

        if (isset($_POST['submit'])) {
            $address = $_POST['address'];
            $addressGps = str_replace(" ", "+", $address);
        }
        return $this->render('commande/index.html.twig',[

            'addressGps'=>$addressGps

        ]);
    }
}
