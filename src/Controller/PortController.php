<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use \Doctrine\ORM\EntityManagerInterface;
use App\Form\PortType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Port;

class PortController extends AbstractController
{
    /**
     * @Route("/creer", name="creer")
     */
    public function creer(Request $request, EntityManagerInterface $manager): Response
    {
        $port = new Port();
        //$Paysrepo->findAll()
        $form=$this->createForm(PortType::class, $port);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($port);
            $manager->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('port/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    
      /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('aisshiptype/home.html.twig', [
            'controller_name' => 'NavireController',
        ]);
    }
}
