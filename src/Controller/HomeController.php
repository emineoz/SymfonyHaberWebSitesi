<?php

namespace App\Controller;

use App\Entity\Messages;
use App\Form\MessagesType;
use App\Repository\MessagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request, MessagesRepository $messagesRepository): Response
    {

        $messages = new Messages();
        $form = $this->createForm(MessagesType::class, $messages);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $messagesRepository->add($messages, true);
            $this->addFlash(
                'success',
                'Mesajınız başarı ile kaydedilmiştir.Teşekkür ederiz.'
            );

            return $this->redirectToRoute('app_contact');
        }
            return $this->renderForm('home/contact.html.twig', [
                'form' => $form
            ]);
        }

}

