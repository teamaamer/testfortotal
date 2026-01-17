@foreach ($courses as $course)
    <div class="col-md-6">

        <div class="post-snippet mb64">
            <a href="#">
                <img class="mb24" alt="Post Image" src="{{ asset('/uploads/courses/' . $course->image) }}" />
            </a>
            <div class="post-title">
                <span class="label">{{ $course->start_on }}</span>
                <a href="#">
                    <h4 class="inline-block">{{ $course->title }}</h4>
                </a>
            </div>
            <ul class="post-meta">
                <li>
                    <i class="ti-user"></i>
                    <span>Added by
                        <a href="#">{{ $course->academy->name }}</a>
                    </span>
                </li>
                <li>
                    <i class="ti-money"></i>
                    <span>
                        <a>{{ $course->price }}</a>
                    </span>
                </li>
            </ul>
            <hr>
            <p>
                {{ $course->summary }}
            </p>

            <div class="modal-container">

                @auth
                    {{-- User is logged in --}}
                    <a class="btn btn-sm" href="{{ route('courses.show', $course->id)  }}">
                        Load More
                    </a>
                @else
                    <a class="btn btn-sm btn-modal" href="#" data-toggle="modal" data-target="#loginModal">Enroll</a>

                    <div class="foundry_modal text-center">
                        <h3 class="uppercase">Sign In &amp; Join Us.</h3>



                        <!-- Sign-In Form -->
                        <form action="{{ route('login') }}" method="POST" class="login-form text-left"
                            data-success="Welcome back!" data-error="Please fill all fields correctly.">

                            @csrf

                            <input type="hidden" name="redirect_to" value="{{ route('courses.show', $course->id) }}">


                            <input type="text" name="email" id="email"
                                class="mb20 validate-email validate-required" placeholder="Email Address" required>


                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <input type="password" name="password" id="password" class="mb20 validate-required"
                                placeholder="Password" required>


                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                             <button type="submit" class="btn-white mb20">
                                Login
                            </button>

                            <p class="mt20">
                                <a href="#" data-toggle="modal" data-target="#signupModal"
                                    class="show-register text-link">
                                    Don't have an account? Register here
                                </a>
                            </p>

                        </form>

                        <form action="{{ route('ajax.register') }}" method="POST" class="ajax-register-form"
                            style="display:none" data-success="Account created successfully!"
                            data-error="Please fill all fields correctly.">

                            @csrf

                           <input type="hidden" name="redirect_to" value="{{ route('courses.show', $course->id) }}">

                            <input type="hidden" name="role" value="student">

                            <input type="text" name="name" class="mb20 validate-required" placeholder="Full Name"
                                required>

                            <input type="text" name="email" class="mb20 validate-email validate-required"
                                placeholder="Email Address" required>

                            <input type="password" name="password" class="mb20 validate-required" placeholder="Password"
                                required>

                            <input type="password" name="password_confirmation" class="mb20 validate-required"
                                placeholder="Confirm Password" required>

                            <button type="submit" class="btn-white mb20">
                                Sign Up
                            </button>

                            <p class="mt20">
                                <a href="#" data-toggle="modal" data-target="#signupModal"
                                    class="show-login text-link">
                                    Already have an account? Login here
                                </a>
                            </p>

                        </form>
                    </div>
                    <!--end modal-->
                @endauth
            </div>

        </div>
    </div>
@endforeach
