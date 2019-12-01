<?php
// src/Controller/homePageController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;// для роботи логгера


class homePageController extends AbstractController
{

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }


    /**
     * @Route("/", name="app_homepage")
     */
    public function homePage(Request $request, LoggerInterface $logger)
    {
        $logger->info('I just got the logger'); // текст повідомлення для роботи яке буде виводтитись в log
        $logger->error('An error occurred'); // текст повідомлення для роботи яке буде виводтитись в log
        $logger->debug('Debug message'); // // текст повідомлення для роботи яке буде виводтитись в log

        $logger->critical('I left the oven on!', [ // // текст повідомлення для роботи яке буде виводтитись в log
            // include extra "context" info in your logs
            'cause' => 'iddddddddddy',
        ]);
        echo "<script>console.group('вввввввввввввввв');console.groupEnd();</script>";
        return $this->render('Home/home.html.twig', [

        ]);

    }



}