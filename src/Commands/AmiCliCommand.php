<?php

namespace Soap\Ami\Commands;

use Clue\React\Ami\ActionSender;
use Clue\React\Ami\Client;
use Clue\React\Ami\Factory;
use Clue\React\Ami\Protocol\Response;
use Illuminate\Console\Command;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * 
 * @package Soap\Ami\Commands
 */
class AmiCliCommand extends Command
{
    /**
    * The name and signature of the console command.
    *
    * @var string
    */
    protected $signature = 'ami:cli
                    {cli : Command}
                    {--uri= : Asterisk ami url in form of user:secret@host:port }
                    {--autoclose : Close after call command}
                ';

    /**
    * The console command description.
    *
    * @var string
    */
    protected $description = 'Send command from asterisk ami cli';

    /**
     * 
     * @return int 
     * @throws InvalidArgumentException 
     * @throws BindingResolutionException 
     */
    public function handle(): int
    {
        $this->startProcess();

        return self::SUCCESS;
    }

    /**
     * 
     * @return void 
     * @throws InvalidArgumentException 
     * @throws BindingResolutionException 
     */
    protected function startProcess()
    {
        $factory = new Factory();

        $uri = $this->option('uri') ? $this->option('uri') : config('ami.connections.default.uri');

        $factory->createClient($uri)->then(function (Client $client) {
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
            $this->error('Connection error: ' . $error);
        });
    }
}
