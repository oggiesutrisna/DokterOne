<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Certificate of COVID-19 Testing - {{ $pasien->nama }}</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            line-height: 1.4;
            color: #000;
            margin: 0;
            padding: 18px 34px;
        }

        .clinic-header {
            width: 100%;
            border-bottom: 2px solid #000;
            padding-bottom: 8px;
            margin-bottom: 10px;
        }

        .clinic-header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .clinic-logo {
            width: 52px;
            height: 52px;
            border: 2px solid #000;
            text-align: center;
            vertical-align: middle;
            font-size: 20pt;
            font-weight: bold;
        }

        .clinic-info {
            padding-left: 14px;
            vertical-align: middle;
        }

        .clinic-name {
            font-size: 15pt;
            font-weight: bold;
            text-transform: uppercase;
            margin: 0 0 3px 0;
        }

        .clinic-meta {
            font-size: 9pt;
            margin: 0;
        }

        .date-top {
            text-align: right;
            margin-bottom: 12px;
            font-size: 11pt;
        }

        .header {
            text-align: center;
            margin-bottom: 4px;
        }

        .header h1 {
            font-size: 15pt;
            font-weight: normal;
            font-style: italic;
            margin: 0 0 4px 0;
        }

        .document-number {
            text-align: center;
            margin-bottom: 12px;
            font-size: 11pt;
        }

        .document-number span {
            text-decoration: underline;
        }

        .intro {
            margin-bottom: 12px;
        }

        .intro p {
            margin: 0 0 5px 0;
        }

        /* Patient Info Table */
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 14px;
        }

        .info-table td {
            border: 1px solid #000;
            padding: 5px 8px;
            vertical-align: middle;
            font-size: 10pt;
        }

        .info-table .label {
            background-color: #c5d9f1;
            font-weight: bold;
            width: 18%;
        }

        .info-table .value {
            width: 32%;
        }

        /* Results Section */
        .results-header {
            font-weight: bold;
            margin-bottom: 7px;
            font-size: 11pt;
        }

        .results-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0;
        }

        .results-table th,
        .results-table td {
            border: 1px solid #000;
            padding: 5px 8px;
            text-align: center;
            font-size: 10pt;
        }

        .results-table th {
            background-color: #c5d9f1;
            font-weight: bold;
        }

        .test-description {
            border: 1px solid #000;
            border-top: none;
            padding: 6px 8px;
            margin-bottom: 12px;
            font-size: 9pt;
        }

        /* Recommendation Section */
        .recommendation {
            margin-bottom: 14px;
        }

        .recommendation h3 {
            font-weight: bold;
            margin: 0 0 6px 0;
            font-size: 11pt;
        }

        .recommendation ul {
            margin: 0;
            padding-left: 25px;
        }

        .recommendation li {
            margin-bottom: 3px;
            font-size: 10pt;
        }

        /* Signature Section */
        .signature {
            margin-top: 16px;
            width: 100%;
            text-align: right;
        }

        .signature p {
            margin: 0 0 5px 0;
            font-size: 11pt;
        }

        .signature-space {
            height: 38px;
        }

        .signature-name {
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="clinic-header">
        <table class="clinic-header-table">
            <tr>
                <td class="clinic-logo">U</td>
                <td class="clinic-info">
                    <p class="clinic-name">Unicare Clinic</p>
                    <p class="clinic-meta">Healthcare and Medical Services</p>
                    <p class="clinic-meta">Certificate of COVID-19 Testing</p>
                </td>
            </tr>
        </table>
    </div>

    <div class="date-top">
        {{ \Carbon\Carbon::parse($pasien->sampling_time)->format('F j, Y, g:i A') }}
    </div>

    <div class="header">
        <h1>Certificate of COVID-19 Testing</h1>
    </div>

    <div class="document-number">
        <span>{{ $pasien->nosurat }}</span>
    </div>

    <div class="intro">
        <p>To whom it may concern</p>
        <p>Lead doctoral dr. Of Unicare Clinic on the date states above have performed the Swab Antigen test, using sample obtained
            from
            the individual name below:</p>
    </div>

    <table class="info-table">
        <tr>
            <td class="label">Name</td>
            <td class="value">{{ $pasien->nama }}</td>
            <td class="label">Sampling Time :</td>
            <td class="value">{{ \Carbon\Carbon::parse($pasien->sampling_time)->format('F j, Y, g:i A') }}</td>
        </tr>
        <tr>
            <td class="label">Date of Birth</td>
            <td class="value">{{ \Carbon\Carbon::parse($pasien->dob)->format('F j, Y') }}</td>
            <td class="label">Passport Number /ID Number :</td>
            <td class="value">{{ $pasien->nomor_pid }}</td>
        </tr>
        <tr>
            <td class="label">Gender</td>
            <td class="value">{{ $pasien->jenis_kelamin }}</td>
            <td class="label">Nationality :</td>
            <td class="value">{{ $pasien->nationality }}</td>
        </tr>
    </table>

    <div class="results-header">
        EXAMINATION RESULTS of COVID -19:
    </div>

    <table class="results-table">
        <thead>
            <tr>
                <th style="width: 25%;">Test Name</th>
                <th style="width: 25%;">Result</th>
                <th style="width: 25%;">Ref. Range</th>
                <th style="width: 25%;">Method</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $pasien->jenis_pemeriksaan }}</td>
                <td>{{ $pasien->result }}</td>
                <td>{{ $pasien->result }}</td>
                <td>Swab Antigen Test</td>
            </tr>
        </tbody>
    </table>

    <div class="test-description">
        Type of test: Sample collection for the antigen test is in the form of a swab, which will better gather an
        individual's nasopharyngeal and oropharyngeal (nose and throat) secretions.
    </div>

    <div class="recommendation">
        <h3>RECOMENDATION:</h3>
        <ul>
            <li>Always wash hand using soap and water, wear mask when do activities outside</li>
            <li>Do physical distancing, at least 1 meter from another person</li>
            <li>Please contact hospital or any health care facilities if you have any symptoms</li>
            <li>If the test result is positive, kindly do PCR (polymerase chain reaction)</li>
        </ul>
    </div>

    <table style="width: 100%; margin-top: 20px; border-collapse: collapse; border: none !important;">
        <tr>
            <td style="width: 50%; text-align: left; vertical-align: bottom; border: none !important; padding: 0;">
                @if(isset($qrCode))
                    <div style="margin-bottom: 5px;">
                        <img src="{{ $qrCode }}" alt="QR Code" style="width: 100px; height: 100px; border: none;">
                    </div>
                    <p style="margin: 0; font-size: 8pt; color: #555; font-style: italic; font-family: 'Times New Roman', Times, serif;">Scan to verify document validity</p>
                @endif
            </td>
            <td style="width: 50%; text-align: right; vertical-align: bottom; border: none !important; padding: 0;">
                <div class="signature" style="margin-top: 0;">
                    <p>Bali, {{ \Carbon\Carbon::parse($pasien->sampling_time)->format('F j, Y') }}</p>
                    <p>Attending Physician</p>
                    <div class="signature-space"></div>
                    <p class="signature-name">dr. Nyoman Gita Gunawan</p>
                    <p>Signature and Stamp</p>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>
