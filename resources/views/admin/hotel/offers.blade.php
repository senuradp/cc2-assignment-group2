@extends('admin.hotel.includes.dash')
@section('title', 'Add Offer')

@section('content')
    <!-- Content -->
    <div class="content">

        <div class="page-header">
            <div class="page-title">
                <h3>{{empty($offer) ? 'Add' : 'Edit'}} Offer</h3>
            </div>
        </div>


        {{-- name --}}
        <div class="row">
            <div class="col-lg-!2 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">{{empty($offer) ? 'Add new' : 'Edit'}}  offer</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="/hotel-portal/add-offer{{empty($offer) ? '' : '/'.$offer->id}}" method="POST" class="repeater">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name',!empty($offer) ? $offer->name : '' )}}" placeholder="Name" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="discount">Discount</label>
                                            <input type="number" step="0.01" name="discount" class="form-control" id="discount" value="{{ old('discount',!empty($offer) ? $offer->discount : '' )}}" placeholder="discount" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="img_url">Img url</label>
                                            <input type="text" name="img_url" class="form-control" id="img_url" value="{{ old('img_url',!empty($offer) ? $offer->img_url : '' )}}" placeholder="Img url" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="expires_at">Expires at</label>
                                            <input type="date" step="1" min="{{ date('Y-m-d') }}" name="expires_at" class="form-control" id="expires_at" value="{{ old('expires_at',!empty($offer) ? $offer->expires_at : '' )}}" placeholder="expires_at" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-primary mt-0"> <i class="fa fa-floppy-o mr-2" aria-hidden="true"></i> {{empty($offer)? 'Save' : 'Update'}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- ./ Content -->

@endsection

@section('scripts')
<script>
    // jQuery document ready
    $(document).ready(function() {
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
