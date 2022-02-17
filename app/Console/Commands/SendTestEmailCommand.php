<?php

namespace App\Console\Commands;

use App\Repositories\GiftRepository;
use App\Services\MailingService;
use Psr\Log\LoggerInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendTestEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send_test_email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test send email';

    public function handle(
        GiftRepository $giftRepository,
        MailingService $mailingService,
        LoggerInterface $logger
    ) {
        try {
           // $mailingService->sendEmailTemplateToList('test22', 'info@newyear-ehrmann.ru', 'Новогодний подарок от Эрманн, напоминание');

            $mailingService->sendGiftPicture(
                'arsnag03@gmail.com',
                $giftRepository->findByInviteId(135)
            );

            echo "Successful test email sending";
        } catch (\Throwable $e) {
            $message = 'Test email sending failed';
            $logger->error(
                $message,
                [
                    'message' => $e->getMessage(),
                    'trace'   => $e->getTraceAsString()
                ]
            );
            $this->error($message);
            var_dump($e->getMessage());
        }

    }
}
