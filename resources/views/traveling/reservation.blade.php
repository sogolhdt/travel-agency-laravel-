@extends('layouts.app')

@section('content')
    <div class="second-page-heading">
        <div class="container">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <h4>Book Prefered Deal Here</h4>
                    <h2>Make Your Reservation</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt uttersi
                        labore et dolore magna aliqua is ipsum suspendisse ultrices gravida</p>
                    <div class="main-button"><a href="about.html">Discover More</a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="more-info reservation-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="info-item">
                        <i class="fa fa-phone"></i>
                        <h4 style="color: black;">Make a Phone Call</h4>
                        <a href="#">+123 456 789 (0)</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="info-item">
                        <i class="fa fa-envelope"></i>
                        <h4 style="color: black;">Contact Us via Email</h4>
                        <a href="#">company@email.com</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="info-item">
                        <i class="fa fa-map-marker"></i>
                        <h4 style="color: black;">Visit Our Offices</h4>
                        <a href="#">24th Street North Avenue London, UK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="reservation-form">
        @csrf
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <form id="reservation-form" method="POST" role="search" action="{{ route('make.reservation') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 style="color: black;">Make Your <em>Reservation</em> Through This <em>Form</em></h4>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="Name" class="form-label">Your Name</label>
                                    <input type="text" name="customer_name" class="Name" placeholder="Ex. John Smithee"
                                        autocomplete="on">
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="Number" class="form-label">Your Phone Number</label>
                                    <input type="text" name="customer_phone" class="Number"
                                        placeholder="Ex. +xxx xxx xxx" autocomplete="on">
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="chooseGuests" class="form-label">Number Of Guests</label>
                                    <select name="num_guests" class="form-select" aria-label="Default select example"
                                        id="chooseGuests" onChange="this.form.click()">
                                        <option selected>ex. 3 or 4 or 5</option>
                                        <option type="checkbox" name="option1" value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4+">4+</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="Number" class="form-label">Check In Date</label>
                                    <input type="date" name="check_in_date" class="date">
                                </fieldset>
                                <fieldset>
                                    <label for="Number" class="form-label">Check Out Date</label>
                                    <input type="date" name="check_out_date" class="date">
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="hidden" name="city_id" required value="{{ $cityId }}">
                                    <input type="hidden" name="user_id" required value="{{ Auth::user()->id }}">
                                </fieldset>
                            </div>

                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="chooseDestination" class="form-label">Choose Your Destination</label>
                                    <input disabled type="text" name="Destination" value="{{ $cityName }}" />
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button class="main-button">Make Your Reservation Now</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
