<!DOCTYPE html>
<html>
<head>
    <title>Surat Balasan</title>
    <style>
        /* CSS untuk kop surat */
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            border-bottom: 2px solid #333;
            padding: 10px;
            text-align: center;
        }

        .logo {
            width: 200px; /* Sesuaikan ukuran logo sesuai kebutuhan */
            height: 100px;
            float: left;
            margin-right: 10px;
        }

        .company-name {
            font-size: 20px;
            text-align: right;
            font-weight: bold;
        }
        .company-repot {
            font-size: 15px;
            margin-top: 20px;
            margin-bottom: 20px;
            text-align: right;
            font-weight: bold;
        }

        .company-address1 {
            font-size: 12px;
            text-align: right;
            
        }
        .company-address {
            font-size: 12px;
            text-align: right;
            margin-bottom: 10px;
        }
        .tanggal{
            font-size: 14px;
            text-align: left;
            margin-top: 30px;
        }
        .instansi{
            font-size: 14px;
            text-align: left;
            font-weight: bold;
        }
        .yth{
            font-size: 14px;
            text-align: left;
            margin-top: 30px;
        }
        .signature-container {
            width: 300px; /* Atur lebar container sesuai keinginan Anda */
            height: 100px; /* Atur tinggi container sesuai keinginan Anda */
            border: 1px ;
            float: right;
            padding: 10px;
            margin-top: 50px;
        }

        .signature-image {
            max-width: 100%;
            max-height: 100%;
        }

        .signature-name {
            font-size: 14px;
            font-weight: bold;
        }

        .signature-title {
            font-size: 14px;
            font-style: italic;
        }

        /* CSS untuk tabel */
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 8px;
            border: 1px solid #000;
        }

        .table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <?php print_r($imageLogo); ?>
        </div>
        <div class="company-info">
            <div class="company-name">PT. ARKAMAYA</div>
            <div class="company-address1">Pasadena Residence Jl. Kastuba B5 No 26,<br>Bandung Jawa Barat, Indonesia 40224.</div>
            <div class="company-address1">Phone .6287846621000</div>
            <div class="company-address">Website:https://arkamaya.co.id/  E-mail:info@arkamaya.co.id</div>
        </div>
        <div style="clear: both;"></div> <!-- Clear float to prevent overlapping -->
    </div>
    
   <div class="tanggal">Bandung, {{ $tanggalHariIni  }}</div>
   <div class="tanggal">Nomor      :{{ $nomorSuratBaru }}</div>
   <div class="yth">Kepada Yth.</div>
   @foreach ($peserta as $index => $item)
   <div class="instansi">{{ $item->institusi }}</div>
   @endforeach
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Prodi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peserta as $index => $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nim }}</td>
                    <td>{{ $item->prodi}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="signature-container">
       
        <div class="signature-title">Wakil Direktur III</div>
        <div class="signature-title">Politeknik Negeri Padang</div>
        <?php print_r($imageTtd); ?>
        {{-- <div class="signature-name">{{ $item->nama }}</div>
        <div class="signature-name">NIP. {{ $item->nip }}</div> --}}
        <?php print_r($imageTtd2); ?>
        {{-- <div class="signature-name">{{ $item->nama }}</div>
        <div class="signature-name">NIP. {{ $item->nip }}</div> --}}
        
    </div>
</body>
</html>