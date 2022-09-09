@extends('admin.hotel.includes.dash')
@section('title', 'Hotel Profile')

@section('style')
<style>

input[type=file]{
    display: none;
}

.bow-img-uploader{
    position: relative;
    width: 80%;
    margin-left: 10%;
    height: auto;
    padding: 15px;
    border: 2px dotted #0D307A;
    border-radius: 5px;
    color: #0D307A;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

.bow-img-uploader img{
    width: 50%;
    height: auto;
}

.bow-img-uploader-cover{
    position: relative;
    margin-bottom: 25px;
    margin-top: 5px;
}

.bow-img-uploader-cover i{
    font-size: 24px;
    position: absolute;
    right: 10%;
    border-radius: 18px;
    background-color: #0D307A;
    color: white;
    padding: 8px;
    width: 35px;
    height: 35px;
    line-height: 19px;
    cursor: pointer;
}
.bow-img-uploader-cover i:nth-child(odd) {
        top: -8px;
}
.bow-img-uploader-cover i:nth-child(even) {
        bottom: -8px;
        background-color: red;
}
</style>
@endsection

@section('content')
    <!-- Content -->
    <div class="content">

        <div class="page-header">
            <div class="page-title">
                <h3>Hotel Profile {!! empty($profile) ? '<span class="badge badge-danger">Not created</span>': ($profile->registration_fee_status==0 ? '<span class="badge badge-warning">Not paid</span>' : (empty($profile->approved_by) ? '<span class="badge badge-warning">Not approved</span>': '<span class="badge badge-success">Approved</span>')) !!}</h3>
            </div>
        </div>

        @if(!empty($profile) && $profile->registration_fee_status==0)
        {{-- Payment gateway --}}
        <div class="row">
            <div class="col-md-6">
                <div class="card border-0 bg-light">
                    <div class="card-header">
                        <h4 class="d-flex justify-content-between mb-2">
                            LKR.1500
                            <span class="text-danger text-right"><i class="fa fa-credit-card-alt" aria-hidden="true"></i></span>
                        </h4>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Please pay the registration fee to activate</h6>
                        
                            <form  action="stripe"  data-cc-on-file="false" data-stripe-publishable-key="{{env('STRIPE_KEY')}}" name="frmStripe" id="frmstripe" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label>Name on Card</label>
                                        <input class="form-control" size="4" type="text" value="cyasitha">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Number of Card</label>
                                        <input autocomplete="off" class="form-control" size="20" type="text" name="card_no" value="4242424242424242">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 form-group">
                                        <label>CVC</label>
                                        <input autocomplete="off" class="form-control" placeholder="ex. 311" size="3" type="text" value="123" name="cvv">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label>Expiration month</label>
                                        <input class="form-control" placeholder="MM" size="2" type="text" name="expiry_month" value="05">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label>Expiration year</label>
                                        <input class="form-control" placeholder="YYYY" size="4" type="text" name="expiry_year" value="2026">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 form-group">
                                        <button class="form-control btn btn-success submit-button" type="submit" style="margin-top: 10px;">Pay Now »</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
        @endif


         {{-- basic details --}}
         <div class="row">
            <div class="col-lg-!2 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">{{ empty($profile) ? 'Add new profile' : 'Update profile' }}</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ empty($profile) ? 'create-profile' : 'update-profile' }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if(!empty($profile))
                                    <input type="hidden" name="id" value="{{$profile->id}}">
                                    @endif
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name',!empty($profile) ? $profile->name : '' )}}" placeholder="Name" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="name">City</label>
                                            <select class="select2-example" name="city_id" required>
                                                <option>Select</option>
                                                @foreach($cities as $city)
                                                <option value="{{$city->id}}" {{ $city->id==old('city_id',!empty($profile) ? $profile->city_id : '' ) ? 'selected' : '' }}>{{$city->name}}</option>
                                                @endforeach
                                              </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="leagal_name">Leagal name</label>
                                            <input type="text" name="leagal_name" class="form-control" id="leagal_name" value="{{ old('leagal_name',!empty($profile) ? $profile->leagal_name : '' )}}" placeholder="Leagal name" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Hotel Type</label>
                                            <select class="select2-example" name="hotel_type_id" required>
                                                <option>Select</option>
                                                @foreach($types as $type)
                                                <option value="{{$type->id}}" {{ $type->id==old('hotel_type_id',!empty($profile) ? $profile->hotel_type_id : '' ) ? 'selected' : '' }}>{{$type->name}}</option>
                                                @endforeach
                                              </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="contacts">Contact</label>
                                            <input type="text" name="contacts" class="form-control" id="contacts" value="{{ old('contacts',!empty($profile) ? $profile->contacts[0] : '' )}}" placeholder="Contact Number" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" name="address" id="address" rows="3" required>{{ old('address',!empty($profile) ? $profile->address : '' )}}</textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" name="description" id="description" rows="3" required>{{ old('description',!empty($profile) ? $profile->description : '' )}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="lat">Latitude</label>
                                            <input type="number" step="0.000000000001" name="lat" class="form-control" id="lat" value="{{ old('lat',!empty($profile) ? $profile->lat : '' )}}" placeholder="Latitude">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="lng">Longitude</label>
                                            <input type="number" step="0.000000000001" name="lng" class="form-control" id="lng" value="{{ old('lng',!empty($profile) ? $profile->lng : '' )}}" placeholder="Longitude">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="facebook_link">Add Facebook Link</label>
                                            <input type="text" name="facebook_link" class="form-control" id="facebook_link" value="{{ old('facebook_link',!empty($profile) ? $profile->facebook_link : '' )}}" placeholder="Facebook link">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="video_url">Add video link</label>
                                            <input type="text" name="video_url" class="form-control" id="video_url" value="{{ old('video_url',!empty($profile) ? $profile->video_url : '' )}}" placeholder="video link">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Upload Logo</label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-3 col-lg-4 col-md-6 bow-img-uploader-cover">
                                            <label for="logo" class="bow-img-uploader">
                                                <img src="/images/img_upload.png" alt="">
                                                <span id="span">Click here to select</span>
                                                <input id="logo" type="file" name="logo" class="bow-img-input" accept="image/*">
                                            </label>
                                            <i class="fa fa-trash-o" onclick="remImg(this)"></i>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Upload Cover Images (Max: 5)</label>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-xl-3 col-lg-4 col-md-6 bow-img-uploader-cover">
                                            <label for="input" class="bow-img-uploader">
                                                <img src="/images/img_upload.png" alt="">
                                                <span id="span">Click here to select</span>
                                                <input id="input" type="file" name="images[]" class="bow-img-input" accept="image/*">
                                            </label>
                                            <i class="fa fa-trash-o" onclick="remImg(this)"></i>
                                            <i class="fa fa-plus" onclick="addImg(this)"></i>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            @if(empty($profile))
                                                <button type="submit" class="btn btn-primary">Create</button>
                                            @else
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            @endif
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
    toastr.options = {
        timeOut: 3000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 200
    };
    $(document).ready(function() {
                        @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        toastr.error('{{ $error }}');
                                    @endforeach       
                        @endif
                    
                        @if(session()->has('error'))
                                
                                toastr.error('{{ session()->get('error') }}');
                           
                        @endif
                    
                        @if(session()->has('success'))
                            toastr.success('{{ session()->get('success') }}');
                        @endif

                        $('.select2-example').select2({
                            placeholder: 'Select Hotel Type'
                        });
    });

    $(".bow-img-input").change(function(){
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(input).parent().children("img").attr('src', e.target.result);
            }
            $(input).parent().children("span").html(input.files[0].name);
            reader.readAsDataURL(input.files[0]);
        }
    }

    function getAppendedImg(id){
        return '<div class="col-xl-3 col-lg-4 col-md-6 bow-img-uploader-cover">\n'+
                    '<label for="input'+id+'" class="bow-img-uploader">\n'+
                        '<img src="/images/img_upload.png" alt="">\n'+
                        '<span id="span">Click here to select</span>\n'+
                        '<input id="input'+id+'" type="file"  name="images[]" class="bow-img-input" accept="image/*">\n'+
                    '</label>\n'+
                    '<i class="fa fa-trash-o" onclick="remImg(this)"></i>\n'+
                    '<i class="fa fa-plus" onclick="addImg(this)"></i>\n'+
                '</div>';
    }

    function addImg(icon){
        var count = $(icon).parent().parent().children().length;
        if(count<5){
            $(icon).parent().parent().append(getAppendedImg(count));
            $(".bow-img-input").change(function(){
                readURL(this);
            });
        }
    }

    function remImg(icon){
        var count = $(icon).parent().parent().children().length;
        if(count>1){
            $(icon).parent().remove();
        }else{
            $(icon).parent().children(".bow-img-uploader").children("#bow-img-input").val('');
            $(icon).parent().children(".bow-img-uploader").children("img").attr('src', '/images/img_upload.png');
            $(icon).parent().children(".bow-img-uploader").children("span").html('Click here to select');
        }
    }
</script>

                        
    
@endsection
