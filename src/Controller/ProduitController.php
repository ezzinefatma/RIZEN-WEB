<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Dompdf\Options;
class ProduitController extends AbstractController
{


    /**
     * @Route("/show/{idProd}", name="article_show")
     * @param Produit Produit
     * @return Response
     */
    public function show(Produit $produit): Response
    {
        return $this->render("base1.html.twig", [
            "produit" => $produit
        ]);
    }

    /**
     * @Route("/", name="app_produit")
     */
    public function index(): Response
    {

        $produit = $this->getDoctrine()->getManager()->getRepository(Produit::class)->findAll();
        return $this->render('produit/afichage.html.twig', [
            'b' => $produit
        ]);
    }

    /**
     * @Route("/admin", name="display_admin")
     */
    public function indexAdmin(): Response
    {

        return $this->render('admin/index.html.twig'
        );
    }


    /**
     * @Route("/addProduit", name="addProduit")
     */
    public function addProduit(Request $request): Response
    {
        $produit = new Produit();

        $form = $this->createForm(ProduitType::class, $produit);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produit);//Add
            $em->flush();

            return $this->redirectToRoute('app_produit');
        }
        return $this->render('produit/createProduit.html.twig', ['f' => $form->createView()]);


    }

    /**
     * @Route("/removeProduit/{idProd}", name="supp_produit")
     */
    public function suppressionproduit(Produit $produit): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($produit);
        $em->flush();

        return $this->redirectToRoute('app_produit');


    }

    /**
     * @Route("/modifProduit/{idProd}", name="modifProduit")
     */
    public function modifBlog(Request $request, $idProd): Response
    {
        $produit = $this->getDoctrine()->getManager()->getRepository(Produit::class)->find($idProd);

        $form = $this->createForm(ProduitType::class, $produit);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('app_produit');
        }
        return $this->render('produit/updateproduit.html.twig', ['f' => $form->createView()]);


    }

    /**
     * @Route("/all", name="a_produit")
     */
    public function inde(): Response
    {

        $produit = $this->getDoctrine()->getManager()->getRepository(Produit::class)->findAll();
        return $this->render('base1.html.twig', [
            'h' => $produit
        ]);
    }


    /**
     * @Route("/pdf", name="listP")
     */
    public function pdf()
    {
        $pdfOptions = new Options();


        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);


        $produit = $this->getDoctrine()->getManager()->getRepository(Produit::class)->findAll();


        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('produit/listP.html.twig', [
            'b' => $produit
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("mypdf.pdf", [
            "Attachment" => true
        ]);
    }







}
