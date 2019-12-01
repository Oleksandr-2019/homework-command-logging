<?php
// src/Controller/contaktPageController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;// для роботи логгера


class contaktPageController extends AbstractController
{

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $appLogger)
    {
        $this->logger = $appLogger;
    }


    /**
     * @Route("/contakt", name="app_contakt")
     */
    public function homePage(Request $request, LoggerInterface $logger)
    {
        $logger->info('It custom applogger'); // текст повідомлення для роботи яке буде виводтитись в log

        return $this->render('Contakt/contakt.html.twig', [

        ]);

    }



}