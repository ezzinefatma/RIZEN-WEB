<?php

namespace App\Controller;

use App\Form\OrderType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
class MapsController extends AbstractController
{
    /**
     * @Route("/maps", name="app_maps")
     */
    public function index(Request $request ): Response
    {
        $addressGps = null;
        $form = $this->createForm(OrderType::class, null);

        $form->handleRequest($request);
        if (isset($_POST['submit'])) {
            $address = $_POST['address'];
            $addressGps = str_replace(" ", "+", $address);
        }
        return $this->render('maps/index.html.twig',[
            'f' => $form->createView(),
            'addressGps'=>$addressGps

        ]);
    }
}
