@extends('layouts.app')
@section('title','Manage Category')
@section('content')
<div class="main-panel">
    <div class="container">
       <div class="page-inner">
          <div class="row">
             <div class="col-md-12">
                <div class="card">
                   <div class="card-header">
                      <div class="row">
                         <div class="col-md-6">
                            <h5 class="card-title">Data Kategori</h5>
                         </div>
                         <div class="col-md-6 text-right">
                            <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Tambah kategori
                            </a>
                         </div>
                      </div>
                   </div>
                   <div class="card-body">
                      <div class="table-responsive">
                         <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                               <tr>
                                  <th style="width: 5%">No</th>
                                  <th>Invoice</th>
                                  <th>Kasir</th>
                                  <th>Nama pembeli</th>
                                  <th>Jenis pembayaran</th>
                                  <th>Total</th>
                                  <th style="width: 10%" class="text-center">Action</th>
                               </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                               <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $order->invoice }}</td>
                                  <td>{{ $order->user->name }}</td>
                                  <td>{{($order->name_customer) ? $order->name_customer : '-'; }}</td>
                                  <td>{{ $order->payment }}</td>
                                  <th>@currency($order->total)</th>
                                  <td>
                                     <div class="form-button-action">
                                        <a href="{{ route('order.cetak',[$order->invoice]) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                           <i class="fa fa-print"></i>
                                        </a>
                                     </div>
                                  </td>
                               </tr>
                               @endforeach
                            </tbody>
                         </table>
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