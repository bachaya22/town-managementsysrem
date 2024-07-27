<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Installment;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
class RemainderMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'installment:send-reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder emails for installments due in 5 days';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get the current date and date 5 days from now
        $now = Carbon::now();
        $dateInFiveDays = $now->addDays(5)->toDateString();

        // Fetch installments due in 5 days with status pending
        $installments = Installment::where('installment_status', 'pending')
            ->whereDate('date', $dateInFiveDays)
            ->with('booking.customer')
            ->get();

        // Loop through each installment and send email
        foreach ($installments as $installment) {
            $customerEmail = optional($installment->booking->customer)->email;

            if ($customerEmail) {
                Mail::send('superadmin.content.installment.mail', ['installment' => $installment], function ($message) use ($customerEmail) {
                    $message->to($customerEmail)->subject("Installment Reminder");
                });

                $this->info("Reminder email sent to: {$customerEmail}");
            } else {
                $this->warn("No customer email found for installment ID: {$installment->id}");
            }
        }
    }
}
