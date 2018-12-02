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
    
//    Fonction pour la création du formulaire fonction create qui a comme parametre $request (objet de la requete) la  de la table request
// Object manager manipulation des bases de dpnnées (création , maj, sup)
    /**
     * @Route("traobject/new", name="traobject_create", methods="GET|POST")
     */
    
    public function create(Request $request, ObjectManager $manager)
    {
        $traobject =new Traobject();
        
//        création du formulaire lié à l'article (attaention appel à la classe TraobjectType qui contient les éléments du formulaire)
        $form = $this->createForm(TraobjectType::class, $traobject);
//        Analyse de la requete
        $form->handleRequest($request);
//        vérification si la requete est soumise et valide
        if ($form->isSubmitted() && $form->isValid()) {
            $traobject->setCreatedAt(new \DateTime());
            $em =$this->getDoctrine()->getManager();
            $em->persist($traobject);
            $em->flush();
    
            return $this->redirectToRoute('traobject_create');
        }
//        renvoi de l'objet createview qui correspond à l'affichage de la requette
    return $this->render('traobject/create.html.twig',[
        'form' => $form->createView()
        ]);
        


    }
//    Fonction show pour l'affichage des objets en fonction de l'Id passé en paramètre ici ce sera la categorie et le département
    
    /**
     * @Route ("/traobject/{id}", name="show_traobject")
     */
    public function show(Traobject $traobj)
    {
//        les résultats sont renvoyés dans la vue show de trabobject
//        On résupère les variables
        return $this->render('traobject/show.html.twig', [
            'traobj' => $traobj
        ]);
    }
//    fonction pour la récupération des objets trouvés
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
