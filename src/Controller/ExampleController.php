<?php

namespace App\Controller;

use App\Entity\Example;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/example")
 */
class ExampleController extends AbstractController
{
    /**
     * @Route("/", name="example")
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {
        $examplesQuery = $this->getDoctrine()->getRepository(Example::class)->findAll();

        $examples = $paginator->paginate(
            $examplesQuery, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            10 /*limit per page*/
        );

        return $this->render('example/index.html.twig', [
            'examples' => $examples,
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
