<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Repositories\DepartmentRepository;
use App\Repositories\UserRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Psr\Log\LoggerInterface;

class CreateAdminUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create_admin_user {--email=} {--password=} {--name=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin user';

    public function handle(
        UserRepository $userRepository,
        LoggerInterface $logger
    ) {
        try {
            $email =  $this->option('email');
            if ($userRepository->findByEmail($email) !== null) {
                $this->error('User with this email already exists');
                return;
            }

            $user = new User();
            $user->name = $this->option('name');
            $user->email = $email;
            $user->forceFill([
                'password' => Hash::make($this->option('password')),
                'remember_token' => Str::random(60),
            ]);
            $user->role = 'admin';

            $user->save();

            $this->info("Admin successfully created");

        } catch (\Throwable $exception) {
            $message = 'Admin user creation failed';
            $logger->error(
                $message,
                [
                    'message' => $exception->getMessage(),
                    'trace'   => $exception->getTraceAsString()
                ]
            );
            $this->error($exception->getMessage());
        }
    }
}
