<?php

namespace App\Controller;

use App\Entity\Traobject;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage()
    {
        
       $traobjs = $this->getDoctrine()->getRepository(Traobject::class)->findAll();
        return $this->render('default/homepage.html.twig', [
            "traobjs" =>$traobjs
        ]);
    }
}
