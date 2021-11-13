<?php

namespace Soap\Ami\Commands;

use Illuminate\Console\Command;
use React\EventLoop\Loop;
use Clue\React\Ami\Factory;
use Clue\React\Ami\Client;
use Clue\React\Ami\ActionSender;
use Clue\React\Ami\Protocol\Response;

class AmiCommand extends Command
{
    public $signature = 'ami:cli {uri} {action}';

    public $description = 'Send one command to Asterisk and exit';

    public function handle(): int
    {
        $this->startProcess();
        $this->comment('All done');

        return self::SUCCESS;
    }

    protected function startProcess()
    {
        $factory = new Factory();

        $factory->createClient($this->arguments('uri'))->then(function (Client $client) {
            echo 'Client connected. Use STDIN to send CLI commands via asterisk AMI.' . PHP_EOL;
            $sender = new ActionSender($client);

            $sender->events(false);

            $sender->listCommands()->then(function (Response $response) {
                echo 'Commands: ' . implode(', ', array_keys($response->getFields())) . PHP_EOL;
            });

            $client->on('close', function () {
                echo 'Closed' . PHP_EOL;

                Loop::removeReadStream(STDIN);
            });

            Loop::addReadStream(STDIN, function () use ($sender) {

                $line = trim(fread(STDIN, 4096));

                echo '<' . $line . PHP_EOL;

                $sender->command($line)->then(
                    function (Response $response) {
                        echo $response->getCommandOutput() . PHP_EOL;
                    },
                    function (Exception $error) use ($line) {
                        echo 'Error executing "' . $line . '": ' . $error->getMessage() . PHP_EOL;
                    }
                );
            });
        }, function (Exception $error) {
            echo 'Connection error: ' . $error;
        });
    }
}
