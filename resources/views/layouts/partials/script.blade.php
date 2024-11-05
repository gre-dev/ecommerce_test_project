<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
@yield('script')
<script>
    $(document).ready(function(){
        $('input[name=search]').on('input', function(e){
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('products.search') }}",
                type: "GET",
                data: {'search': e.target.value},
                dataType: 'json',
                success: function(data) {
                    if (data.success) {

                       // alert('ok');
                        $('#searchResult').html(data.html);

                       
                    }
                },
                error: function (err) {
               

                        $("#message").html("<div class='alert alert-danger error'>Some Error Occurred!</div>")
                    }
                });
            
           
        });
    });

</script>