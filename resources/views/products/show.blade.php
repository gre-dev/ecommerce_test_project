@extends('layouts.master')
@section('title', 'Show product Deatils')

@section('css')
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">


@endsection


@section('style')
    <style>
            
        /* Rating Star Widgets Style */
        .rating-stars ul {
        list-style-type:none;
        padding:0;
        
        -moz-user-select:none;
        -webkit-user-select:none;
        }
        .rating-stars ul > li.star {
        display:inline-block;
        
        }
        .rating-stars ul > li.star_review_li {
        display:inline-block;
        
        }

        /* Idle State of the stars */
        .rating-stars ul > li.star > i.fa {
        color:#ccc; /* Color on idle state */
        }
        .rating-stars2 ul > li.star > i.fa {
        font-size:2.5em; /* Change the size of the stars */
        }
        /* Hover state of the stars */
        .rating-stars ul > li.star.hover > i.fa {
        color:#FFCC36;
        }

        /* Selected state of the stars */
        .rating-stars ul > li.star.selected > i.fa {
        color:#FF912C;
        }

              /* Idle State of the stars */
        .rating-stars ul > li.star_review_li > i.fa {
        color:#ccc; /* Color on idle state */
        }
        .rating-stars2 ul > li.star_review_li > i.fa {
        font-size:2.5em; /* Change the size of the stars */
        }
        /* Hover state of the stars */
        .rating-stars ul > li.star_review_li.hover > i.fa {
        color:#FFCC36;
        }

        /* Selected state of the stars */
        .rating-stars ul > li.star_review_li.selected > i.fa {
        color:#FF912C;
        }

    </style>
@endsection

@section('breadcrumb-title')
    <h3>Show product Deatils</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item "><a href="{{ route('products.all') }}">Products List</a></li>
<li class="breadcrumb-item active">Product Detail</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 project-list">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="top-tabContent">
                            <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                                <div class="row">
                                    @if(session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    <div class="project-box">
                                        <div class="d-flex justify-content-between">
                                            <h1>{{ $product->name }}</h1>
                                            <p class="badge {{ $product->status == 1 ? 'badge-success' : 'badge-danger' }} "> {{ $product->status == 1 ? 'Active' : 'Inactive' }}</p>

                                        </div>
                                        <p>{{ $product->description }}</p>
                                        <p>Price: ${{ $product->price }}</p>

                                        @if(\Auth::user()->type == 'admin')
                                            <form method="POST" action="{{ route('products.changeStatus', $product->id) }}">
                                                @csrf
                                                <div class="col-md-6 d-flex justify-content-between">
                                                    <select class="form-control w-75 p-1" name="status">
                                                        <option value="1" {{ $product->status == 1 ? 'selected':'' }}>Active</option>
                                                        <option value="0" {{ $product->status == 0 ? 'selected':'' }}>Inactive</option>
                                                    </select>  
                                                
                                                
                                                    <button class="btn btn-primary" id="submitBtn" style="width: auto;">Save</button>
                                                </div>
                                                @if($product->status_updated_at != '')
                                                    <div class="col-md-6">
                                                      <small> last Changed : {{ $product->status_updated_at }} </small>
                                                    </div>
                                                @endif




                                            </form>
                                        @endif
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>

                <div class="card">
                    <div class="card-body">
                        <h3>Add Review</h3>
                        <div class="error"></div>
                        
                        <form id="frmAppl" class="frmAppl">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                <!-- Rating Stars Box -->
                                    <div class='rating-stars rating-stars2 text-center'>
                                        <ul id='stars_review'>
                                        <li class='star_review_li' title='Poor' data-value='1'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star_review_li' title='Fair' data-value='2'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star_review_li' title='Good' data-value='3'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star_review_li' title='Excellent' data-value='4'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        <li class='star_review_li' title='WOW!!!' data-value='5'>
                                            <i class='fa fa-star fa-fw'></i>
                                        </li>
                                        </ul>
                                    
                                    </div>
                                    <input type="hidden" id="rate" name="rate" value="">
                                    <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                                </div>
                                <div class="col-md-12" style="margin-top:10px">
                                        <textarea placeholder="please leave your comment" class="form-control" name="comment" id="comment"></textarea>
                                </div>
                                <div class="col-md-12" style="margin-top:10px">
                                <button class="btn btn-primary" id="submitBtn" style="width: auto;">Save</button>
                                </div>
                            </div> 
                        </form>       

                    </div>
                </div>


                <h3>Reviews</h3>
                <div class="row" id="reviews">
                    @if($reviews->count() > 0)
                    @foreach ($reviews as $review)
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="feature">
                                        <div class="d-flex   justify-content-between">
                                            <h6>{{ $review->user->name }}</h6>

                                            <span>{{ $review->created_at }}</span>
                                        </div>
                                        <div class='rating-stars text-left'>
                                            <ul id='stars'>
                                            <li class='star {{ $review->rate > 0 ?'selected':'' }}' title='Poor' data-value='1'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star {{ $review->rate > 1 ?'selected':'' }}' title='Fair' data-value='2'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star {{ $review->rate > 2 ?'selected':'' }}' title='Good' data-value='3'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star {{ $review->rate > 3 ?'selected':'' }}' title='Excellent' data-value='4'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            <li class='star {{ $review->rate > 4 ?'selected':'' }}' title='WOW!!!' data-value='5'>
                                                <i class='fa fa-star fa-fw'></i>
                                            </li>
                                            </ul>
                                        
                                        </div>

                                        <p>{{ $review->comment }}</p>

                                    </div>
                                </div>
                            </div> 
                        </div>    
                    @endforeach
                    @endif
                </div>   


            </div>
        </div>
    </div>        
    
    
        {{-- Modal --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="showMsg">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body" style="text-align: center;">
                        <h4>Thank you for submitting the form</h4>
                    </div>
                    <div class="modal-footer" style="border: none;">
    
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


@endsection  
@section('script')
    <script>
        $("#frmAppl").on("submit", function(event) {
            $('.err-msg').hide();
            $(".error").html("");
            var user_name = "<?php echo Auth()->user()->name; ?>";
            event.preventDefault();
   
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
    
            $.ajax({
                url: "{{ route('review.store') }}",
                type: "POST",
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                processData: false,
                cache: false,
                beforeSend: function() {
                    $("#submitBtn").prop('disabled', true);
                },
                success: function(data) {
                    if (data.success) {

                        $("#frmAppl")[0].reset();
                        $("#showMsg").modal('show');
                        
                    
                    
                        var stars = $('li.star_review_li');
                        
                        for (i = 0; i < stars.length; i++) {

                            $(stars[i]).removeClass('selected');
                        }

                        $("#submitBtn").prop('disabled', false);


                        var html=`<div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="feature">
                                            <div class="d-flex   justify-content-between">
                                                <h6>`+user_name+`</h6>

                                                <span> `+data.data.created_at+`</span>
                                            </div>
                                            <div class='rating-stars text-left'>
                                                <ul id='stars'>`;
                                                if(data.data.rate > 0){
                                                    var selected='selected';
                                                }else{
                                                    var selected='';   
                                                }
                                                html+=`<li class='star `+selected+`' title='Poor' data-value='1'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>`;

                                                if(data.data.rate > 1){
                                                    var selected='selected';
                                                }else{
                                                    var selected='';   
                                                }
                                                html+=`<li class='star `+selected+`' title='Poor' data-value='1'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>`;

                                                if(data.data.rate > 2){
                                                    var selected='selected';
                                                }else{
                                                    var selected='';   
                                                }
                                                html+=`<li class='star `+selected+`' title='Poor' data-value='1'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>`;

                                                if(data.data.rate > 3){
                                                    var selected='selected';
                                                }else{
                                                    var selected='';   
                                                }
                                                html+=`<li class='star `+selected+`' title='Poor' data-value='1'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>`;

                                                if(data.data.rate > 4){
                                                    var selected='selected';
                                                }else{
                                                    var selected='';   
                                                }
                                                html+=`<li class='star `+selected+`' title='Poor' data-value='1'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>`;



                                                html+=`
                                                </ul>
                                            
                                            </div>

                                            <p>`+data.data.comment+`</p>

                                        </div>
                                    </div>
                                </div> 
                            </div>`;
                            $('#reviews').prepend(html);

                    }
                },
                error: function (err) {
                    $.each(err.responseJSON.errors, function(key, value) {
                            var el = $(document).find('[name="'+key + '"]');
                            el.after($('<span class= "err-msg" style="color:red;">' + value[0] + '</span>'));
                            
                        });

                        $("#submitBtn").prop('disabled', false);

                        $(".error").html("<div class='alert alert-danger error'>Some Error Occurred!</div>")

                    }
                });
        });


 

        $(document).ready(function(){
        
        /* 1. Visualizing things on Hover - See next part for action on click */
            $('#stars_review li').on('mouseover', function(){
                var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
            
                // Now highlight all the stars that's not after the current hovered star
                $(this).parent().children('li.star_review_li').each(function(e){
                if (e < onStar) {
                    $(this).addClass('hover');
                }
                else {
                    $(this).removeClass('hover');
                }
                });
                
            }).on('mouseout', function(){
                $(this).parent().children('li.star_review_li').each(function(e){
                $(this).removeClass('hover');
                });
            });
        
        
            /* 2. Action to perform on click */
            $('#stars_review li').on('click', function(){
                var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                var stars = $(this).parent().children('li.star_review_li');
                
                for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
                }
                
                for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
                }
                
                // JUST RESPONSE (Not needed)
                var ratingValue = parseInt($('#stars_review li.selected').last().data('value'), 10);
                var rate = 0;
                if (ratingValue > 1) {
                    rate = ratingValue;
                }
                else {
                    rate = ratingValue;
                }
                $('#rate').val(rate);
                
            });
        
        
        });


  

    </script>

@endsection  
