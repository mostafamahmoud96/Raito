<header id="tt-header">
  <!-- tt-desktop-header -->
  <div class="tt-desktop-header top-bar row">

      <div class="col-8">
        <span class="user">
          @if(auth()->guard('customer')->user()){{auth()->guard('customer')->user()->name}}@endif
        </span>
      </div>


      <div class="col-4" style="text-align: left">


        <a href="{{route('customer.order.create')}}" class="logout">
          <i class="ft-plus"></i>
          New Order
        </a>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;



        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <a href="{{route('customer.logout')}}" class="logout">
          <i class="ft-power"></i>
          Logout
        </a>
      </div>



    </div>

</header>
