<?php

namespace App\Controller;

use App\Entity\Chat;
use App\Form\ChatType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChatController extends AbstractController
{
    /**
     * @Route("/chat", name="display_Chat")
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
        $chat  = new Chat();

        $form = $this->createForm(ChatType::class,$chat);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($chat);//Add
            $em->flush();

            return $this->redirectToRoute('display_Chat');
        }
        return $this->render('Chat/createChat.html.twig',['ch'=>$form->createView()]);



    }



}
