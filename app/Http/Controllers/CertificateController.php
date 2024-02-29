<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use APP\Services\CertificateService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CertificateController extends Controller
{
    protected $certificateService;

    public function __construct(CertificateService $certificateService)
    {
        $this->certificateService = $certificateService;
    }
    /**
     * Check a certificate number and return the details.
     */
    public function checkCertificate(Request $request)
    {
        $certificateNumber = $request->input('certificateNumber');
        $certificateDetails = $this->certificateService->fetchCertificateDetails($certificateNumber);

        if ($certificateDetails) {
            return Inertia::render('Certificates/CheckCertificate', [
                'certificate' => $certificateDetails,
            ]);
        } else {
            return Inertia::render('Certificates/CheckCertificate', [
                'message' => 'Certificate not found.',
            ]);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = Certificate::all();
        return Inertia::render('Certificates/Index', ['certificates' => $certificates]);
    }

    public function showForm()
    {
        return Inertia::render('Certificates/CheckCertificate');
    }


}
