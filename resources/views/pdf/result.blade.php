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
            padding: 30px 40px;
        }

        .date-top {
            text-align: right;
            margin-bottom: 25px;
            font-size: 12pt;
        }

        .header {
            text-align: center;
            margin-bottom: 8px;
        }

        .header h1 {
            font-size: 16pt;
            font-weight: normal;
            font-style: italic;
            margin: 0 0 8px 0;
        }

        .document-number {
            text-align: center;
            margin-bottom: 25px;
            font-size: 12pt;
        }

        .document-number span {
            text-decoration: underline;
        }

        .intro {
            margin-bottom: 20px;
        }

        .intro p {
            margin: 0 0 8px 0;
        }

        /* Patient Info Table */
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }

        .info-table td {
            border: 1px solid #000;
            padding: 8px 10px;
            vertical-align: middle;
            font-size: 11pt;
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
            margin-bottom: 12px;
            font-size: 12pt;
        }

        .results-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0;
        }

        .results-table th,
        .results-table td {
            border: 1px solid #000;
            padding: 8px 10px;
            text-align: center;
            font-size: 11pt;
        }

        .results-table th {
            background-color: #c5d9f1;
            font-weight: bold;
        }

        .test-description {
            border: 1px solid #000;
            border-top: none;
            padding: 10px;
            margin-bottom: 25px;
            font-size: 10pt;
        }

        /* Recommendation Section */
        .recommendation {
            margin-bottom: 30px;
        }

        .recommendation h3 {
            font-weight: bold;
            margin: 0 0 12px 0;
            font-size: 12pt;
        }

        .recommendation ul {
            margin: 0;
            padding-left: 25px;
        }

        .recommendation li {
            margin-bottom: 6px;
            font-size: 11pt;
        }

        /* Signature Section */
        .signature {
            margin-top: 40px;
        }

        .signature p {
            margin: 0 0 5px 0;
            font-size: 11pt;
        }
    </style>
</head>

<body>
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
        <p>dr. Of Unicare Clinic on the date states above have performed the Swab Antigen test, using sample obtained
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

    <div class="signature">
        <p>Bali,</p>
        <p>Attending Physician Name, Signature and Stamp</p>
        <p>Attending Physician</p>
    </div>
</body>

</html>