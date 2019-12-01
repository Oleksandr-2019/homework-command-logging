<?php
// src/Command/CreateUserCommand.php
namespace App\Command;

use App\Service\UserManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:create-user';

    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Creates a new user.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to create a user...')

            //->addArgument('password', $this->requirePassword ? InputArgument::REQUIRED : InputArgument::OPTIONAL, 'User password')
            ->addArgument('username', InputArgument::REQUIRED, 'The username of the user.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        //виводить на консоль кілька рядків (додаючи "\ n" в кінці кожного рядка)
        $output->writeln([
            'User Creator',
            '============',
            '',
        ]);

        // значення, повернене someMethod (), може бути ітератором (https://secure.php.net/iterator)
        //, яка генерує та повертає повідомлення із ключовим словом PHP 'yield'
        //$output->writeln($this->someMethod());

        $output->writeln('Username: '.$input->getArgument('username'));

        //виводить повідомлення з подальшим символом "\ n"
        $output->writeln('Whoa!');

        //виводить повідомлення, не додаючи "\ n" в кінці рядка
        $output->write('You are about to ');
        $output->write('create a user.');

        $this->userManager->create($input->getArgument('username'));

        $output->writeln('User successfully generated!');
        
        return 5555;

    }

}




