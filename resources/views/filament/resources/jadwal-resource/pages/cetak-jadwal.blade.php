<x-filament::page>
    @push('styles')
        <style>
            @page {
                size: F4;
                margin: 1cm;
            }
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
            }
            .header {
                text-align: center;
                margin-bottom: 20px;
                border-bottom: 2px solid #333;
                padding-bottom: 10px;
            }
            .content {
                margin: 20px 0;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px 0;
            }
            table, th, td {
                border: 1px solid #333;
            }
            th, td {
                padding: 8px;
                text-align: left;
            }
            .footer {
                margin-top: 30px;
                text-align: right;
            }
            @media print {
                .no-print {
                    display: none;
                }
                body {
                    font-size: 12pt;
                }
            }
        </style>
    @endpush

    <div class="header">
        <h2>SURAT PERJALANAN DINAS (SPPD)</h2>
        <h3>Nomor: {{ $record->nomor_spt }}</h3>
    </div>

    <div class="content">
        <!-- Konten tabel sama seperti sebelumnya -->
        <!-- ... -->
    </div>

    <div class="footer">
        <p>Mengetahui,</p>
        <br><br><br>
        <p><strong>Kepala Instansi</strong></p>
    </div>

    <div class="no-print" style="text-align: center; margin-top: 20px;">
        <button onclick="window.print()" style="padding: 10px 20px; background: #4CAF50; color: white; border: none; cursor: pointer;">
            Cetak Dokumen
        </button>
        <button onclick="window.history.back()" style="padding: 10px 20px; background: #f44336; color: white; border: none; cursor: pointer;">
            Kembali
        </button>
    </div>
</x-filament::page>
