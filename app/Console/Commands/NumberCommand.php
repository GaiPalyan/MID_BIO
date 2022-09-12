<?php

namespace App\Console\Commands;

use App\Domain\Number\NumberManager;
use App\Domain\User\UserManager;
use App\Services\Number\NumberCreator;
use App\Services\Number\NumberReport;
use Illuminate\Console\Command;

class NumberCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exec:number {--a|action=get} {--id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(NumberManager $numberManager, UserManager $userManager): void
    {
        $number = match ($this->option('action')) {
            'set' => $numberManager->storeNumber(
                NumberCreator::generate(),
                $userManager->getUser('test@test')
            ),
            'get' => $numberManager->getNumber($this->option('id'))
        };

        $this->info('Your number ' . json_encode([
                'number_id' => $number->id,
                'number_value' => $number->number,
                'created_by_id' => $number->created_by
            ])
        );
    }
}
