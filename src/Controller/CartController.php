<?php

namespace App\Controller;



use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Command\Proxy\EnsureProductionSettingsDoctrineCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{



    /**
     * @Route("/uu", name="index")
     */
    public function indexad( ): Response
    {

        return $this->render('cart/index.html.twig');
    }

}