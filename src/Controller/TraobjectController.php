<?php

namespace App\Controller;

use App\Entity\State;
use App\Entity\Traobject;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TraobjectController extends AbstractController
{
    /**
     * @Route("/", name="traobject")
     */
    public function index()
    {
        return $this->render('traobject/index.html.twig', [
            'controller_name' => 'TraobjectController',
        ]);
    }
    
    /**
     * @Route ("/show/{id}", name="show_traobject")
     */
    public function show($id)
    {
        
        $traobj = $this->getDoctrine()->getRepository(Traobject::class)->find($id);
        
        return $this->render('traobject/show.html.twig', [
            'traobj' => $traobj
        ]);
    }
    
    /**
     * @Route ("/found", name="foundobjet")
     *
     */
    public function ObjectFound()
    {
        $stateTrouve = $this->getDoctrine()->getRepository(State::class)->findOneBy(["label" => State::FOUND]);
        $trouvobjects = $this->getDoctrine()->getRepository(Traobject::class)->findBy(array('state' => $stateTrouve));
        
        return $this->render('traobject/trouvobjet.html.twig', [
            'trouvobjects' => $trouvobjects
        ]);
        
        
    }
    
    /**
     * @Route("/lost" , name="lostobject")
     */
    public function ObjectLost()
    {
        $stateLost =$this->getDoctrine()->getRepository(State::class)->findOneBy(["label" => State::LOST]);
        $lostobjects = $this->getDoctrine()->getRepository(Traobject::class)->findBy(['state' => $stateLost]);
        
        return $this->render('traobject/lostobject.html.twig', [
            'lostobjects' => $lostobjects
        ]);
    }
}
