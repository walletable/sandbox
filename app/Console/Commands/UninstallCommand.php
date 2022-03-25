<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UninstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'walletable:uninstall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Unprepares Walletable for use';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line("<info>Deleting Walletable files</info>");
        $this->line("");

        // Delete files for config
        unlink(config_path('walletable.php'));

        // Delete files for config
        unlink(app_path('Models/Wallet.php'));
        unlink(app_path('Models/Transaction.php'));
        unlink(app_path('Models/Hold.php'));

        // Delete files for migration
        unlink(database_path('migrations/2020_12_25_001500_create_wallets_table.php'));
        unlink(database_path('migrations/2020_12_25_001600_create_transactions_table.php'));
        unlink(database_path('migrations/2020_12_25_001700_create_holds_table.php'));

        $this->line("");
        $this->line("<info>Walletable uninstalled sucessfully!!</info>");
    }
}
