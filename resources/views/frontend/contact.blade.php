@extends('frontend.layouts.master')
@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('{{ asset('frontend/assets/img/contact-bg.jpg') }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Contact Me</h1>
                        <span class="subheading">Have questions? I have answers.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon
                        as possible!</p>
                    <div class="my-5">
                        <form id="contactForm" action="{{ route('frontend.contactSubmit') }}" method="POST">
                            @csrf
                            <div class="form-floating">
                                <input class="form-control" name="name" id="name" type="text" placeholder="Name" />
                                <label for="name">Name</label>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="email" name="email" type="email"
                                    placeholder="Enter your email..." />
                                <label for="email">Email address</label>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input class="form-control" name="phone" id="phone" type="tel"
                                    placeholder="Enter your phone number..." />
                                <label for="phone">Phone Number</label>
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" name="message" id="message" placeholder="Enter your message here..."
                                    style="height: 12rem"></textarea>
                                <label for="message">Message</label>
                                @error('message')
                                    <div class="text-danger">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <br />
                            <!-- Submit Button-->
                            <button class="btn btn-primary text-uppercase" id="submitButton"
                                type="submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
