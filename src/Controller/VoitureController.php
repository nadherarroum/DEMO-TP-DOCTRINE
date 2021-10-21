<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}
