<div class="modal fade" id="modal-success" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content tw-rounded-[15px]">
            <div class="modal-body px-sm-5">
                <div class="text-center mt-3 mb-4">
                    <i class="fas fa-circle-check font-size-500"></i>
                </div>

                <div class="font-size-120">
                    <div class="text-center h-custom-3 font-weight-500 mb-2 title"></div>
                </div>
                <div class="text-center h-custom-3 mb-1 message"></div>
            </div>
            <div class="modal-footer justify-content-center py-4" style="border-color:#808080">
                <button type="button" class="btn btn-custom-1 font-weight-500 px-5" data-bs-dismiss="modal">Okay</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-error" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content tw-rounded-[15px]">
            <div class="modal-body">
                <div class="text-center mt-3 mb-3">
                    <i class="fas fa-exclamation-circle font-size-500"></i>
                </div>

                <div class="font-size-120">
                    <div class="text-center h-custom-3 font-weight-500 mb-2 title">Whoops!</div>
                </div>
                <div class="text-center h-custom-3 mb-1 message">Sorry, we couldn't process your request. Please try a different approach.</div>
            </div>
            <div class="modal-footer justify-content-center py-4" style="border-color:#808080">
                <button type="button" class="btn btn-custom-1 px-5" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-warning" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content" style="border-radius:20px">
            <div class="modal-header" style="z-index:1; border:0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="margin-top:-45px">
                <div class="text-center mt-3 mb-4">
                    <i class="fas fa-circle-exclamation font-size-400 text-color-1"></i>
                </div>
                <div class="text-center font-weight-600 mb-1">Proceed?</div>
            </div>
            <div class="modal-footer justify-content-center py-4" style="border-color:#808080">
                <button type="button" class="btn btn-custom-2 font-weight-500 px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-custom-1 font-weight-500 px-4 confirm">Confirm</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-forgot-password" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:0">
            <div class="modal-body px-4 px-md-5 py-5">
                <div class="text-center">
                    <div class="position-absolute" style="top:24px; right:24px">
                        <i class="fa-solid fa-times font-size-120 cursor-pointer" data-bs-dismiss="modal"></i>
                    </div>

                    <div class="font-size-110 font-size-md-100 font-size-lg-90">
                        <p class="text-color-2 cerebri-sans-pro-medium font-size-110 font-size-md-120 font-size-lg-130 font-size-xl-140 font-size-xxl-150 mb-2">Forgot Password</p>
                    </div>

                    <div class="font-size-90 font-size-md-80 font-size-lg-70">
                        <p class="text-color-2 cerebri-sans-pro-regular font-size-110 font-size-md-120 font-size-lg-130 font-size-xl-140 font-size-xxl-150 mb-4">Enter your email address below and we'll send you a link to reset your password.</p>
                    </div>
                </div>

                <form id="forgot-password-form" class="mb-4">
                    <input type="hidden" name="url" value="{{ route('password.request') }}" />

                    <input type="email" name="email" class="form-control form-control-1 mb-3 py-2" style="height:45px" placeholder="Your email address" required />

                    <div class="">
                        <button type="submit" class="btn btn-custom-1 w-100 py-2" style="height:50px">Send Password Reset Email</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
