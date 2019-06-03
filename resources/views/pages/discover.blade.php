@extends('layouts.app')

@section('header')
   <div class="header-image"  style="background-image: url('/storage/header_images/home-bg-2.jpg');">
      <div class="overlay"></div>
      <div class="container">
         <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
               <div class="site-heading">
                    <a class="h1">Discover Categories</a>
                    <span>
                        <p>Discover all the available Categories and subscribe onto them.</p>
                    </span>
                  @include('inc.messages')

                  <div class="site-heading-buttons mt-4">
                     @guest
                        <a href="/login" class="col-md-2 btn btn-primary mr-3">Sign In <i class="fa fa-sign-in"></i></a>
                        <a href="/register" class="col-md-2 btn btn-success">Sign Up <i class="fa fa-user-plus"></i></a>
                     @endguest
                  </div>
               </div>
            </div>
         </div>
         
      </div>
   </div>
@endsection

@section('content')
   <div class="row justify-content-center">
      <div class="col-md-8 col-sm-12 " >
         <ul class="list-unstyled">
            @if(count($categories) > 0)
                @foreach ($categories as $category)
                
                <div class="card shadow border bg-light p-3 mb-3 category">
                  <div class="col">
                     <div class="media-heading row">
                        <a class="h4" id="cat_name">{{$category->display_name}}</a>
                        <span class="ml-auto" data-categoryid="{{ $category->id }}">
                           <button name="subscribed" type="button" id="btnSubscribe{{$category->id}}" class="btnSubscribe btn btn-primary text-light">{{Auth::user()->categorySubscriptions()->where('category_id', $category->id)->first() ? Auth::user()->categorySubscriptions()->where('category_id', $category->id)->first()->subscribed == 1 ? 'Unsubscribe' : 'Subscribe' : 'Subscribe' }}</button>
                           {{-- <button name="unsubscribed" type="button" id="btnUnsubscribe{{$category->id}}" class="btnUnsubscribe btn btn-info text-light">Unsubscribe <i class="fa fa-times"></i></button> --}}
                        </span>
                     </div>
                     <div class="media-body row mt-3">
                           <p>{{$category->description}}</p>
                     </div>
                  </div>
                </div>
            @endforeach 

                  {{-- <span class="row justify-content-center"> {{$posts->links()}} </span> --}}
               @else
                  <div class="card">
                     <div class="card-header">
                        <p class="h5 m-0 text-center">
                           <i class="fa fa-exclamation-circle text-danger"></i> Oops!
                        </p>
                     </div>
                     <div class="card-body">
                        <p class="text-center">
                           No Categories have been found.
                        </p>  
                     </div>
                  </div> 
               @endif
         </ul>
      </div>
    
      
      <div class="col-md-3 card shadow">
            @include('inc.sidebar-right')
      </div>
   
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
      
      var category_id = 0;
      var token = '{{ Session::token() }}';
      var urlSubscribe = '{{ route('discover.category.subscribe') }}';
      var urlUnsubscribe = 'discover/category/unsubscribe/{{$category->id}}';
      var btnUnsubscribe =  $('.category').find('.row').find('button.btnUnsubscribe');
      var btnSubscribe =  $('.category').find('.row').find('button.btnSubscribe');
    
        $('.category').find('.row').find('button.btnSubscribe').on('click', function(event) {
           event.preventDefault();
            //save this to var
            var thisContext = $(this);
            category_id = event.target.parentNode.dataset['categoryid'];
            var isSubscribe = event.target.previousElementSibling == null;
            console.log(category_id, isSubscribe, thisContext);

            if(thisContext.hasClass('btn-success')){
               $(this).removeClass('btn-success');
            }
            thisContext.addClass('btn-info').html('wait <i class="fa fa-sync fa-spin"></i>');
            
            $.ajax({
               method: 'POST',
               url: urlSubscribe,
               data: {subscribed: isSubscribe, category_id: category_id, _token: token}, 
               success: function(result) {   
                  thisContext.removeClass('btn-info').addClass('btn-success').html('Success <i class="fa fa-check"></i>');
                  setTimeout(function() {
                     thisContext.removeClass('btn-success').addClass('btn-info').html('Unubscribe <i class="fa fa-times"></i>'); 
                  }, 1000); 
                  console.debug(result);  
               },
               error: function(error) {
                  console.log(error);
                  thisContext.removeClass('btn-info').addClass('btn-danger').html('Failed <i class="fa fa-exclamation"></i>');
                  setTimeout(function() {
                     thisContext.removeClass('btn-danger').addClass('btn-primary').html('Subscribe <i class="fa fa-rss"></i>');
                  }, 1000);
               }
            });
            // done(function() {
            //    event.target.innerHTML = isSubscribe ? event.target.innerHTML == 'Subscribe' ? addClass('ben-success')'Subscribed! <i class="fa fa-check"></i>'
            // });
         });

         // $('.category').find('.row').find('button.btnUnsubscribe').on('click', function(event) {
         //    //event.preventDefault();
         //    //save this to var
         //    var thisContext = $(this);
         //    category_id = event.target.parentNode.dataset['categoryid'];
         //    var category_name = $('#cat_name').text();
         //    var isSubscribe = event.target.previousElementSibling == null;
         //    console.log(category_id, isSubscribe, category_name);

         //    var confirmDel = confirm('Are you sure you want to unsubscribe from '+'\"'+category_name+'\"'+' category? \n You\'ll no longer receive updates from them! ');

         //    if (confirmDel == true) {
         //       if(thisContext.hasClass('btn-success')){
         //          $(this).removeClass('btn-success');
         //       }
         //       thisContext.addClass('btn-info').html('wait <i class="fa fa-sync fa-spin"></i>');

         //       $.ajax({
         //          method: 'DELETE',
         //          url: urlUnsubscribe,
         //          data: {subscribed: isSubscribe, category_id: category_id, _token: token}, 
         //          success: function(result) {      
         //             thisContext.removeClass('btn-info').addClass('btn-warning').html('Unsubscribed <i class="fa fa-check"></i>'); 
         //             setTimeout(function() {
         //                thisContext.hide()//removeClass('btn-warning').addClass('btn-primary').html('Subscribe <i class="fa fa-rss"></i>');
         //                btnSubscribe.show();
         //             }, 1000);
         //          },
         //          error: function(error) {
         //             thisContext.removeClass('btn-info').addClass('btn-danger').html('Failed <i class="fa fa-exclamation"></i>');
         //             setTimeout(function() {
         //                thisContext.removeClass('btn-danger').addClass('btn-info').html('Unsubscribe <i class="fa fa-rss"></i>');
         //             }, 1000);   
         //             console.debug(error);  
         //          }
         //       });
         //    }
            
         //    //console.debug($.ajax());        
         // });
   });
</script>
@endsection