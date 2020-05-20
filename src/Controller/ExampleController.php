<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/example")
 */
class ExampleController extends AbstractController
{
    /**
     * @Route("/", name="example")
     */
    public function index()
    {
        return $this->render('example/index.html.twig', [
            'controller_name' => 'ExampleController',
        ]);
    }
    /**
     * @Route("/email", name="example_email")
     */
    public function email(\Swift_Mailer $mailer)
    {
        $message = (new \Swift_Message('Object'))
            ->setFrom('send@example.com')
            ->setTo('recipient@example.com')
            ->setBody(
                $this->renderView(
                    // templates/emails/example.html.twig
                    'emails/example.html.twig',
                ),
                'text/html'
            );

        $mailer->send($message);


        return new Response(
            '<html><body>Email Send</body></html>'
        );
    }
}
