<?php

namespace App\Lib\Investment;

use App\Models\Agreement;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Lib\File\ICA\ICAUploader;
use Endroid\QrCode\QrCode;
use Mpdf\Mpdf;
use DB;

class ICAGenerator
{

    public $user;

    public $investment;

    public function __construct($investment, $user)
    {
        $this->investment = $investment;

        $this->user = $user;
    }

    public function generate()
    {
            
        $qrCode = $this->qrCode();

        //Storage::put('qr.png', $qrCode->writeString());abort(500);

        //return base64_encode( file_get_contents( base_path('public/img/lh-head.jpg') ) );
        $mpdf = new Mpdf([
            'tempDir' => base_path('storage/app/mpdf/tmp'),
            'format' => 'A4',
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_top' => 10,
            'margin_bottom' => 10,
            /* 'margin_header' => 0,
            'margin_footer' => 0 */
        ]);
        $mpdf->useSubstitutions = false;
        $mpdf->imageVars['qr'] = $qrCode->writeString();
        $mpdf->WriteHTML( view('pdf.ica')->with(
            [
                'investment' => $this->investment,
                'user' => $this->user,
            ]
        )->render() );
        $content = $mpdf->Output('', 'S');

        return $content;
    }

    public function qrCode()
    {
        $qrCode = new QrCode(
            json_encode(
                [
                    'entity' => 'ica',
                    'token' => $this->investment->id,
                ]
            )
        );

        $qrCode->setSize(300);
        $qrCode->setMargin(5); 
        $qrCode->setWriterByName('png'); 

        return $qrCode;
    }
}

