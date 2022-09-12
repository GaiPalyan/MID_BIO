<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Domain\Number\NumberManager;
use App\Jobs\SendReportMail;
use App\Services\Number\NumberReporter;
use Illuminate\Console\Command;

class ReportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate number report file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(NumberManager $numberManager)
    {
        NumberReporter::generate($numberManager->getAllNumbers());

        $reportFile = NumberReporter::getReport();
        dump($reportFile);
        SendReportMail::dispatch()->onQueue('report_mail');

        $this->info('Report sent by email as report.txt file');
    }
}
