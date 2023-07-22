
<div id="app" class="app app-full-height app-without-header">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <!-- BEGIN login -->
    <div class="login">
        <!-- BEGIN login-content -->
        <div class="login-content">
            <form action="index.html" wire:submit.prevent='submit' name="login_form">
                <h1 class="text-center">صفحة تسجيل الدخول</h1>
                <div class="text-inverse text-opacity-50 text-center mb-4">
                    For your protection, please verify your identity.
                </div>
                <div class="mb-3">
                    <label class="form-label">Email Address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg bg-inverse bg-opacity-5" wire:model="email" placeholder="">
                    @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <div class="d-flex">
                        <label class="form-label">Password <span class="text-danger">*</span></label>
                        <a href="#" class="ms-auto text-inverse text-decoration-none text-opacity-50">Forgot password?</a>
                    </div>
                    <input  type="password" class="form-control form-control-lg bg-inverse bg-opacity-5" wire:model="password" placeholder="">
                    @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="customCheck1">
                        <label class="form-check-label" for="customCheck1">Remember me</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3">Sign In</button>
                <div class="text-center text-inverse text-opacity-50">
                    Don't have an account yet? <a href="page_register.html">Sign up</a>.
                </div>
            </form>
        </div>
        <!-- END login-content -->
    </div>
    <!-- END login -->
</div>

