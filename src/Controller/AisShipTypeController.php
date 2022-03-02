<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AisShipTypeRepository;

class AisShipTypeController extends AbstractController
{
    /**
     * 
     * @Route("/aisshiptype", name="aisshiptype_")
     */
    public function index(): Response
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'AisShipTypeController',
        ]);
    }

    /**
     * 
     * @Route("/aisshiptype/voirtous", name="aisshiptype_voirtous")
     */
    public function voirTous(AisShipTypeRepository $repo ) {
        $types = $repo->findAll();
        return $this->render('aisshiptype/voirtous.html.twig',[
            'types' => $types,

        ]);
    }
}
