@extends('layouts.app')
@section('content')

@include('components.navbar')

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<br><br><br><br><br>
<h2 style="text-align: center">Frequently Asked Questions (FAQ)</h2>
<h3 style="text-align: center">Halopengadaan</h3>
<br><br>

<div class="accordion container" id="accordionExample">

    @foreach ($data_faq as $item)


    <div class="accordion-item">
      <h2 class="accordion-header" id="heading{{$loop->iteration }}">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$loop->iteration }}" aria-expanded="true" aria-controls="collapse{{$loop->iteration }}">
           {{$loop->iteration }}.{{$item->pertanyaan}}
        </button>
      </h2>
      <div id="collapse{{$loop->iteration }}" class="accordion-collapse collapse" aria-labelledby="heading{{$loop->iteration }}" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <ul>
                <li>{!! $item->jawaban !!}</li>
          </ul>
        </div>
      </div>
    </div>

    @endforeach
</div>
<img class="img1" src="{{ asset('images/section2/person.png') }}" alt="" style="width:100%;">
@endsection
