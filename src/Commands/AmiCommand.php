<?php

namespace Soap\Ami\Commands;

use Illuminate\Console\Command;

class AmiCommand extends Command
{
    public $signature = 'ami:cli';

    public $description = 'Send one command to Asterisk and exit';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
