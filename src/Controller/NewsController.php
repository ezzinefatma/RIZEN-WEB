<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\News;
use App\Form\EventType;
use App\Form\NewsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    /**
     * @Route("/display_events", name="news")
     */
    public function index(): Response
    {
        $news = $this->getDoctrine()->getManager()->getRepository(news::class)->findAll();
        return $this->render('admin/news/index.html.twig',['b'=>$news]);
    }
    /**
     * @Route("/AjouterNews", name="AjouterNews")
     */
    public function AjouterNews(Request $request): Response
    {

        $news = new News();
        $form = $this->createForm(NewsType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($news);
            $em->flush();
            return $this->redirectToRoute("news");
        }
        return $this->render('admin/news/ajouter.html.twig',['f'=>$form->createView()]);
    }
}
