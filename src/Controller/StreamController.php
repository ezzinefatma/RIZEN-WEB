<?php

namespace App\Controller;

use App\Entity\Stream;
use App\Form\StreamEditType;
use App\Form\StreamType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StreamController extends AbstractController
{
    /**
     * @Route("/", name="display_stream")
     */
    public function index(): Response
    {    $stream = $this->getDoctrine()->getManager()->getRepository(Stream::class)->findAll();
        return $this->render('stream/index.html.twig', ['s'=>$stream
        ]);
    }

    /**
     * @Route("/admin", name="display_stream_admin")
     */
    public function indexAdmin(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    /**
     * @Route("/addstream", name="addstream")
     */
    public function addstream(Request $request ): Response
    {
        $Stream = new Stream();

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

    /**
     * @Route("/removeStream/{idStream}", name="delete_stream")
     */
    public function deleteStream(Stream $stream): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($stream);
        $em->flush();

        return $this->redirectToRoute('display_stream');


    }

    /**
     * @Route("/editstream/{idStream}", name="edit_stream")
     */
    public function Editstream(Request $request , $idStream ): Response
    {
        $Stream = $this->getDoctrine()->getManager()->getRepository(Stream::class)->find($idStream);

        $form = $this->createForm(StreamEditType::class,$Stream);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('display_stream');
        }
        return $this->render('Stream/updateStream.html.twig',['f1'=>$form->createView()]);



    }

}
