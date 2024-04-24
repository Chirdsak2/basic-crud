{{-- @foreach ($rec_location as $item)
    {{ $item->title }}
@endforeach --}}

<div class="container text-center" style="margin-top: 40px;">
    <div class="row">
        @foreach ($rec_location as $item)
            <div class="col-md-6 mb-3">
                <div class="card" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="{{ url('uploads/' . $item->main_pic) }}" class="img-fluid rounded-start"
                                alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title" style="text-align: left;">{{ $item->title }}</h5>
                                <p class="card-text" style="text-align: left;">{{ mb_substr($item->detail, 0, 200) }}...
                                </p>
                                {{-- <p class="card-text" style="text-align: justify; text-justify: inter-word;">{{ mb_substr($item->detail, 0, 200) }}...</p> --}}
                                {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                                <p class="card-text" style="text-align: left;"><small class="text-muted">Last updated
                                        {{ $item->update_date }}</small></p>
                            </div>
                        </div>
                    </div>โ
                </div>
            </div>
        @endforeach
    </div>
</div>
