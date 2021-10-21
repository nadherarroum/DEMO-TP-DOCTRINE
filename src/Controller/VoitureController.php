<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Form\VoitureForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoitureController extends AbstractController
{
    #[Route('/voiture', name: 'voiture')]
    public function listVoiture(): Response
    {
        
        $em = $this->getDoctrine()->getManager();
        $voitures = $em->getRepository("App\Entity\Voiture")->findAll();
        
        return $this->render('voiture/listVoiture.html.twig',[
            "listVoiture" => $voitures
        ]);
    }

    #[Route("/addVoiture", name:"add_voiture")]
    public function addVoiture(Request $request): Response
    {
        $voiture = new Voiture();
        $form = $this->createForm(VoitureForm::class, $voiture);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($voiture);
            $em->flush();

            return $this->redirectToRoute('voiture');
        }

        return $this->render('voiture/addVoiture.html.twig', [
            'formVoiture' => $form->createView(),
        ]);
    }
}
