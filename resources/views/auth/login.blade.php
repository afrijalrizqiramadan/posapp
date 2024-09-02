<x-authentication>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card overflow-hidden">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="p-lg-5 p-4 auth-one-bg h-100">
                                <div class="bg-overlay"></div>
                                <div class="position-relative h-100 d-flex flex-column">
                                    <div class="mb-4">
                                        <a href="{{ route('home') }}" class="d-block">
                                            <img src="{{ asset('assets/images/image.png') }}" class="rounded-3"
                                                alt="" height="45">
                                        </a>
                                    </div>
                                    <div class="mt-auto">
                                        <div class="mb-3">
                                            <i class="ri-double-quotes-l display-4 text-success"></i>
                                        </div>

                                        <div id="qoutescarouselIndicators" class="carousel slide"
                                            data-bs-ride="carousel">
                                            {{-- <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#qoutescarouselIndicators"
                                                    data-bs-slide-to="0" class="active" aria-current="true"
                                                    aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#qoutescarouselIndicators"
                                                    data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#qoutescarouselIndicators"
                                                    data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div> --}}
                                            {{-- <div class="carousel-inner text-center text-white-50 pb-5">
                                                <div class="carousel-item active">
                                                    <p class="fs-15 fst-italic">"Ilmu tanpa amal adalah kegilaan, dan
                                                        amal tanpa ilmu adalah kesia-siaan." - Imam Ghazali </p>
                                                </div>
                                                <div class="carousel-item">
                                                    <p class="fs-15 fst-italic">"Menuntut ilmu (agama) adalah kewajiban
                                                        bagi setiap muslim." - Hadis</p>
                                                </div>
                                                <div class="carousel-item">
                                                    <p class="fs-15 fst-italic">"Teruslah menjadi orang yang mencari
                                                        ilmu kapanpun dan di manapun."</p>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <!-- end carousel -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-lg-6">
                            <div class="p-lg-5 p-4">
                                <div>
                                    <h5 class="text-primary">Selamat Datang Kembali !</h5>
                                    <p class="text-muted">Silahkan login untuk Akses</p>
                                </div>
                                <div class="mt-2 text-center">
                                    <lord-icon src="https://cdn.lordicon.com/huwchbks.json" trigger="loop"
                                        colors="primary:#0ab39c" class="avatar-xl"></lord-icon>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="list-unstyled m-0 py-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="mt-2">
                                    <form id="login" method="post" action="{{ url('/login') }}">
                                        @csrf
                                        <h1>Login</h1>
                                        <p class="text-muted">Masuk ke Akun Anda</p>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="bi bi-person"></i>
                                                </span>
                                            </div>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" placeholder="Email">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="bi bi-lock"></i>
                                                </span>
                                            </div>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Password" name="password">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <button id="submit"
                                                    class="btn btn-success px-4 d-flex align-items-center"
                                                    type="submit">
                                                    Login
                                                    <div id="spinner" class="spinner-border text-info" role="status"
                                                        style="height: 20px;width: 20px;margin-left: 5px;display: none;">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                </button>
                                            </div>
                                            <div class="col-8 text-right">
                                                <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                                    Forgot password?
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->

        </div>
        <!-- end row -->
    </div>
</x-authentication>
