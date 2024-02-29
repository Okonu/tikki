<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = Certificate::all();
        return Inertia::render('Certificates/Index', ['certificates' => $certificates]);
    }

    /**
     * Check a certificate number and return the details.
     */
    public function checkCertificate(Request $request)
    {
        $certificateNumber = $request->input('certificateNumber');
        $certificate = Certificate::where('certificate_number', $certificateNumber)->first();

        if ($certificate) {
            return Inertia::render('Certificates/CheckCertificate', [
                'certificate' => $certificate,
            ]);
        } else {
            return Inertia::render('Certificates/CheckCertificate', [
                'message' => 'Certificate not found.',
            ]);
        }
    }

    public function showForm()
    {
        return Inertia::render('Certificates/CheckCertificate');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Certificates/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCertificateRequest $request)
    {
        $validated = $request->validated();
        Certificate::create($validated);
        return redirect()->route('certificates.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        return Inertia::render('Certificates/Show', ['certificate' => $certificate]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        return Inertia::render('Certificates/Edit', ['certificate' => $certificate]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCertificateRequest $request, Certificate $certificate)
    {
        $validated = $request->validated();
        $certificate->update($validated);
        return redirect()->route('certificates.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return redirect()->route('certificates.index');
    }
}
