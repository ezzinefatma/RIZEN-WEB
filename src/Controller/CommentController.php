<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Publication;
use DateTime;
use Swift_Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Config\Definition\Exception\Exception;


class CommentController extends AbstractController
{
    /**
     * @Route("/comment", name="app_comment")
     */
    public function index(): Response
    {
        return $this->render('comment/index.html.twig', [
            'controller_name' => 'CommentController',
        ]);
    }

    /**
     * @Route ("/addComment/{id}", name="add_comment")
     */
    public function addComment(Request $request, $id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $commentToAdd = new Commentaire();
        $post = $em->getRepository(Publication::class)->find($id);
        $commentsByPosts = $this->getDoctrine()->getManager()->getRepository(Commentaire::class)->findBy(array('publication' => $post));

        if ($request->isMethod("POST")) {
            $commentToAdd->setContentCom($request->get('input_content'));
            $commentToAdd->setUsername($request->get('input_name'));
            $date = new DateTime();
            $commentToAdd->setDateCom($date);
            $commentToAdd->setApprouve(0);

            $commentToAdd->setEmail($request->get('input_email'));
            $commentToAdd->setPublication($post);

            try {
                $em->persist($commentToAdd);
                $em->flush();
            } catch (Exception $e) {

                return $this->redirectToRoute('list_Comment');
            }
        }
        return $this->render('post/details.html.twig', [
            'post' => $post, 'ide' => $id, 'comments' => $commentsByPosts
        ]);
    }

    /**
     * @Route("/comments/{id}",name="list_Comment")
     */
    public function displayCommentByArticle($id): Response
    {
        $value=1;
        $publication = $this->getDoctrine()->getManager()->getRepository(Publication::class)->find($id);
        $commentsByPosts = $this->getDoctrine()->getManager()->getRepository(Commentaire::class)->findBy(array('publication' => $publication),array('approuve' => $value));
        return $this->render('post/details.html.twig', [
            'post' => $publication, 'ide' => $id, 'comments' => $commentsByPosts]);


    }

    /**
     * @Route("/Allcomments",name="list_ALL_Comment")
     */
    public function allComments(): Response
    {

        $commentsApprouved = $this->getDoctrine()->getManager()->getRepository(Commentaire::class)->findAll();
        return $this->render('post/allComment.html.twig', [
            'comments' => $commentsApprouved]);

    }

    /**
     * @Route("/approuve/{id}",name="approuve-comment")
     */
    public function approuveComment($id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $comment = $this->getDoctrine()->getManager()->getRepository(Commentaire::class)->find($id);
        $comment->setApprouve(1);
        $em->merge($comment);
        $em->flush();
        return $this->redirectToRoute("list_ALL_Comment", [
            'id' => $id]);
    }

    /**
     * @Route("/deleteComment/{id}", name="delete_Comment")
     */
    public function deleteComment($id): Response
    {
        $Comment = $this->getDoctrine()->getManager()->getRepository(Commentaire::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($Comment);
        $em->flush();
        return $this->redirectToRoute('list_ALL_Comment', [
            'id' => $id
        ]);
    }

    /**
     * @Route ("/editComment/{id}", name="edit_comment")
     */
    public function editComment(Request $request, $id): Response
    {
        $em = $this->getDoctrine()->getManager();

        $commentToEdit = $this->getDoctrine()->getManager()->getRepository(Commentaire::class)->find($id);

        if ($request->isMethod("POST")) {
            $commentToEdit->setContentCom($request->get('input_content'));
            $commentToEdit->setUsername($request->get('input_name'));
            $commentToEdit->setEmail($request->get('input_email'));


            try {
                $em->merge($commentToEdit);
                $em->flush();
                return $this->redirectToRoute('list_ALL_Comment', [
                    'id' => $id
                ]);
            } catch (Exception $e) {


            }
        }
        return $this->render('post/editComment.html.twig', [
            'comment' => $commentToEdit, 'id' => $id]);
    }
}
