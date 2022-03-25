<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ICA Document For {{ $investment->name }}</title>
</head>
<body>
    <img src="img/lh-head.jpg" style="width: 100%;"/>
    <div style="margin-left: 25px;margin-right: 25px">

    <br>
    <h1 style="text-align: center;">
        VOLTAC GLOBAL CAPITAL
    </h1>
    <h5 style="text-align: center;">
        Investment Agreement
    </h5>

    <p style="text-align: center">
        This Agreement is made this {{ $investment->start_at->format('d') }} day of {{ $investment->start_at->format('F') }} {{ $investment->start_at->format('Y') }}
    </p>

    <h4 style="text-align: center;">
        BETWEEN
    </h4>

    <p>
        <strong>VOLTAC GLOBAL CAPITAL LIMITED</strong>, a well governed organization in Nigeria whose registered office is situated at <strong>3, Williams Street, Off Diya Street, Gbagada, Lagos State</strong> (Hereinafter referred to as the “<strong>Company</strong>” which expression shall, where the context so admits include its successors-in-title and assigns) of the <strong>ONE PART</strong>.
    </p>

    <h4 style="text-align: center;">
        AND
    </h4>

    <p>
        <strong>{{ $investment->name }}</strong> (Hereinafter referred to as the “<strong>Investor</strong>” which expressions where the context so admits include his heirs, executors, administrators and assigns) of the <strong>OTHER PART</strong>.
    </p>


    <h4>
        WHEREAS:
    </h4>
    <ol>
        <li>
            <p>
                The <strong>Company</strong> offers services which includes but not limited to the investment and utilization of financial resources in various enterprises and profitable ventures such as: <strong>Real Estate, Automobiles, Agriculture, Capital Market Trading and General Merchandise</strong>.
            </p>
        </li>
        <li>
            <p>
                The <strong>Investor</strong> desires to invest the deposited sum defined herein subject to the terms and covenant hereinafter contained.
            </p>
        </li>
    </ol>

    <h4>
        NOW IT IS HEREBY AGREED AS FOLLOW:
    </h4>
    <ol>
        <li>
            <h5>DEFINITIONS</h5>
            <ol>
                <li>
                    <p>
                        “<strong>Deposited</strong> funds” refers to the monetary sum(s) deposited by the <strong>Investor</strong> (as stated in Clause 2.1 below) “<strong>Investments</strong>” refers to all the various activities engaged in with the <strong>Deposited Funds</strong> including Real Estate, Automobiles, Capital Market Trading, Agriculture, General Merchandise and other forms of profitable businesses by the <strong>Company</strong> for and on behalf the <strong>Investors</strong>. 
                    </p>
                </li>
            </ol>
        </li>
        <li>
            <h5>BASIC AGREEMENT</h5>
            <ol>
                <li>
                    <p>
                        The <strong>Investor</strong> hereby agrees to entrust to the <strong>Company</strong> the sum of 
                        <strong>{{ display_money($investment->amount) }}</strong> only on the <strong>{{ $investment->start_at->format('d') }}</strong> of <strong>{{ $investment->start_at->format('F') }} {{ $investment->start_at->format('Y') }}</strong>. The amount shall be remitted to the 
                        <strong>Company</strong> upon the execution of this Agreement.
                    </p>
                </li>
                <li>
                    <p>
                        The <strong>Company</strong> undertakes to invest the amount entrusted to it by the <strong>Investor</strong> in accordance with the terms of this agreement.
                    </p>
                </li>
                <li>
                    <p>
                        The <strong>Investor</strong> has independently studied and is satisfied with the investment processes.
                    </p>
                </li>
                <li>
                    <p>
                        The <strong>Company</strong> undertakes to maintain the funds entrusted to it separate from her own assets and independent of the claim of its creditors.
                    </p>
                </li>
                <li>
                    <p>
                        The Company shall on the <strong>{{ $investment->end_at->format('d') }}</strong> of <strong>{{ $investment->end_at->format('F') }} {{ $investment->end_at->format('Y') }}</strong> pay back the sum of 
                        <strong>{{ display_money($investment->amount) }}</strong> to the <strong>Investor</strong> together with another sum of 
                        <strong>{{ display_money($investment->roi) }}</strong> only as the agreed Return on Investment.
                    </p>
                </li>
                <li>
                    <p>
                        The <strong>Company</strong> shall insure the capital of her investors 
                        through the implementation of procedural strategies 
                        but will not be responsible for any stringent measure 
                        enacted on discovery of fraudulent sums of investments 
                        deposits neither will the <strong>Company</strong> be responsible for 
                        the Investor(s) associated with such activities.
                    </p>
                </li>
                <li>
                    <p>
                        The Investor shall not request for his/her investment 
                        deposit until the date of the Agreement’s expiration as 
                        stated on the <strong>Individual Company Agreement (ICA)</strong> 
                        generated for the corresponding investment. In such 
                        cases, a 10% deduction from the capital invested would 
                        be implemented and such requests would be processed 
                        within 5 working days from the day of the impromptu request.
                    </p>
                </li>
                <li>
                    <p>
                        
                    </p>
                </li>
                <li>
                    <p>
                        
                    </p>
                </li>
            </ol>
        </li>
        <li>
            <h5>REPRESENTATION AND WARRANTIES</h5>
            <ol>
                <li>
                    <p>
                        The <strong>Company</strong> warrants that it has the corporate and legal 
                        power to conduct the business of investment and perform the obligations herein stated.
                    </p>
                </li>
                <li>
                    <p>
                        The <strong>Investor</strong> irrevocably warrants that the funds to be invested 
                        are legitimate funds with and of no criminal origin.
                    </p>
                </li>
            </ol>
        </li>
        <li>
            <h5>DURATION</h5>
            <p>
                This Agreement shall come into fruition upon the execution of this Agreement and 
                shall remain valid until its termination upon the repayment of the invested funds.
            </p>
        </li>
        <li>
            <h5>DISPUTE RESOLUTION</h5>
            <p>
                Parties hereby agreed that any dispute that may arise under this agreement will be resolved
                through Mediation by a Mediator to be appointed by the Chairman of the Institute of Chartered
                Mediators and Conciliators, Lagos State Chapter.
            </p>
        </li>
        <li>
            <h5>GOVERNING LAW</h5>
            <p>
                This Agreement shall be governed and construe in accordance with the Laws of the Federal
                Republic of Nigeria.
            </p>
        </li>
    </ol>

    <p>
        <strong>IN WITNESS WHEREOF</strong> the parties have hereunto set their hands and seals the day and year first above written.
    </p>

    <p>
        <em>
            <small>
                <strong>
                    Please note that this ICA remains valid if after 24hours there is no reversal of the invested sum. However,
                    if there is a reversal, the agreement becomes VOID and CANCELLED.
                </strong>
            </small>
        </em>
    </p>

    <p>
        The Common Seal of the within named <strong>Company</strong> Is herein affixed in the presence of
    </p>



    <table style="width:100%;">
        <tr style="width:100%;">
            <td style="width:auto;" align="center">
                <div>
                    <h3 style="text-align: center;">
                        <img src="img/signature.jpg" style="width:70px;height:55px;"/><br>
                        ____________________________________________<br>
                        (DIRECTOR) Voltac Global Capital Limited
                    </h3>
                </div>
            </td>
            <td style="width:150px;">
                <img src="img/seal.jpg" style="width:100px;height:100px;"/>
            </td>
        </tr>
    </table> 

    <p>
        Signed, Sealed and Delivered by the aforenamed <strong>Investor</strong>.
    </p>

    <h3 style="text-align: center;">
        ________________________________________<br>
        {{ $investment->name }}
    </h3>



    <table style="width:100%;">
        <tr style="width:100%;">
            <td style="width:auto;">
                <div>
                    <h4>WITNESS</h4>
                    <p>
                        In the presence of 
                    </p><br>
                    <p>Name:______________________________________________________________</p><br>
                    <p>Address:____________________________________________________________</p><br>
                    <p>Occupation:_________________________________________________________</p><br>
                    <p>Signature:___________________________________________________________</p><br>
                    <p>Date:________________________________________________________________</p><br>
                </div>
            </td>
            <td style="width:150px;">
                <img src="var:qr" style="width:150px;height:150px;"/>
            </td>
        </tr>
    </table> 
    
    <br>
    <br>
    <br>
    <br>
    <small><em>Generated by: {{ fullname($user) }}</em></small>

    </div>
    <img src="img/lh-foot.jpg" style="width: 100%;"/>
</body>
</html>