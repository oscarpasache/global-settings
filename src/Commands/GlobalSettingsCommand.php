<?php

namespace OscarPasache\GlobalSettings\Commands;

use Illuminate\Console\Command;

class GlobalSettingsCommand extends Command
{
    public $signature = 'global-settings';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
