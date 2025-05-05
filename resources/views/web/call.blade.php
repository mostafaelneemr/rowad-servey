<!-- Start Call To Action -->
<div class="brook-call-to-action pb--70" style="background-color: #fff; margin-top: -50px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="d-inline-flex gap-4 flex-wrap justify-content-center">
                    <a class="brook-btn bk-btn-white text-theme btn-sd-size btn-rounded"
                       style="background-color: rgba(255,171,0,1); color: whitesmoke"
                       href="mailto:{{ setting('email')->value }}" target="_blank">
                        {{ __('Email') }}
                        <i class="fa fa-envelope" style="padding-left: 5px;"></i>
                    </a>

                    <a class="brook-btn bk-btn-white text-theme btn-sd-size btn-rounded"
                       style="background-color: rgba(12,128,41,1); color: whitesmoke"
                       href="https://wa.me/{{ setting('whatsapp_phone')->value }}" target="_blank">
                        {{ __('WhatsApp') }}
                        <i class="fab fa-whatsapp" style="padding-left: 5px;"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- End Call To Action -->
