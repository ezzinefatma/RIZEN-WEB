<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\User;
use App\Entity\InscriptionEvent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionEventController extends AbstractController
{
    /**
     * @Route("/inscription/event", name="app_inscription_event")
     */
    public function index( MailerInterface $mailer): Response
    {
        $user = new User();
        $user = $this->getDoctrine()->getManager()->getRepository(User::class)->findOneByIdUser(2);
        $event = new Event();
        $event = $this->getDoctrine()->getManager()->getRepository(event::class)->findOneByIdEvent(40);
        $inc = new InscriptionEvent();
            $inc->setIdEvent($event->getidEvent());
            $inc->setIdUsr($user->getIdUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($inc);
            $em->flush();
        $email = (new Email())
            ->from('runtimepidev@gmail.com')
            ->to($user->getAdresse())
            ->subject('Event RuntimeTerror')
            ->text('votre inscription a enregistré avec seccess!!');
        $mailer->send($email);
        return $this->redirectToRoute("display_eventss");


    }
}
