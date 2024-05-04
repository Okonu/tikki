<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\CertificateService;
use Illuminate\Http\Request;

class CertificateAPIController extends Controller
{
    protected $certificateService;

    public function __construct(CertificateService $certificateService)
    {
        $this->certificateService = $certificateService;
    }

    /**
     * Check a certificate number and return the details.
     */
    public function checkCertificate(Request $request, $certificateNumber)
    {
        $certificateDetails = $this->certificateService->fetchCertificateDetails($certificateNumber);

        if ($certificateDetails) {
            return response()->json($certificateDetails);
        } else {
            return response()->json(['message' => 'Certificate not found.'], 404);
        }
    }

    /**
     * Display the certificate.
     */
    public function index()
    {
        $certificates = $this->certificateService->fetchAllCertificates();
        return response()->json($certificates);
    }
}