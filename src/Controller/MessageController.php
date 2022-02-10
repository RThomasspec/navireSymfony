<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use App\Entity\Message;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\MessageType;
use App\Services\GestionContact;
use Symfony\Component\HttpFoundation\Request;


class MessageController extends AbstractController
{
    /**
     * @Route("/message", name="message_")
     */
    public function contact(Request $request, GestionContact $gestionContact,EntityManagerInterface $manager,MailerInterface $mailer ): Response
    {
        
        $message = new Message();
        $form = $this->createForm(MessageType::class, $message);
       
     
        $form->handleRequest($request);

       
        if ($form->isSubmitted() && $form->isValid()) {
           
            $message = $form->getData();
            $gestionContact = new GestionContact($manager,$mailer);
            
            $gestionContact->envoiMailContact($message);
            $this->addFlash('notification', "Votre message a bien été envoyé");
            return $this->redirectToRoute('home');
        }

     
        return $this->render('message/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    
}
