@extends('layouts.app')

@section('title', 'Dashboard')


@section('content')
    <!-- Main content -->

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3> {{ $products }} </h3>
                    <p>Products</p>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $categories }}<sup style="font-size: 20px"></sup></h3>
                    <p>Kategory</p>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <!-- /.row -->
    @endsection
