<?php

namespace App\Walletable\Actions;

use Walletable\Internals\Actions\ActionInterface;
use Walletable\Internals\Actions\ActionData;
use Walletable\Models\Transaction;
use Walletable\Internals\Details\Info;
use Walletable\Internals\Details\Section;
use Walletable\Money\Money;

class BankTransferAction implements ActionInterface
{
    /**
     * {@inheritdoc}
     */
    public function apply(Transaction $transaction, ActionData $data)
    {
        $transaction->forceFill([
            'action' => 'bank_transfer'
        ]);

        if ($transaction->type === 'credit') {
            $this->applyCredit($transaction, $data);
        } elseif ($transaction->type === 'debit') {
            $this->applyDebit($transaction, $data);
        }
    }

    /**
     * Apply debit
     */
    protected function applyCredit(Transaction $transaction, ActionData $data)
    {
        $name = $data->argument(0)->type('str')->value();
        $accountNumber = $data->argument(1)->type('numeric')->value();
        $bank = $data->argument(2)->type('str')->value();
        $bankCode = $data->argument(3)->type('numric')->value();

        $transaction->meta('sender.name', $name);
        $transaction->meta('sender.acoount_number', $accountNumber);
        $transaction->meta('sender.bank', $bank);
        $transaction->meta('sender.bank_code', $bankCode);
    }

    /**
     * Apply debit
     */
    protected function applyDebit(Transaction $transaction, ActionData $data)
    {
        $name = $data->argument(0)->type('str')->value();
        $accountNumber = $data->argument(1)->type('numeric')->value();
        $bank = $data->argument(2)->type('str')->value();
        $bankCode = $data->argument(3)->type('numeric')->value();
        $fee = $data->argument(4)->isA(Money::class)->value();

        $transaction->meta('beneficiary.name', $name);
        $transaction->meta('beneficiary.acoount_number', $accountNumber);
        $transaction->meta('beneficiary.bank', $bank);
        $transaction->meta('beneficiary.bank_code', $bankCode);
        $transaction->meta('beneficiary.fee', $fee->getInt());
    }

    /**
     * {@inheritdoc}
     */
    public function title(Transaction $transaction)
    {
        if ($transaction->type === 'credit') {
            return $transaction->meta('sender.name');
        } elseif ($transaction->type === 'debit') {
            return $transaction->meta('beneficiary.name');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function image(Transaction $transaction)
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function details(Transaction $transaction)
    {
        if ($transaction->type == 'credit') {
            return $this->creditDetails($transaction);
        }

        if ($transaction->type == 'debit') {
            return $this->debitDetails($transaction);
        }
    }

    /**
     * Details for credit transaction
     */
    public function creditDetails(Transaction $transaction)
    {
        return \collect([
            Section::create(
                'Sender',
                Info::new('name', 'Account name', $transaction->meta('sender.name')),
                Info::new('acoount_number', 'Account number', $transaction->meta('sender.acoount_number')),
                Info::new('bank', 'Bank', $transaction->meta('sender.bank')),
            )
        ]);
    }

    /**
     * Details for debit transaction
     */
    public function debitDetails(Transaction $transaction)
    {
        return \collect([
            Section::create(
                'Beneficiary',
                Info::new('name', 'Account name', $transaction->meta('beneficiary.name')),
                Info::new('acoount_number', 'Account number', $transaction->meta('beneficiary.acoount_number')),
                Info::new('bank', 'Bank', $transaction->meta('beneficiary.bank')),
                Info::new('fee', 'Fee', $transaction->meta('beneficiary.fee'), 'money')
                    ->extra('currency', $transaction->currency),
            )
        ]);
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
        return true;
    }
}
