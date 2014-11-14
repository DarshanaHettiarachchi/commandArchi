<?php namespace Dnh\CommandArchi;

interface CommandBus {

    /**
     * Execute a command
     *
     * @param $command
     * @return mixed
     */
    public function execute($command);

}