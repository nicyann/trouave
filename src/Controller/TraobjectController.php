<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\County;
use App\Entity\State;
use App\Entity\Traobject;
use App\Form\TraobjectType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormTypeInterface;

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
     * @Route("traobject/new", name="traobject_create", methods="GET|POST")
     */
    public function create(Request $request, ObjectManager $manager)
    {
        $traobject =new Traobject();
        
        
        $form = $this->createForm(TraobjectType::class, $traobject);
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $traobject->setCreatedAt(new \DateTime());
            $em =$this->getDoctrine()->getManager();
            $em->persist($traobject);
            $em->flush();
    
            return $this->redirectToRoute('traobject_create');
        }
        
    return $this->render('traobject/create.html.twig',[
        'form' => $form->createView()
        ]);
        


    }
    
    /**
     * @Route ("/traobject/{id}", name="show_traobject")
     */
    public function show($id)
    {
        
        $traobj = $this->getDoctrine()->getRepository(Traobject::class)->find($id);
        
        $cat= $this->getDoctrine()->getRepository(Category::class)->find($id);
        $cattraobjects = $this->getDoctrine()->getRepository(Traobject::class)->findBy(['category' => $cat]);
    
        $county= $this->getDoctrine()->getRepository(County::class)->find($id);
        $countytraobjects = $this->getDoctrine()->getRepository(Traobject::class)->findBy(['county' => $county]);
        
        
        return $this->render('traobject/show.html.twig', [
            'traobj' => $traobj,
            'cattraobjects' => $cattraobjects,
            'countytraobjects' => $countytraobjects
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
