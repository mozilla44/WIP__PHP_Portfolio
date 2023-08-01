<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response {

        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            
            // Envoyer l'email
            $email = new TemplatedEmail();
            $email
                ->from($data['email'])
                ->to('Toto <admin@monsite.com>')
                ->replyTo($data['email'])
                ->subject($data['subject'])
                ->text($data['message'])
                ->htmlTemplate('contact/email.html.twig')
                ->context([
                    'subject' => $data['subject'],
                    'emailTo' => $data['email'],
                    'message' => $data['message'],
                ]);

            $mailer->send($email);
        }

        return $this->render('contact/index.html.twig', [
            'formulaire' => $form->createView(),
        ]);
    }
}
