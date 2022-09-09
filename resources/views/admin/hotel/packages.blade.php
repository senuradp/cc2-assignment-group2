@extends('admin.hotel.includes.dash')
@section('title', 'Add package')

@section('content')
    <!-- Content -->
    <div class="content">

        <div class="page-header">
            <div class="page-title">
                <h3>Package {{ empty($packege) ? 'Create': 'Update'}} </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div id="wizard-example" role="application" class="wizard clearfix">
                    <div class="steps clearfix">
                       <ul role="tablist">
                          <li role="tab" class="first {{ empty($packege) ? 'current': 'done'}}" aria-disabled="false" aria-selected="true"><a id="wizard-example-t-0" href="#wizard-example-h-0" aria-controls="wizard-example-p-0"><span class="current-info audible">current step: </span><span class="wizard-index">1</span> Create Packege</a></li>
                          <li role="tab" class="{{ empty($packege) ? 'disabled': (empty(count($packege->rooms)) ? 'current' : 'done') }} " aria-disabled="true"><a id="wizard-example-t-1" href="#wizard-example-h-1" aria-controls="wizard-example-p-1"><span class="wizard-index">2</span> Add rooms</a></li>
                          <li role="tab" class="{{ empty($packege) || empty(count($packege->rooms)) ? 'disabled': (empty(count($packege->offers)) ? 'current' : 'done') }} last" aria-disabled="true"><a id="wizard-example-t-2" href="#wizard-example-h-2" aria-controls="wizard-example-p-2"><span class="wizard-index">3</span> Add offers</a></li>
                       </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- basic form --}}
        <div class="row">
            <div class="col-lg-!2 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">1. {{ empty($packege) ? 'Create': 'Update'}} Packege</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ empty($packege) ? 'add-packege': '/hotel-portal/update-packege/'.Request::segment(3) }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name',!empty($packege) ? $packege->name : '' )}}" placeholder="Name" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" name="description" id="description" rows="3" required>{{ old('description',!empty($packege) ? $packege->description : '' )}}</textarea>
                                        </div>
                                    </div>
                                    @if(!empty($packege))
                                    <div class="form-row">
                                        <div class="form-group col-md-12 mb-0 pb-0">
                                            <h3 class="mb-0 pb-0">Total : LKR. {{ number_format($packege->total,2) }}</h3>
                                            <small>(Total is ths sum of room charges)</small>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-primary mt-3"> <i class="fa fa-plus mr-2" aria-hidden="true"></i> {{ empty($packege) ? 'Create': 'Update'}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(!empty($packege))

        {{-- Add rooms --}}
        <div class="row">
            <div class="col-lg-!2 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">2. Add rooms</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="/hotel-portal/add-room/{{ Request::segment(3) }}" method="POST" class="repeater">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name',!empty($profile) ? $profile->name : '' )}}" placeholder="Room name" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="bathrooms_qty">Bathrooms</label>
                                            <input type="number" min="0" step="1" name="bathrooms_qty" class="form-control" id="bathrooms_qty" value="{{ old('bathrooms_qty',!empty($profile) ? $profile->name : '' )}}" placeholder="No. of Bathrooms per room. min:0" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="price">Price</label>
                                            <input type="number" min="100" step="0.01" name="price" class="form-control" id="price" value="{{ old('price',!empty($profile) ? $profile->name : '' )}}" placeholder="price with facilities per room" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="facilitie_id">facilities</label>
                                            <select class="select2-example" name="facilitie_id[]" id="facilitie_id" multiple>
                                                <option>Select</option>
                                                @foreach ($facilities as $facilitie)
                                                    <option value="{{$facilitie->id}}">{{$facilitie->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <button type="button" id="add-bed" class="btn btn-success" style="margin-top:0;" data-repeater-create>
                                                <i class="fa fa-bed mr-2" aria-hidden="true"></i>  Add Bed
                                            </button>
                                        </div>
                                        <div class="form-group col-12" data-repeater-list="group-a">
                                            <div data-repeater-list="group-a">
                                                <div data-repeater-item>
                                                    <div class="row">
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <label for="name">Bed Capacity</label>
                                                            <input type="number" class="form-control" name="capacity" id="name" placeholder="Enter custom bed capacity">
                                                        </div>
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <label for="bed_id">Bed type</label>
                                                            <select name="bed_id" id="bed_id" class="form-control" required>
                                                                @foreach ($beds as $bed)
                                                                    <option value="{{$bed->id}}">{{$bed->name}} : {{$bed->width}} X {{$bed->length}} for {{$bed->default_capacity}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2 col-sm-12 form-group">
                                                            <div><label>&nbsp;</label></div>
                                                            <button type="button" class="btn btn-danger" data-repeater-delete>
                                                                <i class="fa fa-trash-o mr-2" aria-hidden="true"></i> Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-primary mt-0"> <i class="fa fa-plus mr-2" aria-hidden="true"></i> Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- added rooms --}}
        @if(!empty(count($packege->rooms)))
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Rooms List for selected packege</h6>
                        <div class="row">
                            <div class="col-12">
                                <div class="accordion custom-accordion">
                                    @php
                                        $roomcount=0;
                                    @endphp
                                    @foreach($packege->rooms as $room)
                                        <div class="accordion-row {{$roomcount==0 ? 'open': ''}}">
                                            <a href="#" class="accordion-header">
                                                <span>{{$room->name}}</span>
                                                <i class="accordion-status-icon close fa fa-chevron-up"></i>
                                                <i class="accordion-status-icon open fa fa-chevron-down"></i>
                                            </a>
                                            <div class="accordion-body">
                                                <p>Bathrooms : {{$room->bathrooms_qty}} <br> Price : {{$room->price}}</p>
                                                <p>
                                                @foreach($room->facilities as $facility)
                                                   <i class="fa fa-{{$facility->icon}}" aria-hidden="true"></i> {{$facility->name}} &nbsp;&nbsp;&nbsp;&nbsp;
                                                @endforeach
                                                </p>

                                                <p>
                                                    Beds : <br>
                                                    @foreach($room->beds as $bed)
                                                        {{$bed->name}} for {{$bed->pivot->capacity}} person <br>
                                                    @endforeach
                                                </p>

                                                <form action="/hotel-portal/remove-room/{{$packege->id}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$room->id}}">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <button type="submit" class="btn btn-danger mt-0"> <i class="fa fa-minus mr-2" aria-hidden="true"></i> Delete Room</button>
                                                        </div>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                        @php
                                            $roomcount++;
                                        @endphp
                                    @endforeach
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Add offers --}}
        <div class="row">
            <div class="col-lg-!2 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">3. Add offers</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="/hotel-portal/append-offer/{{ $packege->id }}" method="POST" class="repeater">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="name">Select Offer</label>
                                            <select class="select2-example" name="offer_id" id="offer_id" required>
                                                <option>Select offer</option>
                                                @foreach ($offers as $offer)
                                                    <option value="{{$offer->id}}">{{$offer->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-primary mt-0"> <i class="fa fa-plus mr-2" aria-hidden="true"></i> Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @if(!empty(count($packege->offers)))
        {{-- added offers --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Offers List for selected packege</h6>
                        <div class="row">
                            <div class="col-12">
                                <div class="accordion custom-accordion">
                                    @php
                                        $roomcount=0;
                                    @endphp
                                    @foreach($packege->offers as $offer)
                                        <div class="accordion-row {{$roomcount==0 ? 'open': ''}}">
                                            <a href="#" class="accordion-header">
                                                <span>{{$offer->name}}</span>
                                                <i class="accordion-status-icon close fa fa-chevron-up"></i>
                                                <i class="accordion-status-icon open fa fa-chevron-down"></i>
                                            </a>
                                            <div class="accordion-body">
                                                <p>Discount : {{$offer->discount}}%</p>
                                                <p>Expire date : {{$offer->expires_at}}</p>

                                                <form action="/hotel-portal/disconnect-offer/{{$packege->id}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="offer_id" value="{{$offer->id}}">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <button type="submit" class="btn btn-danger mt-0"> <i class="fa fa-minus mr-2" aria-hidden="true"></i> Disconnect offer</button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>


                                        </div>
                                        @php
                                            $roomcount++;
                                        @endphp
                                    @endforeach

                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @endif


        @endif
    </div>
    <!-- ./ Content -->

@endsection

@section('scripts')
    <script>
        // jQuery document ready
        $(document).ready(function() {
            $('.select2-example').select2({
                placeholder: 'Select'
            });
            $('.repeater').repeater();

                        @if(session()->has('error'))

                                toastr.error('{{ session()->get('error') }}');

                        @endif

                        @if(session()->has('success'))
                            toastr.success('{{ session()->get('success') }}');
                        @endif
        });
    </script>

@endsection
