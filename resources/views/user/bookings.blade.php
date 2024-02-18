@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">

                    <h2>My Bookings</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="search-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">no</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone number</th>
                                <th scope="col">Number of guests</th>
                                <th scope="col">Check in date</th>
                                <th scope="col">Check out date</th>
                                <th scope="col">Destination</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->customer_name }}</td>
                                    <td>{{ $item->customer_phone }}</td>
                                    <td>{{ $item->num_guests }}</td>
                                    <td>{{ $item->check_in_date }}</td>
                                    <td>{{ $item->check_out_date }}</td>
                                    <td>{{ $item->city }}</td>
                                    <td>{{ $item->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="pagination">
            {{ $bookings->links('vendor.pagination.custom') }}
        </div>


    </div>
    <style>
        .pagination {
            display: flex;
            justify-content: center;
        }
    </style>
    {{-- <div class="amazing-deals">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading text-center">
                        <h2>Best Weekly Offers In Each City</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore.</p>
                    </div>
                </div>
                @if (count($cities) != 0)
                    @foreach ($cities as $city)
                        <div class="col-lg-6 col-sm-6">
                            <div class="item">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="image">
                                            <img src="{{ asset('assets/images/' . $city->image) }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 align-self-center">
                                        <div class="content">
                                            <span class="info">*Limited Offer Today</span>
                                            <h4 style="color: black;">{{ $city->name }}</h4>
                                            <div class="row">
                                                <div class="col-6">
                                                    <i class="fa fa-clock"></i>
                                                    <span class="list">{{ $city->num_days }} Days</span>
                                                </div>
                                                <div class="col-6">
                                                    <i class="fa fa-map"></i>
                                                    <span class="list">Daily Places</span>
                                                </div>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet dire consectetur adipiscing elit.</p>
                                            <div class="main-button">
                                                <a href="reservation.html">Make a Reservation</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="alert alert-success">No Results</p>
                @endif

            </div>
        </div>
    </div> --}}
@endsection
