<?php

namespace RMGBundle\Controller;

// ici se trouve le chemin de notre entité contact :D
use RMGBundle\Entity\contact;
use RMGBundle\Entity\personne;
use RMGBundle\Form\personneType;
use RMGBundle\Form\contactType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
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
    public function inscriptionAction(Request $request)
    {
      /*

      on instancie l'entité personne

       */
      $personne = new personne();

      //on instancie le formulaire via le service form factory
      $form = $this->get('form.factory')->create(personneType::class, $personne);




      // Si la requête est en POST
    if ($request->isMethod('POST')) {
      // On fait le lien Requête <-> Formulaire
      // À partir de maintenant, la variable $advert contient les valeurs entrées dans le formulaire par le visiteur


      // On vérifie que les valeurs entrées sont correctes
      if($form->handleRequest($request)->isValid()) {


        // On enregistre notre objet $personne dans la base de données, par exemple
        $em = $this->getDoctrine()->getManager();
        $em->persist($personne);
        $em->flush();

        // On redirige vers la page de visualisation de l'annonce nouvellement créée
        return $this->redirectToRoute('rmg_homepage');
      }
    }




      // on affiche le formulaire
      return $this->render('RMGBundle:Site:inscription.html.twig', array (
        'form' => $form->createView(),
      ));
    }


    public function contactAction(Request $request)
    {
        // on instancie notre entité contact
        $contact = new contact();

        //on instancie le formulaire via le service form factory
        $form = $this->get('form.factory')->create(contactType::class, $contact);

        // on remplit notre objet formulaire avec les champs que l'on veut


        // on s'occupe maintenant de générer le formulaire avec les champs ainsi fournis


        // à ce moment on doit aussi vérifier la pertinence des informations que l'utilisateur nous as fournies

        /* Etape 1 on vérifie que la méthode est bien un POST*/

        if($request->isMethod("POST")) {
          // si c'est bon on récupère les infos de l'utilisateur dans l'objet contact
          //grâce à la variable form qui nous as permis de créer le formulaire

          if($form->handleRequest($request)->isValid()) {
            // On choppe tous les éléments qui se trouvent dans le formulaire (qui sont sous la forme d'un tableau)

            $data = $request->get('form');
            // On a plus qu'à parcourir chaque élément pour récupérer ce que l'on veut :D

            $sendmail = $data["email"];
            $nom = $data["nom"];
            $prenom = $data["prenom"];
            $adresse = $data["adresse"];
            $sujet = $data["sujet"];
            $date = $contact->getDatecreation()->format('Y-m-d H:i:s');

            // ces commandes servent à enregistrer les données dans la base
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();


            // ici s'annonce le traitement de la requête pour envoi par mail aux différents partis

            $messagetouser = \Swift_Message::newInstance()
              ->setSubject('Notification : Contact envers la société RetroManGames')
              ->setFrom('retromangames1995@gmail.com')
              ->setTo($sendmail)
              ->setBody(
            $this->renderView(
                'Emails/notificationUser.html.twig',
                array(
                  'nom' => $nom,
                  'prenom' => $prenom,
                  'sujet' => $sujet
                )
            ),
            'text/html');

            $this->get('mailer')->send($messagetouser);

            $messagetoadmin = \Swift_Message::newInstance()
              ->setSubject('Notification : Contact de M/Mme'.$nom." ".$prenom)
              ->setFrom('retromangames1995@gmail.com')
              ->setTo('m.khayat92@gmail.com')
              ->setBody(
            $this->renderView(
                'Emails/notificationAdmin.html.twig',
                array(
                  'nom' => $nom,
                  'prenom' => $prenom,
                  'sujet' => $sujet,
                  'datecreation' => $date
                )
            ),
            'text/html');
            $this->get('mailer')->send($messagetoadmin);

            return $this->render('RMGBundle:Site:index.html.twig');
          }

        }

        // on fait réafficher le formulaire si il a merdé xD
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
    public function comingsoonAction()
    {
      return $this->render('RMGBundle:Site:comingsoon.html.twig');
    }


}