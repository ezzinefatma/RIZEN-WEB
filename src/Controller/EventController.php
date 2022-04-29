<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\ContactType;
use App\Form\EventType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;




class EventController extends AbstractController
{

    /**
     * @Route("/event", name="display_events")
     */
    public function index(): Response
    {
        $events = $this->getDoctrine()->getManager()->getRepository(event::class)->findAll();
        return $this->render('admin/event/index.html.twig',['b'=>$events]);
    }
    /**
     * @Route("/users", name="display_eventss")
     */
    public function afficherUser(Request $request ): Response
    {
        $events = $this->getDoctrine()->getManager()->getRepository(event::class)->findAll();

        return $this->render('user/events/index.html.twig',['c'=>$events]);

    }

    /**
     * @Route("/AFFICHER", name="AFFICHER")
     */
    public function afficherUser2(Request $request ): Response
    {
        $events = $this->getDoctrine()->getManager()->getRepository(event::class)->findAll();

        return $this->render('user/events/index.html.twig',['c'=>$events]);

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

            $file = $event->getImageEvent();
            $fileName = md5 (uniqid()).'.'.$file->guessExtension();

            $em = $this->getDoctrine()->getManager();
            $event->setImageEvent($fileName);

            $em->persist($event);
            $em->flush();

            return $this->redirectToRoute("display_events");
        }
        return $this->render('admin/event/ajouter.html.twig',['f'=>$form->createView()]);
    }

    /**
     * @Route("/ModifierEvent/{idEvent}", name="ModijierEvent")
     */

    public function ModifierEvent(Request $request ,$idEvent):Response
    {
        $event = $this->getDoctrine()->getManager()->getRepository(event::class)->find($idEvent);
        $form = $this->createForm(EventType::class,$event);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $image = $event->getImageEvent();
            if (!str_contains($image,'front/' )) {
                $image="front/images/".$event->getImageEvent();

            }
            $event->setImageEvent($image);
            $em->flush();
            return $this->redirectToRoute("display_events");
        }
          return $this->render("admin/event/update.html.twig",['f'=>$form->createView()]);
    }


    /**
     * @Route("/DeleteEvent/{idEvent}", name="DeleteEvent")
     */
    public function DeleteEvent(event  $event): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($event);
        $em->flush();
        return $this->redirectToRoute('display_events');


    }

    /**
     * @Route("/Insc/{idEvent}", name="Insc")
     */
    public function Insc(Request $request): Response
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
     * @Route("/SendMail/users", name="/SendMail/users")
     */
    public function sendEmail(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('runtimepidev@gmail.com')
            ->to('oussamaesprit1@gmail.com')
            ->subject('Event RuntimeTerror')
            ->text('votre inscription a enregistré avec seccess!!');
        $mailer->send($email);
        return $this->redirectToRoute('display_eventss');



    }


}
