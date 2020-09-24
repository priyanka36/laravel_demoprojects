
<script>
    var basePath = "{{ url('/') }}" + '/';
</script>

<script src="{{asset('assets/backend/lib/jquery/jquery.js')}}"></script>
<script src="{{asset('assets/backend/lib/popper.js/popper.js')}}"></script>
<script src="{{asset('assets/backend/lib/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
<script src="{{asset('assets/backend/lib/moment/moment.js')}}"></script>
<script src="{{asset('assets/backend/lib/jquery-ui/jquery-ui.js')}}"></script>
<script src="{{asset('assets/backend/lib/jquery-switchbutton/jquery.switchButton.js')}}"></script>
<script src="{{asset('assets/backend/lib/peity/jquery.peity.js')}}"></script>

<script src="{{asset('assets/backend/lib/highlightjs/highlight.pack.js')}}"></script>


<script src="{{asset('assets/backend/js/bracket.js')}}"></script>
<script src="{{asset('assets/backend/plugins/toastr/toastr.min.js')}}"></script>

<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>


{{--vue js--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.js"></script>
{{--axios--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.min.js"></script>
{{--loadash--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js"></script>
{{--vue js--}}

{{--toastr plugn--}}
<script>
            @if(\Illuminate\Support\Facades\Session::has('message'))
                var type="{{\Illuminate\Support\Facades\Session::get('alert-type','success')}}"


    switch(type){
        case 'info':
            toastr.info("{{ \Illuminate\Support\Facades\Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ \Illuminate\Support\Facades\Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ \Illuminate\Support\Facades\Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ \Illuminate\Support\Facades\Session::get('message') }}");
            break;
    }
    @endif
</script>

