<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;



class QrCodeGeneratorController extends Controller
{
    public function generateQrCode($id) 
{
    QrCode::size(500)
            ->format('png')
            ->generate($id, public_path('images/qrcode.png'));
    
    return view('qrCode',['id'=>$id]);
}
}
