@extends('user.main')
@section('content')
    @php
        use App\Models\InformasiDesa;
        use App\Models\WaktuLayanan;
        use App\Models\ProfilDesa;
        use App\Models\Pelayanan;
        use App\Models\Ppid;
        use App\Models\ApbKonten;
        use App\Models\RpjmDes;
        use App\Models\RkpDes;

        $informasiDesa = InformasiDesa::all();
        $waktuLayanan = WaktuLayanan::all();

        // Dropdown
        $dropdownProfil = ProfilDesa::all();
        $dropdownPelayanan = Pelayanan::all();
        $dropdownPpid = Ppid::all();
        $dropdownApbKonten = ApbKonten::all();
        $dropdownRpjmDes = RpjmDes::all();
        $dropdownRkpDes = RkpDes::all();
    @endphp
    <section class="error-page section">
        <div class="container">

        </div>
    </section>
@endsection
