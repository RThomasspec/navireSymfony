<?php
namespace App\Services;

use Doctrine\ORM\EntityManagerInterface;
use App\entity\contact;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use App\Entity\Message;

class GestionContact{

    private MailerInterface $mailer;
    private Environment $environementTwig;
    private ManagerRegistry $doctrine;
    private MessageRepository $repo;

    public function __construct(EntityManagerInterface $managerRegistry, MailerInterface $mailer) {
        $this->managerRegistry = $managerRegistry;
        $this->mailer = $mailer;

    }
    public function envoiMailContact(Message $message){
        $email = (new TemplatedEmail())
        ->from('thomasbages@outlook.fr')
        ->to ($message->getMail())
        ->subject('Demande')
        ->text('Bonjour')
        ->htmlTemplate('message/mail.html.twig')
        ->context([
            'message' => $message,
        ]);
        $this->mailer->send($email);
    }

}