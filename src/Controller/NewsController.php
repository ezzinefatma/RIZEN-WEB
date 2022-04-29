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
     * @Route("/news", name="display_news")
     */
    public function index(): Response
    {
        $news = $this->getDoctrine()->getManager()->getRepository(news::class)->findAll();
        return $this->render('admin/news/index.html.twig',['n'=>$news]);
    }


    /**
     * @Route("/AjouterNews", name="AjouterNews")
     */
    public function AjouterNews(Request $request): Response
    {

        $news = new News();
        $form = $this->createForm(NewsType::class, $news);
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
     * @Route("/DeleteNews/{idNews}", name="DeleteNews")
     */
    public function DeleteNews(news  $news): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($news);
        $em->flush();
        return $this->redirectToRoute('display_news');


    }

    /**
     * @Route("/ModifierNews/{idNews}", name="ModifierNews")
     */

    public function ModifierNews(Request $request ,$idNews):Response
    {
        $news = $this->getDoctrine()->getManager()->getRepository(news::class)->find($idNews);
        $form = $this->createForm(NewsType::class,$news);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute("display_news");
        }
        return $this->render("admin/news/update.html.twig",['f'=>$form->createView()]);
    }


    /**
     * @Route("/userss", name="display_newss")
     */
    public function afficherUser( ): Response
    {

        $news = $this->getDoctrine()->getManager()->getRepository(news::class)->findAll();
        return $this->render('user/news/index.html.twig',['n'=>$news]);

    }
}
