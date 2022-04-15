<?php

namespace App\Controller;

use App\Entity\Stream;

use App\Form\StreamUserEditType;
use App\Form\StreamUserType;
use App\Form\StreamUserUpdateType;
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

            return $this->redirectToRoute('display_user_stream');
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


}
