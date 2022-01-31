@extends('layouts.app')
@section('title','Manage Category')
@section('content')

<div class="main-panel" onload="window.print()">
    <div class="container">
        <div class="page-inner">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-9">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="page-title">Invoice #{{ $order->invoice }}</h4>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('order.print', [$order->invoice]) }}" class="btn btn-primary" target="_blank">
                               <i class="fas fa-print"></i> Print
                            </a>
                        </div>
                    </div>
                    <div class="page-divider"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-invoice">
                                <div class="card-header">
                                    <div class="invoice-header">
                                        <h3 class="invoice-title">
                                            Invoice
                                        </h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="separator-solid"></div>
                                    <div class="row">
                                        <div class="col-md-4 info-invoice">
                                            <h5 class="sub">Tanggal</h5>
                                            <p>{{ substr($order->created_at,0,10) }}</p>
                                        </div>
                                        <div class="col-md-4 info-invoice">
                                            <h5 class="sub">Invoice ID</h5>
                                            <p>#{{ $order->invoice }}</p>
                                        </div>
                                        <div class="col-md-4 info-invoice">
                                            <h5 class="sub">Kasis</h5>
                                            <p>
                                                {{ Auth::user()->name }} 
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="invoice-detail">
                                                <div class="invoice-top">
                                                    <h3 class="title"><strong>Ringkasan pesanan</strong></h3>
                                                </div>
                                                <div class="invoice-item">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <td><strong>Item</strong></td>
                                                                    <td class="text-center"><strong>Harga</strong></td>
                                                                    <td class="text-center"><strong>Qty</strong></td>
                                                                    <td class="text-right"><strong>Total</strong></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    $listcart = product_list($order->cart_id);
                                                                    $subtotal = 0; 
                                                                    $diskon = 0; 
                                                                ?>
                                                                @foreach($listcart as $row)
                                                                <tr>
                                                                    <td>{{ $row->name_product }}</td>
                                                                    <td class="text-center">@currency($row->price)</td>
                                                                    <td class="text-center">{{ $row->qty }}</td>
                                                                    <td class="text-right">@currency($row->price * $row->qty)</td>
                                                                </tr>

                                                                <?php 
                                                                    $subtotal += $row->price * $row->qty;
                                                                    $diskon += $row->discount * $row->qty;
                                                                ?>
                                                                @endforeach
                                                                <?php
                                                                    $a = $subtotal - $diskon;
                                                                    $pajak = $a / $tax->value; 
                                                                    $jumlah = $a + $pajak;
                                                                ?>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="text-center"><strong>Subtotal</strong></td>
                                                                    <td class="text-right">@currency($subtotal)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="text-center"><strong>Diskon</strong></td>
                                                                    <td class="text-right">@currency($diskon)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="text-center"><strong>Pajak</strong></td>
                                                                    <td class="text-right">@currency($pajak)</td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td class="text-center"><strong>Total</strong></td>
                                                                    <td class="text-right">@currency($jumlah)</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>	
                                            <div class="separator-solid  mb-3"></div>
                                        </div>	
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection