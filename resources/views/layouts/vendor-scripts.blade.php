<!-- JAVASCRIPT -->
<script src="{{ URL::asset('/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ URL::asset('/assets/libs/node-waves/node-waves.min.js')}}"></script>
<script src="{{ URL::asset('/js/app.js')}}"></script>
<script src="{{ URL::asset('/vendor/emoji-picker/lib/js/config.js')}}"></script>
<script src="{{ URL::asset('/vendor/emoji-picker/lib/js/util.js')}}"></script>
<script src="{{ URL::asset('/vendor/emoji-picker/lib/js/jquery.emojiarea.js')}}"></script>
<script src="{{ URL::asset('/vendor/emoji-picker/lib/js/emoji-picker.js')}}"></script>

@yield('script')
<!-- App js -->

<!-- Magnific Popup-->
<script src="{{ URL::asset('assets/libs/magnific-popup/magnific-popup.min.js')}}"></script>
<!-- owl.carousel js -->
<script src="{{ URL::asset('assets/libs/owl.carousel/owl.carousel.min.js')}}"></script>
<!-- page init -->
<script src="{{ URL::asset('assets/js/pages/index.init.js')}}"></script>

<script>
    // global app configuration object
    var my_id = "{{ Auth::id() }}";
    var config = {
        routes: {
            nameupdate: "{{ route('nameupdate')}}",
            updateavatar: "{{ route('updateavatar')}}",
            groups: "{{ route('groups')}}",
            url: "{{ URL::asset('') }}"
        }
    };

</script>

@yield('script-bottom')