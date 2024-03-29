<?php

declare(strict_types=1);

namespace App\Command;

use App\Service\CreateAdminService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class CreateAdminCommand
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
#[AsCommand(
    name: 'app:create-admin',
    description: 'Create a new admin user',
)]
class CreateAdminCommand extends Command
{
    public function __construct(private readonly CreateAdminService $createAdminService)
    {
        parent::__construct();
    }

    /**
     * This method is executed before initialize() and configure()
     *
     * @return void
     */
    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED, 'Email of the admin user')
            ->addArgument('password', InputArgument::REQUIRED, 'Password of the admin user');
    }

    /**
     * This method is executed after interact() and initialize()
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $email = $input->getArgument('email');
        $password = $input->getArgument('password');

        $this->createAdminService->create($email, $password);


        $io->success('Successfully created admin user !');

        return Command::SUCCESS;
    }
}
