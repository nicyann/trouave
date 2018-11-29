<?php

namespace App\Controller;

use App\Entity\County;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CountyController extends AbstractController
{
    /**
     * @Route("/county", name="county")
     */
    public function index(County $county)
    {
        return $this->render('county/index.html.twig', [
            'County' => $county,
        ]);
    }
    public function countylist()
    {
        $counties =$this->getDoctrine()->getRepository(County::class)->findAll();
        
        return $this->render('county/county.html.twig', ['counties' =>$counties]);
        
        
    }
}
