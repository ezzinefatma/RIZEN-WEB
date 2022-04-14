<?php

namespace App\Controller;

use App\Entity\Chat;
use App\Form\ChatEditType;
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
        $chat = $this->getDoctrine()->getManager()->getRepository(Chat::class)->findAll();
        return $this->render('chat/index.html.twig', ['c'=>$chat
        ]);
    }
    /**
     * @Route("/addchat", name="addchat")
     */
    public function addchat(Request $request ): Response
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

    /**
     * @Route("/removeChat/{idComment}", name="delete_message")
     */
    public function deletemessage(Chat $chat): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($chat);
        $em->flush();

        return $this->redirectToRoute('display_Chat');


    }


    /**
     * @Route("/editmessage/{idComment}", name="edit_message")
     */
    public function Editmessage(Request $request , $idComment ): Response
    {
        $chat = $this->getDoctrine()->getManager()->getRepository(Chat::class)->find($idComment);

        $form = $this->createForm(ChatEditType::class,$chat);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('display_Chat');
        }
        return $this->render('Chat/UpdateChat.html.twig',['ch1'=>$form->createView()]);



    }



}
