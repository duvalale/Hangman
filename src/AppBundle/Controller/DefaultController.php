<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type;
use AppBundle\Form\Model;
use AppBundle\Form\Model\Contact;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="home")
     */
    public function homeAction() {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/game", name="game")
     */
    public function gameAction() {
        return $this->render('default/game.html.twig');
    }

    /**
     * @Route("/won", name="won")
     */
    public function wonAction() {
        return $this->render('default/won.html.twig');
    }

    /**
     * @Route("/failed", name="failed")
     */
    public function failedAction() {
        return $this->render('default/failed.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction(Request $request) {
        $contact = new Contact();

        $form = $this->createForm(Type\ContactType::class, $contact)
            ->add('save', SubmitType::class, array('label' => 'Create Post'));


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $message = \Swift_Message::newInstance()
                ->setSubject($contact->getSubject())
                ->setFrom('send@alex.com')
                ->setTo($contact->getEmail())
                ->setBody(
                    $this->renderView(
                    // app/Resources/views/Emails/registration.html.twig
                        'Emails/contactEmail.html.twig',
                        array(
                            'name' => $contact->getEmail(),
                            'message' => $contact->getMessage()
                        )
                    ),
                    'text/html'
                );
            $this->get('mailer')->send($message);
            $this->addFlash('success', 'Thanks for contacting us !');

            return $this->redirectToRoute('contact');
        }

        return $this->render('default/contact.html.twig',array(
            'formContact' => $form->createView()
        ));
    }

    /**
     * @Route("/_error/404", name="404")
     */
    public function error404Action() {
        return $this->render('Exception/error404.html.twig');
    }
}
