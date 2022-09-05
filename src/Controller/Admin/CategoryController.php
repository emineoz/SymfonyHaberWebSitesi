<?php

namespace App\Controller\Admin;


use App\Entity\Categories;
use App\Repository\CategoriesRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/admin/category/add', name: 'app_admin_category_add')]
    public function index(): Response
    {

        return $this->render('admin/category/add.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }

    #[Route('/admin/category', name: 'app_admin_category')]
    public function category(): Response
    {
        return $this->render('admin/category/category.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }

    #[Route('/admin/category/save', name: 'app_admin_category_save',methods: 'POST')]
    public function save(Request $request,ManagerRegistry $doctrine): Response
    {

        $entityManager = $doctrine->getManager();

        $category = new Categories();
        $category->setCategory($request->get("category"));
        $category->setDescription($request->get("description"));
        $category->setPostingDate($request->get("posting_date"));
        $category->setStatus($request->get("status"));
        $category->setSlug($request->get("slug"));

        $entityManager->persist($category);
        $entityManager->flush();


        return $this->render('admin/category/category.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }

    #[Route('/admin/category/manage', name: 'app_admin_category_manage')]
    public function manage(CategoriesRepository $categoriesRepository): Response
    {
        $categoriesList=$categoriesRepository->findAll();
        return $this->render('admin/category/manage.html.twig', [
            'categoriesList' => $categoriesList,

        ]);
    }

    #[Route('/admin/category/edit/{id}', name: 'app_admin_category_edit')]
    public function edit(CategoriesRepository $categoriesRepository,$id): Response
    {

        $rs=$categoriesRepository->find($id);

        return $this->render('admin/category/edit.html.twig', [
            'rs' => $rs

        ]);
    }

    #[Route('/admin/category/update/{id}', name: 'app_admin_category_update',methods: 'POST')]
    public function update(Request $request,ManagerRegistry $doctrine,$id): Response
    {
        $entityManager = $doctrine->getManager();
        $category = $entityManager->getRepository(Categories::class)->find($id);

        $category->setCategory($request->get("category"));
        $category->setDescription($request->get("description"));
        $category->setPostingDate($request->get("posting_date"));
        $category->setStatus($request->get("status"));
        $category->setSlug($request->get("slug"));
        $entityManager->flush();



        return $this->redirectToRoute('app_admin_category_manage');


    }

    #[Route('/admin/category/delete/{id}', name: 'app_admin_category_delete')]
    public function delete(ManagerRegistry $doctrine,$id): Response
    {
        $entityManager = $doctrine->getManager();
        $category = $entityManager->getRepository(Categories::class)->find($id);
        $entityManager->remove($category);
        $entityManager->flush();

        return $this->redirectToRoute('app_admin_category_manage');


    }
}
