<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $user->full_name }}`s Account statement</title>
    <style>
        .soft-border {
            border-collapse: collapse;
        }
        
        .soft-border td, .transactions th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .information-table {
            margin: 10px 20px;
            width: 100%;
        }
        
        .td-name {
            background-color: #04AA6D;
            color: white;
        }

        .transactions {
            margin: 10px 20px;
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            font-size: 12px;
            /* transform: scale(3, 0.5); */
            width: 100%;
        }
        
        .transactions td, .transactions th {
            border: 1px solid #ddd;
            padding: 4px;
            padding-top: 7px;
            padding-bottom: 7px;
        }
        
        .transactions tr:nth-child(even){background-color: #f2f2f2;}
        
        .transactions tr:hover {background-color: #ddd;}
        
        .transactions th {
            padding-top: 7px;
            padding-bottom: 7px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>

    <img style="margin: 0px 20px;" src="logo-dark.png" alt="">
    <h2 style="margin: 0px 20px;">CUSTOMER ACCOUNT STATEMENT</h2>

    {{-- Information table --}}
    <table class="information-table">
        <tr>
            <td style="width: 60%; font-size: 12px;" vartical-align="top">
                {{-- User information table --}}
                <h4>{{ $user->full_name }}</h4>
                <table>
                    <tr>
                        <td style="width: 100px">Address:</td>
                        <td>{{ $user->address }}</td>
                    </tr>
                    <tr>
                        <td style="width: 100px">Branch:</td>
                        <td>{{ $branch }}</td>
                    </tr>
                    <tr>
                        <td style="width: 100px">Preriod:</td>
                        <td>Account statement from {{ $from->format('F d, Y') }} to {{ $to->format('F d, Y') }}</td>
                    </tr>
                    <tr>
                        <td style="width: 100px">Print Date:</td>
                        <td>{{ now()->format('F d, Y') }}</td>
                    </tr>
                </table>
            </td>
            <td style="width: 200px;">
                {{-- User information table --}}
                <table class="soft-border" style="width: 100%; font-size: 12px;">
                    <tr>
                        <td class="td-name" style="width: 100px">Currency:</td>
                        <td style="width: 100px; text-align: right; font-weight: bold;">{{ $user->currency }}</td>
                    </tr>
                    <tr>
                        <td class="td-name" style="width: 100px">Past Due Amount:</td>
                        <td style="width: 100px; text-align: right; font-weight: bold;">{{ display_money($past_due) }}</td>
                    </tr>
                    <tr>
                        <td class="td-name" style="width: 100px">Opening Balance:</td>
                        <td style="width: 100px; text-align: right; font-weight: bold;">{{ display_money($open_balance) }}</td>
                    </tr>
                    <tr>
                        <td class="td-name" style="width: 100px">Total Debit:</td>
                        <td style="width: 100px; text-align: right; font-weight: bold;">{{ display_money($total_debit) }}</td>
                    </tr>
                    <tr>
                        <td class="td-name" style="width: 100px">Total Credit:</td>
                        <td style="width: 100px; text-align: right; font-weight: bold;">{{ display_money($total_credit) }}</td>
                    </tr>
                    <tr>
                        <td class="td-name" style="width: 100px">Closing Balance:</td>
                        <td style="width: 100px; text-align: right; font-weight: bold;">{{ display_money($close_balance) }}</td>
                    </tr>
                    <tr>
                        <td class="td-name" style="width: 100px">Debit Count:</td>
                        <td style="width: 100px; text-align: right; font-weight: bold;">{{ $debit_count }}</td>
                    </tr>
                    <tr>
                        <td class="td-name" style="width: 100px">Credit Count:</td>
                        <td style="width: 100px; text-align: right; font-weight: bold;">{{ $credit_count }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>



<table class="transactions">
    <tr>
        <th>Date</th>
        <th>Naration</th>
        <th>Bank Name</th>
        <th>Refrence</th>
        <th>Debit</th>
        <th>Credit</th>
        <th>Balance</th>
    </tr>
    @foreach ($transactions as $transaction)
        <tr>
            <td>{{ $transaction->created_at->format('F d, Y') }}</td>
            <td>{{ $transaction->title }}</td>
            <td>{{ $transaction->bank_name }}</td>
            <td>{{ substr($transaction->id, 0, 10) }}</td>
            <td>{{ ($transaction->action === 'debit') ? display_money($transaction->amount) : null }}</td>
            <td>{{ ($transaction->action === 'credit') ? display_money($transaction->amount) : null }}</td>
            <td>{{ display_money($transaction->balance) }}</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="4"><strong>Total</strong></td>
        <td>{{ display_money($total_debit) }}</td>
        <td>{{ display_money($total_credit) }}</td>
        <td></td>
    </tr>
  </table>
  <br>
  <br>
  <div style="text-align: center; font-size: 13px;">
    <span style="color: red;">Your Overdue Loan Repayment (Past Due) to {{ config('app.name') }} Limited is {{ display_money($past_due) }}</span><br>
    <span>************************************* END OF STATEMENT - Generated on {{ today()->format('F d, Y') }} *************************************</span>
  </div>
    
</body>
</html>