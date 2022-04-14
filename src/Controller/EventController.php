<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
class EventController extends AbstractController
{

    /**
     * @Route("/display_events", name="display_events")
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
            return $this->redirectToRoute("display_event");
        }
        return $this->render('admin/event/ajouter.html.twig',['f'=>$form->createView()]);
    }

    /**
     * @Route("/delete/{idEvent}", name="deleteStudent")
     */
    public function deleteStudent($idEvent)
    {
        $event = $this->getDoctrine()->getRepository(event::class)->find($idEvent);
        $em = $this->getDoctrine()->getManager();
        $em->remove($event);
        $em->flush();
        return $this->redirectToRoute("display_events");
    }
    /**
     * @Route("/modifierEvent/{idEvent} ", name="modifierEvent")
     */
    public function modifierEvent(Request $request,$idEvent): Response
    {

        $event = $this->getDoctrine()->getManager()->getRepository(event::class)->find($idEvent);
        $form = $this->createForm(EventType::class, $event);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute("display_event");
        }
        return $this->render('admin/event/update.html.twig',['f'=>$form->createView()]);
    }


}
