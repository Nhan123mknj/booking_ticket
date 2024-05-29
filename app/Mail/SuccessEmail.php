<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuccessEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $messageContent;
    public $qrCodePath;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messageContent, $subject, $qrCodePath)
    {
        $this->messageContent = $messageContent;
        $this->subject = $subject;
        $this->qrCodePath = $qrCodePath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail_qr')
                    ->subject($this->subject)
                    ->with([
                        'messageContent' => $this->messageContent,
                    ])
                    ->attach($this->qrCodePath, [
                        'as' => 'qr_code.png',
                        'mime' => 'image/png',
                    ]);
    }
}
