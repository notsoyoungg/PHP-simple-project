<?php

namespace App\Mail;

use App\Models\Lessons;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendLessonNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $lesson;

    /**
     * Create a new message instance.
     */
    public function __construct(Lessons $lesson)
    {
        $this->lesson = $lesson;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Lesson Notification',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
//        dd($this->lesson->student->class);
        return new Content(
            view: 'lesson_notification',
            with: ['data'=> $this->lesson]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
