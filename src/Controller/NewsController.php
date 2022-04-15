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
     * @Route("/display_news", name="display_news")
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
            return $this->redirectToRoute("display_news");
        }
        return $this->render('admin/news/ajouter.html.twig',['f'=>$form->createView()]);
    }
    /**
     * @Route("/delete/{idEvent}", name="deleteNews")
     */
    public function deleteNews($idNews)
    {
        $news = $this->getDoctrine()->getRepository(news::class)->find($idNews);
        $em = $this->getDoctrine()->getManager();
        $em->remove($news);
        $em->flush();
        return $this->redirectToRoute("display_news");
    }
    /**
     * @Route("/modifierNews/{idNews} ", name="modifierNews")
     */
    public function modifierNews(Request $request,$idNews): Response
    {

        $news = $this->getDoctrine()->getManager()->getRepository(event::class)->find($idNews);
        $form = $this->createForm(EventType::class, $news);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute("display_news");
        }
        return $this->render('admin/news/update.html.twig',['f'=>$form->createView()]);
    }
}
