<div class="modal fade" id="modal-forgot-password" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:0">
            <div class="modal-body px-4 px-md-5 py-5">
                <div class="text-center">
                    <div class="position-absolute" style="top:24px; right:24px">
                        <i class="fa-solid fa-times font-size-120 cursor-pointer" data-bs-dismiss="modal"></i>
                    </div>

                    <p class="h-custom-3 font-weight-500 mb-3">Forgot Password</p>
                    <p class="h-custom-4 mb-4 pb-2">Enter your email address below and we'll send you a link to reset your password.</p>
                </div>

                <form id="forgot-password-form" class="mb-4">
                    <input type="hidden" name="url" value="{{ route('password.request') }}" />

                    <input type="email" name="email" class="form-control form-control-1 mb-3 py-2 tw-h-[45px] text-center" placeholder="Your email address" required />

                    <div class="">
                        <button type="submit" class="btn btn-custom-1 w-100 py-2 tw-h-[45px]">Send Password Reset Email</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
