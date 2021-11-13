<?php

namespace Soap\Ami\Commands;

use Illuminate\Console\Command;

class AmiCommand extends Command
{
    public $signature = 'ami:cli {uri} {command}';

    public $description = 'Send one command to Asterisk and exit';

    public function handle(): int
    {
        $url = config('connections.ami.uri');
        $this->info($url);
        $this->comment('All done');

        return self::SUCCESS;
    }
}
