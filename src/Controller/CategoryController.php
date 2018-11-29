<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Traobject;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{id}", name="category")
     */
    public function index(Category $category)
    {
        return $this->render('category/index.html.twig', [
            'category' => $category,
        ]);
    }
    public function  catlist()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        
        return $this->render('category/catlist.html.twig', ['categories' => $categories]);
    }
    

}
