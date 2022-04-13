<?php

namespace App\Controller;

use App\Entity\Chat;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChatController extends AbstractController
{
    /**
     * @Route("/chat", name="app_chat")
     */
    public function index(): Response
    {
        return $this->render('chat/index.html.twig', [
            'controller_name' => 'ChatController',
        ]);
    }
    /**
     * @Route("/addchat", name="addchat")
     */
    public function addstream(Request $request ): Response
    {
        $ = new Chat();

        $form = $this->createForm(StreamType::class,$Stream);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Stream);//Add
            $em->flush();

            return $this->redirectToRoute('display_stream');
        }
        return $this->render('Stream/createStream.html.twig',['f'=>$form->createView()]);



    }



}
