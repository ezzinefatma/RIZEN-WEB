<?php

namespace App\Controller;

use App\Entity\Chat;
use App\Entity\Stream;

use App\Entity\User;
use App\Form\ChatType;
use App\Form\ChatUserType;
use App\Form\StreamUserType;
use App\Form\StreamUserUpdateType;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserStreamController extends AbstractController
{
    /**
     * @Route("/streamuser", name="display_user_stream")
     */
    public function index(): Response
    {

        $stream = $this->getDoctrine()->getManager()->getRepository(Stream::class)->findAll();
        return $this->render('user_stream/index.html.twig', ['s'=>$stream
        ]);

    }


    /**
     * @Route("/user", name="display_stream_user")
     */
    public function indexuser(): Response
    {
        return $this->render('user/index.html.twig');
    }


    /**
     * @Route("/add_user_stream", name="add_user_stream")
     */
    public function addstream_user(Request $request ): Response
    {
        $Stream = new Stream();

        $form = $this->createForm(StreamUserType::class,$Stream);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Stream);//Add
            $em->flush();

            return $this->redirectToRoute('show_stream');
        }
        return $this->render('user_stream/createStream.html.twig',['f2'=>$form->createView()]);

    }

    /**
     * @Route("/edite_user_stream/{idStream}", name="edit_user_stream")
     */
    public function Editstream_user(Request $request , $idStream ): Response
    {
        $Stream = $this->getDoctrine()->getManager()->getRepository(Stream::class)->find($idStream);

        $form = $this->createForm(StreamUserUpdateType::class,$Stream);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('display_user_stream');
        }
        return $this->render('user_stream/updatestream.html.twig',['f3'=>$form->createView()]);

    }


    /**
     * @Route("/remove_user_Stream/{idStream}", name="delete_user_stream")
     */
    public function deleteStream(Stream $stream): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($stream);
        $em->flush();

        return $this->redirectToRoute('display_user_stream');


    }

    /**
     * @Route("/show_stream/{idStream}", name="show_stream")
     * @param Stream $stream
     *
     * @return Response
     */
    public function show( Stream $idStream ,Stream $stream , Request $request): Response
    {
      /*  $chat = $this->getDoctrine()->getManager()->getRepository(Chat::class)->findAll(); */

        $user=$this->getDoctrine()->getManager()->getRepository(User::class)->findOneByIdUser(1);
        $chat1 = new Chat();

        $form = $this->createForm(ChatUserType::class,$chat1);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $chat1->setIdStream($idStream);
            $chat1->setIdUser($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($chat1);//Add
            $em->flush();

            return $this->redirectToRoute('show_stream',array('idStream' => $chat1->getIdStream()));
        }

        $chat = $this->getDoctrine()->getManager()->getRepository(Chat::class)->findBy(['idStream' => $idStream]);
        return $this->render("user_stream/showstream.html.twig", [
            "Stream" => $stream ,   'c1'=>$form->createView() ,'c'=>$chat
               ]);
    }
}
