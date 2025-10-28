<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Antrian Poli Umum - {{ $nama_instansi }}</title>
    <style>
        
        body {
            font-family: monospace;
            width: 100%;
            max-width: 250px;
            margin: 0 auto;
            padding: 10px;
            font-size: 12px;
        }

        .resi {
            border: 1px dashed #000;
            padding: 10px;
            text-align: center;
        }

        h1 {
            font-size: 28px;
            margin: 5px 0;
        }

        h2, h3 {
            font-size: 16px;
            margin: 4px 0;
        }

        .info {
            margin-top: 10px;
            text-align: left;
        }

        .info p {
            margin: 2px 0;
        }

        .footer {
            margin-top: 10px;
            font-size: 10px;
        }

        @media print {
            @page {
                size: 58mm auto;
                margin: 5mm;
            }

            body {
                width: 100%;
                margin: 0;
                padding: 0;
                font-size: 12px;
            }

            .resi {
                border: none;
            }
        }
    </style>
</head>
<body>
    <div class="resi">
        <h2>{{ $nama_instansi }}</h2>
        <h3>Antrian Poli Umum</h3>
        <hr>
        @if(isset($no_antrian) && isset($poli) && isset($datetime))
            <h1>{{ $no_antrian }}</h1>
            <div class="info">
                <p><strong>Poli:</strong> {{ $poli }}</p>
                <p><strong>Waktu:</strong> {{ $datetime }}</p>
            </div>
        @else
            <p>Data tidak tersedia.</p>
        @endif
        <div class="footer">
            <p>Silakan tunggu panggilan</p>
            <p>Terima kasih</p>
        </div>
    </div>

    <script>
        window.onload = function () {
            window.print();
        };
        window.onafterprint = function () {
            window.location.href = "{{ url('/apam') }}";
        };
    </script>
</body>
</html>
