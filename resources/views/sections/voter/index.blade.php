@section('content')
    <div class="page-content">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="page-title mb-5 mb-md-0">Daftar Pemilih Tetap di
                        <u>{{ $village->name }}</u>
                    </h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Data Pemilih</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->


        @if (Auth::user()->level == true || Auth::guard('owner')->check())
            <div class="row">
                <div class="col-3">
                    <div class="btn-group">
                        <div class="btn-group dropdown float-end">
                            <button id="btnGroupDropdown" type="button" class="btn btn-block btn-dark dropdown-toggle"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Aksi Lainnya <i class="mdi mdi-chevron-down"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDropdown">
                                <a href="{{ url('voters/export') }}?vllg={{ $village->id }}" class="dropdown-item">
                                    <i class="fa fa-file-csv"></i> Ekspor CSV
                                </a>
                                <a href="{{ url('voters/import') }}" class="dropdown-item text-success">
                                    <i class="fa fa-file-pdf"></i> Impor
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div class="row justify-content-end">
                        <div class="col-1 text-end">
                            <span>Jumlah:</span>
                        </div>
                        @if (Auth::guard('owner')->check())
                            <div class="col-3">
                                <div class="card bg-soft-primary">
                                    <div class="card-header text-end">
                                        <span><strong>{{ $coordinators_count }}</strong></span>
                                        <span>Koordinator</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="card bg-soft-primary">
                                    <div class="card-header text-end">
                                        <span><strong>{{ $self_voters_count }}</strong></span>
                                        <span>Pendukung</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="card bg-soft-primary" title="Sumber: DPT Pemilu 2024">
                                    <div class="card-header text-end">
                                        <span><strong>{{ $voting_places_count }}</strong></span>
                                        <span>TPS</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="card bg-soft-primary" title="Sumber: DPT Pemilu 2024">
                                    <div class="card-header text-end">
                                        <span><strong>{{ $voters_count }}</strong></span>
                                        <span>Pemilih</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-5">
                                <div class="card bg-soft-primary" title="Sumber: DPT Pemilu 2024">
                                    <div class="card-header text-end">
                                        <span><strong>{{ $voting_places_count }}</strong></span>
                                        <span>TPS</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card bg-soft-primary" title="Sumber: DPT Pemilu 2024">
                                    <div class="card-header text-end">
                                        <span><strong>{{ $voters_count }}</strong></span>
                                        <span>Pemilih</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="row justify-content-end">
                        <div class="col-2 text-end">
                            <span>Jumlah:</span>
                        </div>
                        <div class="col-5">
                            <div class="card bg-soft-primary" title="Sumber: DPT Pemilu 2024">
                                <div class="card-header text-end">
                                    <span><strong>{{ $voting_places_count }}</strong></span>
                                    <span>TPS</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="card bg-soft-primary" title="Sumber: DPT Pemilu 2024">
                                <div class="card-header text-end">
                                    <span><strong>{{ $voters_count }}</strong></span>
                                    <span>Pemilih</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            @foreach ($votingPlaces as $votingPlace)
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="?tps={{ $votingPlace->id }}">
                        <div class="card border-dark">
                            <div class="card-body">
                                <div class="row">
                                    <div
                                        class="col-4 bg-primary text-white rounded d-flex align-items-center justify-content-center text-center">
                                        TPS {{ $votingPlace->name }}
                                    </div>
                                    <div class="col-8 text-dark text-center">
                                        Jumlah Pemilih <br>
                                        <strong style="font-size: 20px;">{{ $votingPlace->voters->count() }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
