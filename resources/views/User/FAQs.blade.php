@extends('UserLayout.main')

@push('style')
    <style>
        .accordion-button {
            background-color: transparent !important;
        }

        .accordion-button:not(.collapsed) {
            background-color: transparent !important;
        }

        .accordion-item {
            border-bottom: 1px solid #c0c0c0;
            border-top: none;
            border-left: none;
            border-right: none;
            color: #303030 !important;
        }

        .accordion-button:focus {
            box-shadow: none !important;
            outline: none !important;
        }

        /* Removed dropdown like icon */
        .accordion-button::after {
            display: none;
        }

        .accordion-header > button{
            color: #303030 !important;
            font-weight: 500;
            font-size: 18px;
        }

        @media screen and (max-width: 768px){
            .mt-sm-150{
                margin-top: 150px;
            }
        }

    </style>
@endpush

@section('user-main-section')
<div class="container-fluid mt-sm-150 mt-150">
    <div class="row mt-100">
        <div class="col-md-11 mx-auto">
            <h3>FAQs</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-11 mx-auto mb-5">
            <div class="accordion" id="accordionExample">
                @foreach ($fetchAllFAQs as $record)
                    <div class="accordion-item mb-3">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $record->id }}" aria-expanded="true"
                                aria-controls="collapse{{ $record->id }}">
                                {{ $record->question }}
                            </button>
                        </h2>
                        <div id="collapse{{ $record->id }}" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">{!! $record->answer !!}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
