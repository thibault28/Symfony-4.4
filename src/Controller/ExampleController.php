<?php

namespace App\Controller;

use App\Entity\Example;
use App\Form\ExampleType;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Dompdf\Dompdf;

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
     * @Route("/add", name="add")
     */
    public function add(Request $request)
    {

        $examples = new Example();
        $form = $this->createForm(ExampleType::class, $examples);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {


            $em = $this->getDoctrine()->getManager();

            $em->persist($examples);
            $em->flush();

            return $this->redirectToRoute('example');
        }

        return $this->render('example/add.html.twig', [
            'form' => $form->createView(),
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

    /**
     * @Route("/translate", name="translate")
     */
    public function translate()
    {

        return $this->render('example/translate.html.twig', []);
    }

    /**
     * @Route("/pdf", name="pdf")
     */
    public function pdf()
    {
        $dompdf = new DOMPDF();

        $html = ob_get_clean();
        $html .= $html = $this->renderView('example/pdf.html.twig', []);

        $dompdf->load_html($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        //Attachment => true Téléchargement
        //Attachment => false Vue dans le navigateur

        $dompdf->stream("test.pdf", ["Attachment" => false]);
    }

    /**
     * @Route("/excel", name="excel")
     */
    public function excel()
    {

        $spreadsheet = new Spreadsheet();

        /* @var $sheet \PhpOffice\PhpSpreadsheet\Writer\Xlsx\Worksheet */
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');
        $sheet->setTitle("My First Worksheet");

        // Create your Office 2007 Excel (XLSX Format)
        $writer = new Xlsx($spreadsheet);

        // Create a Temporary file in the system
        $fileName = 'my_first_excel_symfony4.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);

        // Create the excel file in the tmp directory of the system
        $writer->save($temp_file);

        // Return the excel file as an attachment
        return $this->file($temp_file, $fileName, ResponseHeaderBag::DISPOSITION_INLINE);
    }
}
