@extends('layouts.app')
@section('title','Manage Category')
@section('content')

<style>
   /* -- quantity box -- */

.quantity {
 display: inline-block; }

.quantity .input-text.qty {
 width: 50px;
 height: 35px;
 padding: 0 5px;
 text-align: center;
 background-color: transparent;
 border: 1px solid #efefef;
}

.quantity.buttons_added {
 text-align: left;
 position: relative;
 white-space: nowrap;
 vertical-align: top; }

.quantity.buttons_added input {
 display: inline-block;
 margin: 0;
 vertical-align: top;
 box-shadow: none;
}

.quantity.buttons_added .minus,
.quantity.buttons_added .plus {
 padding: 7px 10px 8px;
 height: 35px;
 background-color: #ffffff;
 border: 1px solid #efefef;
 cursor:pointer;}

.quantity.buttons_added .minus {
 border-right: 0; }

.quantity.buttons_added .plus {
 border-left: 0; }

.quantity.buttons_added .minus:hover,
.quantity.buttons_added .plus:hover {
 background: #eeeeee; }

.quantity input::-webkit-outer-spin-button,
.quantity input::-webkit-inner-spin-button {
 -webkit-appearance: none;
 -moz-appearance: none;
 margin: 0; }
 
 .quantity.buttons_added .minus:focus,
.quantity.buttons_added .plus:focus {
 outline: none; }


</style>

<div class="main-panel">
    <div class="container">
       <div class="page-inner">
          <div class="row">
             <div class="col-md-8">
                <div class="card">
                   <div class="card-header">
                     <div class="card-head-row">
                        <div class="card-title">DAFTAR MENU</div>
                        <div class="card-tools">
                           <div class="collapse" id="search-nav">
                                 <form action="order" method="GET" class="navbar-left navbar-form nav-search ml-md-3">
                                 <div class="input-group">
                                    <div class="input-group-prepend">
                                       <button type="submit" class="btn btn-search pr-1">
                                          <i class="fa fa-search search-icon"></i>
                                       </button>
                                    </div>
                                    <input type="text" name="search" placeholder="Search menu ..." class="form-control">
                                 </div>
                              {{ Form::close() }}
                           </div>
                        </div>
                    </div>
                   </div>
                   <div class="card-body">
                      <div class="row">
                        @foreach($products as $product)
                        <div class="col-md-4 col-6">
                            <div class="card">
                              <div class="p-2">
                                 <img class="card-img-top rounded" src="{{ asset('assets/img/product/'.$product->image) }}" alt="Product 1">
                              </div>
                              <div class="card-body pt-2">
                                 <h4 class="mb-1 fw-bold">{{ $product->name_product }}</h4>
                                 @if($product->discount != 0)
                                 <p class="text-muted small mb-2">@currency($product->price - $product->discount) <sup style="text-decoration: line-through;">@currency($product->price)</sup></p>
                                 @else
                                 <p class="text-muted small mb-2">@currency($product->price)</p>
                                 @endif
                                 <button type="button" data-id="{{ $product->id }}" class="btn btn-primary btn-sm btn-order" style="width: 100%;" data-toggle="modal" data-target="#exampleModal">Pesan</button>
                              </div>
                           </div>
                        </div>
                        @endforeach
                      </div>
                      
                   </div>
                </div>
             </div>
             <div class="col-md-4">
               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-md-6">
                           <h5 class="card-title">PESANAN</h5>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="card-list">
                     <?php 
                        $subtotal = 0; 
                        $diskon = 0; 
                        ?>
                     @foreach($carts as $cart)
                     <div class="item-list">
                        <div class="avatar">
                           <img src="https://freepikpsd.com/file/2019/10/ayam-goreng-png-1.png" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <div class="info-user ml-3">
                           <div class="username">{{ $cart->product->name_product }} ({{ $cart->qty }})</div>
                           <div class="status">@currency($cart->product->price)</div>
                        </div>
                        <button class="btn btn-icon btn-danger btn-round btn-xs delete-cart" data-id="{{ $cart->id }}">
                           <i class="fa fa-trash"></i>
                        </button>
                     </div>
                     @if($cart->product->discount != 0)
                     <div style="width: 160px;padding: 2px 13px;border-radius: 20px;box-shadow: 1px 1px 1px 1px #cacfd2;">
                        Diskon : @currency($cart->product->discount)
                     </div>
                     @endif
                     <?php 
                        $subtotal += $cart->product->price * $cart->qty;
                        $diskon += $cart->product->discount * $cart->qty;
                      ?>
                     @endforeach
                     <?php
                        $a = $subtotal - $diskon;
                        $pajak = $a / $tax->value; 
                        $jumlah = $a + $pajak;
                     ?>
                     <input type="hidden" id="total" value="{{ $jumlah }}">
                     </div>
                     <hr>
                     <div class="row">
                        <div class="col-md-6 col-6">
                           <h5>Subtotal</h5>
                        </div>
                        <div class="col-md-6 col-6 text-right">
                           <h5>@currency($subtotal)</h5>
                        </div>
                     </div>
                     <div class="row mt-2">
                        <div class="col-md-6 col-6">
                           <h5>Diskon</h5>
                        </div>
                        <div class="col-md-6 col-6 text-right">
                           <h5>@currency($diskon)</h5>
                        </div>
                     </div>
                     <div class="row mt-2">
                        <div class="col-md-6 col-6">
                           <h5>Pajak</h5>
                        </div>
                        <div class="col-md-6 col-6 text-right">
                           <h5>@currency($pajak)</h5>
                        </div>
                     </div>
                     <hr>
                     <div class="row">
                        <div class="col-md-6 col-6">
                           <h5>Total</h5>
                        </div>
                        <div class="col-md-6 col-6 text-right">
                           <h5>@currency($jumlah)</h5>
                        </div>
                     </div>
                 </div>
               </div>

               <div class="card">
                  <div class="card-header">
                     <div class="row">
                        <div class="col-md-12">
                           <h5 class="card-title">PEMBAYARAN</h5>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">

                     <div class="row">
                        <div class="col-md-12 col-12">
                           <div class="form-group">
                              <label for="">Nama pembeli</label>
                              <input type="text" class="form-control" id="customer" placeholder="Nama pembeli">
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-12 col-12">
                           <div class="form-group">
                              <label for="">Jenis pembayaran</label>
                              <div class="selectgroup w-100">
                                 <label class="selectgroup-item">
                                    <input type="radio" name="payment" value="tunai" class="selectgroup-input tunai" checked>
                                    <span class="selectgroup-button">TUNAI</span>
                                 </label>
                                 <label class="selectgroup-item">
                                    <input type="radio" name="payment" value="debit" class="selectgroup-input debit">
                                    <span class="selectgroup-button">DEBIT</span>
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>

                        <div class="tunai">
                           <div class="row">
                              <div class="col-md-12 col-12">
                                 <div class="form-group">
                                    <label for="">Uang sebanyak</label>
                                    <input type="text" class="form-control">
                                 </div>
                              </div>
                              <div class="col-md-12 col-12">
                                 <div class="form-group">
                                    <label for="">Kembalian</label>
                                    <input type="text" class="form-control" readonly>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="debit">
                           <div class="row">
                              <div class="col-md-12 col-12">
                                 <div class="form-group">
                                    <label for="">Pembayaran via</label>
                                    {{ Form::select('payment',$card, null, ['class'=>'form-control', 'id' => 'card']) }}
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                         
                     <div class="card-footer button-payment">
                        <button type="submit" class="btn btn-success payment" style="width: 100%"><i class="fas fa-shopping-cart"></i> Bayar sekarang</button>
                      </div>
                  </div> 
               </div>
            </div>
          </div>
       </div>
    </div>
 </div>
 </div>

 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Detail Product</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <div class="row">
            <div class="col-md-6">
               <img src="https://freepikpsd.com/file/2019/10/ayam-goreng-png-1.png" alt="..." class="avatar-img rounded-circle">
            </div>
            <div class="col-md-6">
               <input type="hidden" id="id-product">
               <h3 class="fw-bold" id="title-detail"></h3>
               <div style="padding: 0px 19px;">
                  <h5 class="mb-1 mt-4">Deskripsi : </h5>
                  <p class="text-muted small mb-2" id="title-description"></p>
                  
                  <h5 class="mb-1 mt-4">Qty : </h5>
                  <div class="quantity buttons_added">
                     <input type="button" value="-" class="minus">
                     <input type="text" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
                     <input type="button" value="+" class="plus">
                  </div>
               </div>
            </div>
         </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-primary btn-sm btn-add-cart">Tambah</button>
       </div>
     </div>
   </div>
 </div>

@endsection

@push('scripts')

<script>
   $(document).ready(function() {
  
  $(".btn-order").click(function() {
    var id = $(this).data('id'); 
    $.ajax({
        url: '{{ route('order.detail') }}',
        method: 'POST',
        cache: false,
        data: {
         "_token": "{{ csrf_token() }}",
         "id" :id
        },
        success: function(data){
         $("#id-product").val(data.id);
         $("#title-detail").html(data.name_product);
         $("#title-description").html(data.description);
        }
    });
  });

  $(".btn-add-cart").click(function() {
    var id = $("#id-product").val();
    var qty = $(".qty").val();
    $.ajax({
        url: '{{ route('cart.store') }}',
        method: 'POST',
        cache: false,
        data: {
         "_token": "{{ csrf_token() }}",
         "product_id" :id,
         "qty" : qty,
        },
        success: function(data){
         swal("Success", "Cart berhasil ditambah");
         location.reload();
        }
    });
  });

  $('.delete-cart').click(function(e) {
      var id = $(this).data('id'); 
      swal({
         title: 'Apakah kamu yakin ?',
         text: "Keranjang akan terhapus secara permanen !",
         type: 'warning',
         buttons:{
            confirm: {
               text : 'Ya, saya yakin!',
               className : 'btn btn-success'
            },
            cancel: {
               visible: true,
               className: 'btn btn-danger'
            }
         }
      }).then((Delete) => {
         if (Delete) {
            $.ajax({
               url: '{{ route('cart.delete') }}',
               method: 'post',
               cache: false,
               data: {
                  "_token": "{{ csrf_token() }}",
                  "id" :id
               },
               success: function(data){
                  swal("Success", "Cart berhasil dihapus");
                  location.reload();
               },
               error: function(data){
                  alert('Error');
               }
            });
         } else {
            swal.close();
         }
      });
   });
});


$(".debit").hide();
$(".tunai").show();
$(".button-payment").hide();

$(".tunai").click(function() {
   $(".debit").hide();
   $(".tunai").show();
   $(".button-payment").show();

   $(".payment").click(function() {

         var total  = $("#total").val();
         var payment = "tunai";
         var customer = $("#customer").val();

         $.ajax({
            url: '{{ route('order.store') }}',
            method: 'POST',
            cache: false,
            data: {
               "_token": "{{ csrf_token() }}",
               "card_id": null,
               "total" : total,
               "payment" : payment,
               "name_customer" : customer
            },
            success: function(data){
               $("#modalPayment").modal('toggle');
               window.open('order/'+data.invoice+'/cetak', '_blank');
               location.reload();
            },
            error: function(data){
               alert('Error');
            }
         });
      });
});

$(".debit").click(function() {
   $(".debit").show();
   $(".tunai").hide();
   $(".button-payment").show();

   $(".payment").click(function() {

      var total = $("#total").val();
      var card = $("#card").val();
      var payment = "debit";
      var customer = $("#customer").val();

      $.ajax({
         url: '{{ route('order.store') }}',
         method: 'POST',
         cache: false,
         data: {
            "_token": "{{ csrf_token() }}",
            "total" : total,
            "card_id" : card,
            "payment" : payment,
            "name_customer" : customer
         },
         success: function(data){
            $("#modalPayment").modal('toggle');
            window.open('order/'+data.invoice+'/cetak', '_blank');
            location.reload();
         }
      });
   });
});

</script>

<script>
   function wcqib_refresh_quantity_increments() {
    jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function(a, b) {
        var c = jQuery(b);
        c.addClass("buttons_added"), c.children().first().before('<input type="button" value="-" class="minus" />'), c.children().last().after('<input type="button" value="+" class="plus" />')
    })
   }
   String.prototype.getDecimals || (String.prototype.getDecimals = function() {
      var a = this,
         b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
      return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
   }), jQuery(document).ready(function() {
      wcqib_refresh_quantity_increments()
   }), jQuery(document).on("updated_wc_div", function() {
      wcqib_refresh_quantity_increments()
   }), jQuery(document).on("click", ".plus, .minus", function() {
      var a = jQuery(this).closest(".quantity").find(".qty"),
         b = parseFloat(a.val()),
         c = parseFloat(a.attr("max")),
         d = parseFloat(a.attr("min")),
         e = a.attr("step");
      b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d || (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), jQuery(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger("change")
   });
</script>

@endpush