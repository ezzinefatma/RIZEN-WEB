<?php

namespace App\Controller;

use App\Entity\Chat;
use App\Entity\Stream;
use App\Form\ChatType;
use App\Form\ChatUserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChatUserController extends AbstractController
{
    /**
     * @Route("/chat/userchat/{idStream}", name="display_chat_user")
     * @param Stream $idStream
     */
    public function index($idStream): Response
    {
        $chat = $this->getDoctrine()->getManager()->getRepository(Chat::class)->findBy(array('idStream' => $idStream));
        return $this->render('chat_user/index.html.twig', ['c'=>$chat
        ]);

    }

    /**
     * @Route("/add_user_chat/", name="add_user_chat")
     */
    public function addchat(Request $request ): Response
    {
        $chat = new Chat();

        $form = $this->createForm(ChatUserType::class,$chat);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($chat);//Add
            $em->flush();

            return $this->redirectToRoute('display_chat_user');
        }
        return $this->render('user_stream/showstream.html.twig',['ch1'=>$form->createView()]);

    }

    /**
     * @Route("/remove_user_Chat/{idComment}", name="delete_user_message")
     */
    public function deletemessage(Chat $chat): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($chat);
        $em->flush();

        return $this->redirectToRoute('display_chat_user');


    }



}
