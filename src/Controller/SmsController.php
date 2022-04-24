<?php

namespace App\Controller;

use App\Form\SmsType;
use Goxens\Goxens;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SmsController extends AbstractController
{
    /**
     * @Route("/sms", name="app_sms")
     */
    public function index(Request $request): Response
    {
        $apiKey = 'ROD-4I0D2WI27PP2YZI511TK0JPOA58R3J4VYL0';
        $userUid = 'R9H22T';

        $goxens = new Goxens($apiKey,$userUid);

        $form = $this->createForm(SmsType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $dt = $form->getData();



            $number = $dt['number'];
            $message = $dt['message'];
            $sender = $dt['sender'];

            $snd = $goxens->sendSms($apiKey,$userUid,$number,$sender,$message);
            return $this->json($snd);
        }
        return $this->render('sms/index.html.twig', ['form' => $form->createView()]);
    }
}
