<?php

namespace Soap\Ami\Commands;

use Clue\React\Ami\ActionSender;
use Clue\React\Ami\Client;
use Clue\React\Ami\Factory;
use Clue\React\Ami\Protocol\Response;
use Illuminate\Console\Command;

class AmiCliCommand extends Command
{
    /**
    * The name and signature of the console command.
    *
    * @var string
    */
    protected $signature = 'ami:cli
                    {uri : Asterisk ami url in form of user:secret@host:port }
                    {cli : Command}
                    {--autoclose : Close after call command}
                ';

    /**
    * The console command description.
    *
    * @var string
    */
    protected $description = 'Send command from asterisk ami cli';

    public function handle(): int
    {
        $this->startProcess();

        return self::SUCCESS;
    }

    protected function startProcess()
    {
        $factory = new Factory();


        $factory->createClient($this->argument('uri'))->then(function (Client $client) {
            $this->info('Client connected.');
            $this->info('Press Ctrl + C to exit.');
            $sender = new ActionSender($client);

            $sender->events(false);

            $client->on('close', function () {
                $this->info('Connection closed');
            });
            $command = $this->argument('cli');
            $this->info("Try command " . $command . " ....");
            $sender->command($command)->then(
                function (Response $response) use ($client) {
                    $this->info($response->getCommandOutput());
                    $client->end();
                },
                function (Exception $error) use ($command) {
                    $this->error('Error executing "' . $command . '": ' . $error->getMessage());
                }
            );
        }, function (Exception $error) {
            echo 'Connection error: ' . $error;
        });
    }
}
