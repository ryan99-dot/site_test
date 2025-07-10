<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

final class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            try {
                $email = (new Email())
                    ->from($data['email'])
                    ->to('admin@test.fr')
                    ->subject('Test')
                    ->text($data['message']);
                $mailer->send($email);

                $emailConfirmation = (new Email())
                    ->from('admin@test.fr')
                    ->to($data['email'])
                    ->subject('Test envoyé')
                    ->text("Votre message sur NOTRE SITE DE TEST a bien été envoyé");
                $mailer->send($emailConfirmation);
                $this->addFlash('success', 'Votre message a été envoyé avec succès.');
                return $this->redirectToRoute('accueil');
            } catch (\Exception $e) {
                $this->addFlash('error', 'Erreur lors de l\'envoi de l\'email. Veuillez réessayer.');
            }
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form,
        ]);
    }
}
