@php
    $items = $data['students'];
@endphp
    <!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Students</title>
    <!-- Styles -->
    <style>
        html,
        body,
        div,
        p,
        table,
        tr,
        tbody,
        thead,
        th {
            margin: 0;
            padding: 0;
        }

        table,
        th,
        td,
        tbody {
            border: 1px solid black;
            border-spacing: 0;
        }

        body {
            font-size: 12px;
            line-height: 14px;
        }

        th {
            font-size: 14px;
            padding: 2px 3px;
        }

        td {
            padding: 2px 3px;
            text-align: center;
        }

        thead {
            display: table-header-group
        }

        tfoot {
            display: table-row-group
        }

        tr {
            page-break-inside: avoid
        }

        .border-0 {
            border: none;
        }

    </style>
</head>

<body>
<div style="display:block; clear:both; page-break-after:always;">
    <table width="100%">
        <thead>
        <tr>
            <th width="50px">Sl</th>
            <!-- Personal Information -->
            <th>AppId</th>
            <th>GSPId</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Alternate_Mobile</th>
            <th>Zone</th>
            <th>University</th>
            <th>Department</th>
            <th>Bank</th>
            <th>Bank Brunch</th>
            <th>Bank Account Title</th>
            <th>Bank Account Number</th>
            <th>Updated</th>
            <th>Verified</th>
            <th>Remarks</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->app_id }}</td>
                <td>{{ $item->gsp_id }}</td>
                <td>{{ $item->user?->name }}</td>
                <td>{{ $item->user?->email }}</td>
                <td>{{ $item->user?->mobile }}</td>
                <td>{{ $item->user?->alternate_mobile }}</td>
                <td>{{ $item->zone }}</td>
                <td>{{ $item->university }}</td>
                <td>{{ $item->department }}</td>
                <td>{{ $item->bank?->name }}</td>
                <td>{{ $item->bank_branch }}</td>
                <td>{{ $item->bank_account_title }}</td>
                <td>{{ $item->bank_account_number }}</td>
                <td>
                    @if(0==$item->is_updated)
                        Not Updated
                    @elseif(1==$item->is_updated)
                        Award Letter Pending
                    @else
                        Complete Update
                    @endif
                </td>
                <td>
                    @if($item->is_verified)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td>{{ $item->remarks }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="16">No Data Found</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
