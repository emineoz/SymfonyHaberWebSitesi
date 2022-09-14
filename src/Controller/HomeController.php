<?php

namespace App\Controller;

use App\Controller\Admin\SettingController;
use App\Entity\Messages;
use App\Form\MessagesType;
use App\Repository\MessagesRepository;
use App\Repository\ProductRepository;
use App\Repository\SettingRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(ManagerRegistry $doctrine,ProductRepository $productRepository,SettingRepository $settingRepository): Response
    {

        $setting=$settingRepository->find(1);



        $entityManager=$doctrine->getManager();
        $query1=$entityManager->createQuery(
            'SELECT p
             FROM App\Entity\Product p
             WHERE p.id BETWEEN 1 and 4'

        );
        $sliderdata=$query1->getResult();

       $entityManager=$doctrine->getManager();
        $query=$entityManager->createQuery(
            'SELECT p
             FROM App\Entity\Product p
             WHERE p.id BETWEEN 5 and 8'

        );
        $data=$query->getResult();

        $queryy=$entityManager->createQuery(
            'SELECT p
             FROM App\Entity\Product p
            WHERE p.id BETWEEN 9 and 12'

        );
        $featuredata=$queryy->getResult();

        $query_=$entityManager->createQuery(
            'SELECT p
             FROM App\Entity\Product p
             WHERE p.id BETWEEN 13 and 16'

        );
        $lastdata=$query_->getResult();

        $query_2=$entityManager->createQuery(
            'SELECT p
             FROM App\Entity\Product p
             WHERE p.id BETWEEN 17 and 20'

        );
        $mindata=$query_2->getResult();

        $query_2=$entityManager->createQuery(
            'SELECT p
             FROM App\Entity\Product p
             WHERE p.id BETWEEN 22 and 25'

        );
        $yazardata=$query_2->getResult();

        $query_3=$entityManager->createQuery(
            'SELECT p
             FROM App\Entity\Product p
             WHERE p.id BETWEEN 26 and 31'

        );
        $textdata=$query_3->getResult();


        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'sliderdata'=>$sliderdata,
            'data'=>$data,
            'featuredata'=>$featuredata,
            'lastdata'=>$lastdata,
            'mindata'=>$mindata,
            'yazardata'=>$yazardata,
            'setting'=>$setting,
            'textdata'=> $textdata
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
    #[Route('/aboutus', name: 'app_aboutus')]
    public function aboutus(SettingRepository $settingRepository): Response
    {
        $setting=$settingRepository->find(1);
        return $this->render('home/aboutus.html.twig', [
           'setting'=>$setting,
        ]);
    }

    #[Route('/product/{id}', name: 'app_product')]
    public function product(ProductRepository $productRepository,$id): Response
    {
        $product=$productRepository->find($id);

        return $this->renderForm('home/product.html.twig', [
            'product'=>$product
        ]);
    }

    #[Route('/accesdenied', name: 'app_accesdenied')]
    public function accesdenied(SettingRepository $settingRepository): Response
    {

        $setting=$settingRepository->find(1);
        return $this->renderForm('home/accesdenied.html.twig', [
            'setting'=>$setting,
        ]);
    }

    #[Route('search-product', name: 'search_product')]
    public function searchProduct(Request $request)
    {
        $searchForm = $this->createForm(SearchProductType::class);
        $searchForm->handleRequest($request);

        if ($searchForm->isSubmitted() && $searchForm->isValid()) {

            dump('Form submitted');
        }
        return $this->render('components/search-input.html.twig', [
            'searchForm' => $searchForm->createView()
        ]);
    }



}

