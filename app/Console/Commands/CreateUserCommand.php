<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Repositories\DepartmentRepository;
use App\Repositories\UserRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Psr\Log\LoggerInterface;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create_user {--email=} {--password=} {--name=} {--role=}';

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
            $user->role = $this->option('role');

            $user->save();

            $this->info("User successfully created");
        } catch (\Throwable $exception) {
            $message = 'User creation failed';
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
