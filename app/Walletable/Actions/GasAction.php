<?php

namespace App\Walletable\Actions;

use Walletable\Internals\Actions\ActionData;
use Walletable\Internals\Actions\ActionInterface;
use Walletable\Models\Transaction;

class GasAction implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public function apply(Transaction $transaction, ActionData $data)
    {
        $quantity = $data->argument(0)->type('int')->value();

        $title = 'Gas: ' . $quantity . ' KG';
        $transaction->forceFill([
            'action' => 'gas'
        ])
        ->meta('title', $title);
        $transaction->meta('quantity', $quantity);
    }

    /**
     * {@inheritdoc}
     */
    public function title(Transaction $transaction)
    {
        return $transaction->meta('title');
    }

    /**
     * {@inheritdoc}
     */
    public function image(Transaction $transaction)
    {
        return '/assets/media/svg/icons/Electric/Gas-stove.svg';
    }

    /**
     * {@inheritdoc}
     */
    public function details(Transaction $transaction)
    {
        return \collect([]);
    }

    /**
     * {@inheritdoc}
     */
    public function suppportDebit(): bool
    {
        return true;
    }


    /**
     * {@inheritdoc}
     */
    public function suppportCredit(): bool
    {
        return false;
    }
}
