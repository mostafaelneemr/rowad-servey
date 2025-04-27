    <!-- <script src="js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="js/vendor/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script> -->

    <!-- REVOLUTION JS FILES -->
    <!-- <script src="js/jquery.themepunch.tools.min.js"></script>
    <script src="js/jquery.themepunch.revolution.min.js"></script> -->

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <!-- <script src="js/revolution.extension.actions.min.js"></script>
    <script src="js/revolution.extension.carousel.min.js"></script>
    <script src="js/revolution.extension.kenburn.min.js"></script>
    <script src="js/revolution.extension.layeranimation.min.js"></script>
    <script src="js/revolution.extension.migration.min.js"></script>
    <script src="js/revolution.extension.navigation.min.js"></script>
    <script src="js/revolution.extension.parallax.min.js"></script>
    <script src="js/revolution.extension.slideanims.min.js"></script>
    <script src="js/revolution.extension.video.min.js"></script> -->



    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="{{asset('website/assets/js/vendor/vendor.min.js')}}"></script>
    <script src="{{asset('website/assets/js/plugins.min.js')}}"></script>
    <!-- REVOLUTION JS FILES -->
    <script src="{{asset('website/assets/js/revolution.tools.min.js')}}"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
    <script src="{{asset('website/assets/js/revolution.extension.min.js')}}"></script>
    <script src="{{asset('website/assets/js/main.js')}}"></script>
    <script src="{{asset('website/assets/js/revoulation.js')}}"></script>

    @yield('script')

    <script>
        function changeLanguage(lang) {
            window.location.href = `{{ url('change-language') }}/${lang}`;
        }
    </script>
