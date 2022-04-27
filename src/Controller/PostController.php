<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Publication;
use Doctrine\DBAL\Exception;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Knp\Component\Pager\PaginatorInterface;

class PostController extends AbstractController
{
    /**
     * @Route("/post", name="app_post")
     */
    public function index(): Response
    {
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }

    /**
     * @Route("/posts", name="display-post")
     */
    public function displayPost():Response
    {
        $listpost=$this->getDoctrine()->getManager()->getRepository(Publication::class)->findAll();
        return $this->render("post/displayPost.html.twig",[
            'listpost' =>$listpost
        ]);
    }

    /**
     * @Route("/details/{id}", name= "post-details")
     */
    public function getSinglePost($id):Response
    {
        $singlePost= $this->getDoctrine()->getManager()->getRepository(Publication::class)->find($id);
        $commentsByPosts=$this->getDoctrine()->getManager()->getRepository(Commentaire::class)->findBy(array('publication' => $singlePost));
        return $this->render("post/details.html.Twig",[
            'post' =>$singlePost, 'comments'=>$commentsByPosts,'ide'=>$id
        ]);
    }

        /**
         * @Route("/addPost", name="add_post")
         */
        public function addPost(Request $request):Response
    {
        $em=$this->getDoctrine()->getManager();
        $post=new Publication();
        $post->setDatePub(new \DateTime());
        $post->setLikeNbr(0);
        $formBuilder = $this->createFormBuilder($post)
            ->add('image', FileType::class)
            ->add('titlePub', TextType::class)
            ->add('contentPub', TextType::class)
            ->add('submit', SubmitType::class);
        $form=$formBuilder->getForm();
        $form->handleRequest($request);

        if( $form->get('submit')->isClicked()){

            $file=$post->getImage();
            $fileName=md5(uniqid().'.'.$file->guessExtension());
            try{
                $file->move(
                    $this->getParameter('uploads_directory'),$fileName
                );
                $post->setImage($fileName);
                var_dump("movii");
            }
            catch(FileException $e){}
            try{
                $em->persist($post);
                $em->flush();
            }
            catch(Exception $e){}


            return $this->redirectToRoute("display-post-admin");

        }
        return $this->Render("post/addPost.html.twig",[
            'form' =>$form->createView()
        ]);

    }

    /**
     * @Route("/postslit", name="display-post-admin")
     */
    public function displayPostAdmin(Request $request, PaginatorInterface $paginator):Response
    {
        $listpostALL=$this->getDoctrine()->getManager()->getRepository(Publication::class)->findAll();

        $listpost = $paginator->paginate(
        // Doctrine Query, not results
            $listpostALL,
            // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
            2
        );
        return $this->render("post/displayPostadmin.html.twig",[
            'listpost' =>$listpost
        ]);
    }
    /**
     * @Route("/delete/{id}", name="delete_post")
     */
    public function deletePost($id):Response
    {
        $post=$this->getDoctrine()->getManager()->getRepository(Publication::class)->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($post);
        $em->flush();
        return $this->redirectToRoute('display-post-admin',[
            'id' =>$id
        ]);
    }

    /**
     * @Route("/editPost/{id}", name="edit_post")
     */
    public function editPost(Request $request,$id):Response
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository(Publication::class)->find($id);
        $post->setDatePub(new \DateTime());
        $post->setLikeNbr(0);
        $formBuilder = $this->createFormBuilder($post)
            ->add('titlePub', TextType::class)
            ->add('contentPub', TextType::class)
            ->add('submit', SubmitType::class);
        $form = $formBuilder->getForm();
        $form->handleRequest($request);

        if ($form->get('submit')->isClicked()) {

            try {
                $em->merge($post);
                $em->flush();

            } catch (Exception $e) {
            }


            return $this->redirectToRoute("display-post-admin");

        }
        return $this->Render("post/editPost.html.twig", [
            'form' => $form->createView() , 'post'=>$post
        ]);
    }



    /**
     * @Route("/commentby/{id}", name="commentbyPost")
     */
    public function commentsbyPost($id):Response
    {
        $publication=$this->getDoctrine()->getManager()->getRepository(Publication::class)->find($id);
        $commentsByPosts=$this->getDoctrine()->getManager()->getRepository(Commentaire::class)->findBy(array('publication' => $publication));
        return $this->render('post/commentsBy.html.twig', [
            'post' => $publication,'ide'=>$id, 'comments'=>$commentsByPosts]);
    }

    /**
     * @Route("/allpost", name="all_post")
     */
    public function allPost():Response
    {

        $pdfOptions= new Options();
        $pdfOptions->set('defaultFont','Arial');
        $dompdf= new Dompdf($pdfOptions);
        $listpost=$this->getDoctrine()->getManager()->getRepository(Publication::class)->findAll();


        $html=$this->renderView('post/listPostadmin.html.twig',[
            'listpost' =>$listpost
        ]);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();
        $dompdf->stream('mypdf.pdf',[
            'Attachement' =>true
        ]);



    }
}
