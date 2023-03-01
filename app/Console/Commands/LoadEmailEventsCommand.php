<?php

namespace App\Console\Commands;

use App\Models\MailgunMail;
use App\Repositories\GiftRepository;
use App\Services\MailingService;
use Mailgun\Mailgun;
use Psr\Log\LoggerInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class LoadEmailEventsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:get_events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load email events';

    
    public function handle(
        LoggerInterface $logger
    ) {
        try {
            $mailgun = Mailgun::create('key-06d6c8c392fea54d130f96f0702e2823', getenv('MAILGUN_API_URL'));
            // $unconfirmedMails = MailgunMail::query()->where()
            $queryString = array(
            //    'ascending'    => 'yes',
               'pretty'       => 'yes',
            //    'id' => 'yX7vunbKRZmBT0iMy3hxfw',
                // 'message-id' => '20230301054615.766fc2d09f95f8db@ehrmann-podarok.ru',
               'to'    => 'arsnag03@gmail.com'
            );

            $response = $mailgun->events()->get(getenv('MAIL_DOMAIN'), $queryString);
            var_dump($response);
            $serialized = serialize($response->getItems());
//            var_dump($serialized);
            var_dump(unserialize($serialized));

            echo "Test";
        } catch (\Throwable $e) {
            $message = 'Test failed';
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
