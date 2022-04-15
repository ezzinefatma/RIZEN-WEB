<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{

    /**
     * @Route("/display_events", name="display_events", methods="GET")
     */
    public function index(): Response
    {
        $events = $this->getDoctrine()->getManager()->getRepository(event::class)->findAll();
        return $this->render('admin/event/index.html.twig',['b'=>$events]);
    }

    /**
     * @Route("/AjouterEvent", name="AjouterEvent")
     */
    public function AjouterEvent(Request $request): Response
    {

        $event = new Event();
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
            return $this->redirectToRoute("display_events");
        }
        return $this->render('admin/event/ajouter.html.twig',['f'=>$form->createView()]);
    }
    /**
     * @Route("/", name="ModifierEvent")
     */
    public function modifierEvent(Request $request):Response
    {
        $event = $this->getDoctrine()->getManager()->getRepository(event::class)->find(4);
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute("display_events");
        }
        return $this->render('admin/event/update.html.twig',['f'=>$form->createView()]);
    }


    /**
     * @Route("/delete/{idEvent}", name="deleteEvent")
     */
    public function deleteEvent ($idEvent)
    {
        $event = $this->getDoctrine()->getRepository(event::class)->find($idEvent);
        $em = $this->getDoctrine()->getManager();
        $em->remove($event);
        $em->flush();
        return $this->redirectToRoute("display_events");
    }


}
