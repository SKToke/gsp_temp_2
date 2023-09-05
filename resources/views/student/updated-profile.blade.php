<section class="h-100 gradient-custom-2">
    <div class="container py-3 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-10 col-xl-7">
                <div class="card">
                    <div class="rounded-top text-white d-flex flex-row"
                         style="background-color: #225D84;">
                        <div class="ms-3 mt-2">
                            <h5>
                                <span>{{ $student->user?->name }}</span>
                                <span>(GSP ID# {{ $student->gsp_id }})</span>
                            </h5>
                            <p>Cell 1(SMS)#{{ $student->user?->mobile }}, Cell 2#{{ $student->user?->alternate_mobile }}, {{ $student->user?->email }}</p>
                        </div>
                    </div>

                    <div class="card-body p-4 text-black">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <th scope="row">Bank Account Title</th>
                                <td>{{ $student->bank_account_title }}</td>
                                <th scope="row"> Account Number</th>
                                <td>{{ $student->bank_account_number }}</td>
                            </tr>
                            <tr>
                                <th scope="row"> Bank Name</th>
                                <td>{{ $student->bank?->name  }}</td>
                                <th scope="row">Bank Barnch</th>
                                <td>{{ $student->bank_branch }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Remarks</th>
                                <td colspan=3">{{ $student->remarks }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="{{ asset('storage/'.$student->app_id.'/'.$student->bank_statement) }}" class="btn btn-primary"
                                       download>Download Bank Statement (PDF)</a>
                                </td>
                                <td>
                                    <a href="{{ asset('storage/'.$student->app_id.'/'.$student->studentship_certificate) }}" class="btn btn-primary"
                                       download>Download Studentship Certificate (PDF)</a>
                                </td>
                                <td>
                                    <a href="{{ asset('storage/'.$student->app_id.'/'.$student->award_letter) }}" class="btn btn-primary"
                                       download>Download Award Letter (PDF)</a>
                                </td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
