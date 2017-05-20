<?php

namespace RMGBundle\Controller;

// ici se trouve le chemin de notre entité contact :D
use RMGBundle\Entity\contact;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RMGBundle:Site:index.html.twig');
    }
    // route certainement inutile. Sera supprimé ultérieurement...
    public function roomsAction()
    {
        return $this->render('RMGBundle:Site:rooms.html.twig');
    }
    public function retrogamesAction()
    {
        return $this->render('RMGBundle:Site:retrogames.html.twig');
    }
    public function mangasAction()
    {
        return $this->render('RMGBundle:Site:mangas.html.twig');
    }
    public function arcadeAction()
    {
        return $this->render('RMGBundle:Site:arcade.html.twig');
    }
    public function ddrAction()
    {
        return $this->render('RMGBundle:Site:ddr.html.twig');
    }
    public function blogAction()
    {
        return $this->render('RMGBundle:Site:blog.html.twig');
    }
    public function reservationAction()
    {
        return $this->render('RMGBundle:Site:reservation.html.twig');
    }
    public function contactAction(Request $request)
    {
        // on instancie notre entité contact
        $contact = new contact();

        //on instancie le formulaire via le service form factory
        $formbuilder = $this->get("form.factory")->createBuilder(Formtype::class,$contact);

        // on remplit notre objet formulaire avec les champs que l'on veut
        $formbuilder
        ->add("nom", TextType::class)
        ->add("prenom", TextType::class)
        ->add("adresse", TextType::class)
        ->add("email", TextType::class)
        ->add("sujet", TextareaType::class)
        ->add("Annuler", ResetType::class)
        ->add("Envoyer", SubmitType::class)
        ;

        // on s'occupe maintenant de générer le formulaire avec les champs ainsi fournis
        $form = $formbuilder->getForm();

        // à ce moment on doit aussi vérifier la pertinence des informations que l'utilisateur nous as fournies

        /* Etape 1 on vérifie que la méthode est bien un POST*/

        if($request->isMethod("POST")) {
          // si c'est bon on récupère les infos de l'utilisateur dans l'objet contact
          //grâce à la variable form qui nous as permis de créer le formulaire

          if($form->handleRequest($request)->isValid()) {
            // ces commandes servent à enregistrer les données dans la base
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            // un petit message pour l'utilisateur en tant que feedback
            return $this->render('RMGBundle:Site:index.html.twig');
          }

        }

        // on fait passer ce magnifique formulaire à notre vue
        return $this->render('RMGBundle:Site:contact.html.twig', array (
          'form' => $form->createView(),
        ));
    }
    public function webmapAction()
    {
        return $this->render('RMGBundle:Site:webmap.html.twig');
    }
    public function legalAction()
    {
        return $this->render('RMGBundle:Site:legal.html.twig');
    }

}
