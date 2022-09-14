<?php

namespace App\Controller\Admin;

use App\Entity\Categories;
use App\Entity\Messages;
use App\Repository\MessagesRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/admin/home', name: 'app_admin_home')]
    public function index(): Response
    {
        return $this->render('admin/home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/admin/contactmessage', name: 'app_admin_contactmessage')]
    public function contact(MessagesRepository $messagesRepository): Response
    {
        $messageList=$messagesRepository->findAll();
        return $this->render('admin/home/contactmessage.html.twig', [
            'messageList' => $messageList,


        ]);
    }

    #[Route('/admin/message/delete/{id}', name: 'app_admin_contactmessage_delete')]
    public function contact_delete(ManagerRegistry $doctrine,$id): Response
    {
        $entityManager = $doctrine->getManager();
        $messages = $entityManager->getRepository(Messages::class)->find($id);
        $entityManager->remove($messages);
        $entityManager->flush();
        return $this->redirectToRoute('app_admin_contactmessage');




    }
    #[Route('/admin/message/edit/{id}', name: 'app_admin_contactmessage_show')]
    public function contact_show(MessagesRepository $messagesRepository,ManagerRegistry $doctrine ,$id): Response
    {
        $entityManager = $doctrine->getManager();
        $rs=$messagesRepository->find($id);
        $rs->setStatus("Read");
        $entityManager->flush();

        return $this->render('admin/home/message_show.html.twig', [
            'rs' => $rs

        ]);


    }
}
