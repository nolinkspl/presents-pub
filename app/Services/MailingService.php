<?php

namespace App\Services;

use App\Models\Gift;
use Exception;
use Mailgun\Mailgun;
use Illuminate\Support\Facades\Mail;
use Psr\Log\LoggerInterface;

class MailingService
{
    private $mailer;
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->mailer = Mailgun::create(getenv('MAILGUN_API_KEY'), getenv('MAILGUN_API_URL'));
        $this->logger = $logger;
    }

    public function sendEmailWithGiftViaSmtp(string $toEmail, Gift $gift): void
    {
        try {
            $data = [
                'gift' => $gift,
            ];

            Mail::send('emails.mail', $data, function ($message) use ($toEmail) {
                $message->to($toEmail, "Dear")->subject('Ваш промокод');
                $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            });
        } catch (\Throwable $e) {
            $message = 'Test email sending failed';
            $this->logger->error(
                $message,
                [
                    'message' => $e->getMessage(),
                    'trace'   => $e->getTraceAsString()
                ]
            );
        }
    }

    public function sendEmailWithGift(string $email, Gift $gift): void
    {
        if ($gift->getType()->name === 'tree') {
            $this->sendEmailWithTree($email, $gift);
        } elseif ($gift->getPic() === null) {
            $this->sendGiftCode($email, $gift);
        } else {
            $this->sendGiftPicture($email, $gift);
        }
    }

    public function sendGiftCode(string $email, Gift $gift): void
    {
        $params = [
            'from'    => env('MAIL_FROM_ADDRESS'),
            'to'      => $email,
            'subject' => 'Ваш промокод',
            'html'    => '
                <html>
                <section class="hero">
				<div class="hero__decoration"></div>
				    <div class="hero-wrapper">
					    <div class="hero-wrapper__inner">
						    <h3 class="hero__title">С праздником!</h3>
					    </div>
						<div class="hero__main-img flex-center position-ref" >
							<div class="content">
							    ' . $gift->getType()->description_head . '
							    <br><br>
                                    Код вашего подарка: <span style="color:black; font-size:14px; font-weight: 900;">'. $gift->getCode() .'</span>
                                ' . $this->getPinHtml($gift) . '
                                <br><br>
                                <div width="100">
                                    ' . $gift->getType()->description . '
                                </div>
                            </div>
						</div>
					<br><br>
                    </div>
                    <img style="width:114px; height:45px;" src='. asset("/img/logo_ehrmann.png") .' alt="Логотип Ehrmann" />
                </div>
                </section>
                </html>
            ',
        ];

        $this->sendEmail($params);
    }

    public function sendGiftPicture(string $email, Gift $gift): void
    {
        $params = [
            'from'    => env('MAIL_FROM_ADDRESS'),
            'to'      => $email,
            'subject' => 'Ваш промокод',
            'html'    => '
                <html>
                <section class="hero">
				<div class="hero__decoration"></div>
				    <div class="hero-wrapper">
					    <div class="hero-wrapper__inner">
						    <h3 class="hero__title">С праздником!</h3>
					    </div>
						<div class="hero__main-img flex-center position-ref" >
							<div class="content">
                                <div width="100">
                                    ' . $gift->getType()->description . '
                                </div>
                            </div>
						</div>
					<br><br>
					<div>Сертификат во вложении</div>
					' . $this->getPinHtml($gift) . '
					<br><br>
                    </div>
                    <img style="width:114px; height:45px;" src='. asset("/img/logo_ehrmann.png") .' alt="Логотип Ehrmann" />
                </div>
                </section>
                </html>
            ',
            'inline' => [
                [
                    'filename' => $gift->code . '.jpg',
                    'fileContent' => $gift->getPic(),
                    'cid' => 'image',
                ],
            ],
        ];

        $this->sendEmail($params);
    }

    public function sendEmailWithTree(string $email, Gift $gift)
    {
        $params = [
            'from'    => env('MAIL_FROM_ADDRESS'),
            'to'      => $email,
            'subject' => 'Ваш промокод',
            'html'    => '
                <html>
                <section class="hero">
				<div class="hero__decoration"></div>
				    <div class="hero-wrapper">
					    <div class="hero-wrapper__inner">
						    <h3 class="hero__title">С праздником!</h3>
					    </div>
						<div class="hero__main-img flex-center position-ref" >
							<div class="content">
                                <div width="100">
                                    ' . $gift->getType()->description . '
                                </div>
                            </div>
						</div>
					<br><br>
                    </div>
                    <img style="width:114px; height:45px;" src='. asset("/img/logo_ehrmann.png") .' alt="Логотип Ehrmann" />
                </div>
                </section>
                </html>
            ',
        ];

        $this->sendEmail($params);
    }

    private function sendEmail(array $params)
    {
        try {
            $this->mailer->messages()->send(env('MAIL_DOMAIN'), $params);
        } catch (Exception $e) {
            $message = 'Test email sending failed';
            $this->logger->error(
                $message,
                [
                    'message' => $e->getMessage(),
                    'trace'   => $e->getTraceAsString()
                ]
            );
        }
    }

    public function sendEmailTemplateToList(string $template, string $listAlias, string $subject): void
    {
        $params = [
            'from' => env('MAIL_FROM_ADDRESS'),
            'to' => $listAlias,
            'subject' => $subject,
            'template' => $template,
        ];

        try {
            $this->mailer->messages()->send(getenv('MAIL_DOMAIN'), $params);
        } catch (Exception $e) {
            $message = 'Test email sending failed';
            $this->logger->error(
                $message,
                [
                    'message' => $e->getMessage(),
                    'trace'   => $e->getTraceAsString()
                ]
            );
        }
    }

    private function getPinHtml(Gift $gift): string
    {
        if ($gift->getPin() === '') {
            return '';
        }

        return '<br><br>ПИН: <span style="color:black; font-size:14px; font-weight: 900;">'
            . $gift->getPin() .'</span>';
    }
}
