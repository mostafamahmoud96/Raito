<!-- Loading Modal -->
<div class="modal fade text-left" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="myModalProviderel35"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top: 180px;">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center">
                <div class="col-md-12" id="saving">
                    <img src="{{ asset('images/loading-icon.gif') }}" style="width: 72px;margin:42px">
                </div>

                <div class="col-md-12" id="succSaved" style="display:none">
                    <img src="{{ asset('images/saved.png') }}" style="width: 75px;margin:20px">
                    <br />
                    <span style="font-weight:bold;font-size:17px" id="savedMsg">Successfully Saved </span>
                </div>


            </div>
        </div>
    </div>
</div>
<!------------------->
<!-- Error Modal -->
<div class="modal fade text-left" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="myModalProviderel35"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top: 180px;">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center">
                <div class="col-md-12" id="errReq">
                    <img src="{{ asset('images/error-flat.png') }}" style="width: 72px;margin:20px">
                    <br />
                    <span style="font-weight:bold;font-size:17px" id="errMsg">Err</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------->


@if(Request::segment(1) == 'admin' && Request::segment(2) == 'orders')

<!-- Modal order info -->
<div class="modal animated zoomIn text-left modal-order-info" id="order-info" tabindex="-1" role="dialog"
    aria-labelledby="myModalProviderel69" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="o-modal-orderNu">#233454</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6 mb-1">
                        <div class="-webkit-inline-box">
                            <img src="{{ asset('app-assets/images/icons/Artboard – 6.png')}}">
                            <h3>Technician Name</h3>
                        </div>
                        <p id="o-modal-techname">
                            tName
                        </p>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-6 mb-1">
                        <h3>Date of submission </h3>
                        <p id="o-modal-submissiondate">01/01/2018</p>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-6 mb-1">
                        <div class="-webkit-inline-box">
                            <img src="{{ asset('app-assets/images/icons/Artboard – 4.png')}}">
                            <h3>Customer name</h3>
                        </div>
                        <p id="o-modal-customername">Ahmed Al Ahmed</p>
                        <p class="text-underline">&nbsp;</p>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-6 mb-1">
                        <h3>Provider Name </h3>
                        <p id="o-modal-labname">Provider Name</p>
                    </div>

                    <div class="col-xs-12 col-md-12 col-lg-12 mb-1">
                        <button class="view-chat">View Chat History</button>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6 mb-1">
                        <div class="-webkit-inline-box">
                            <img src="{{ asset('app-assets/images/icons/Artboard – 5.png')}}">
                            <h3>Location</h3>
                        </div>
                        <p class="line-height-2" id="o-modal-location">21, Alex Davidson Avenue, Opposite Omegatron,
                            Vicent Smith
                            Quarters, Victoria Island, Lagos, Nigeria</p>
                        <p class="pl-2">Request Provider for pickup*</p>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-6 mb-1">
                        <h3>Due date</h3>
                        <p id="o-modal-duedate">01/01/2018</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-6 mb-1">
                        <div class="-webkit-inline-box">
                            <h3>Estimated invoice</h3>
                        </div>
                        <p class="text-large" id="o-modal-estinvoice">800 <span>SAR</span></p>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-6 mb-1">
                        <h3>Date of invoice </h3>
                        <p id="o-modal-dateinvoice">01/01/2018</p>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-6 mb-1">
                        <div class="-webkit-inline-box">
                            <h3>Provider on click payment </h3>
                        </div>
                        <p class="text-large" id="o-modal-locpayment">100 <span>SAR</span></p>
                    </div>
                </div>
                <hr>
                <div class="row footer-modal">
                    <div class="col-12">
                        <button class="change-status">Move To</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="modal-chat hide">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section class="chat-app-window chat-application">
                    <div class="scrollbar">
                        <div class="overflow">
                            <div class="chats">
                                <div class="chats">
                                    <div class="chat">
                                        <div class="chat-body">
                                            <div class="chat-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer
                                                </p>
                                                <h6>01-12-2019</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat chat-left">
                                        <div class="chat-body">
                                            <div class="chat-content">
                                                <img src="{{ asset('app-assets/images/chat.png')}}">
                                                <h6>01-12-2019</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat">
                                        <div class="chat-body">
                                            <div class="chat-content">
                                                <p>HLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                    nonummy
                                                </p>
                                                <h6>01-12-2019</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat chat-left">
                                        <div class="chat-body">
                                            <div class="chat-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer
                                                </p>
                                                <h6>01-12-2019</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat">
                                        <div class="chat-body">
                                            <div class="chat-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer
                                                </p>
                                                <h6>01-12-2019</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat chat-left">
                                        <div class="chat-body">
                                            <div class="chat-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer
                                                </p>
                                                <h6>01-12-2019</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat">
                                        <div class="chat-body">
                                            <div class="chat-content">
                                                <p>HLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                    nonummy
                                                </p>
                                                <h6>01-12-2019</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat chat-left">
                                        <div class="chat-body">
                                            <div class="chat-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer
                                                </p>
                                                <h6>01-12-2019</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat">
                                        <div class="chat-body">
                                            <div class="chat-content">
                                                <p>Lorem ipsum dolor sit amet, consectetuer
                                                </p>
                                                <h6>01-12-2019</h6>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </section>
            </div>

        </div>
    </div>
    <div class="modal-change-status hide" id="modal-change-status">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Received by provider</h3>
            </div>
            <div class="modal-body">
                <ul>
                    <li>
                        <a href="" id="o-modal-on-recived-st">Recived By Provider</a>
                    </li>
                    <li>
                        <a href="" id="o-modal-on-prossess-st">On Process</a>
                    </li>
                    <li>
                        <a href="" id="o-modal-on-completed-st">Complated</a>
                    </li>
                    <li>
                        <a href="" id="o-modal-on-deliverd-st">Deliverd</a>
                    </li>
                    <li>
                        <a href="" id="o-modal-on-approved-st">Approved</a>
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <a href="" id="o-modal-to-prev-st">Back To The previous status</a>
            </div>

        </div>
    </div>
</div>

<!-- Modal sort customer-->
<div class="modal animated zoomIn text-left" id="sort-destist" tabindex="-1" role="dialog"
    aria-labelledby="myModalProviderel69" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Customer Name</h5>
                <div class="row skin skin-square">
                    <div class="col-md-6 col-sm-12">
                        @if(!empty($customers))
                        @php
                        $arr_saved_customers = [];
                        if(app('request')->input('d') != null)
                        $arr_saved_customers = explode(',', app('request')->input('d') );
                        @endphp

                        @foreach ($customers as $customer)
                        @php
                        $is_checked = "" ;
                        if(in_array($customer->id,$arr_saved_customers)) $is_checked = "checked" ;
                        @endphp
                        <fieldset>
                            <input type="checkbox" id="{{$customer->id}}" value="{{$customer->id}}" name="filter-customers"
                                {{$is_checked}}>
                            <label for="{{$customer->id}}">{{$customer->full_name}}</label>
                        </fieldset>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn order-sort-filter-btn">Show Result</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal filter provider -->
<div class="modal animated zoomIn text-left" id="sort-provider" tabindex="-1" role="dialog" aria-labelledby="myModalProviderel69"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Provider Name</h5>
                <div class="row skin skin-square">
                    <div class="col-md-6 col-sm-12">
                        @if(!empty($providers))
                        @php
                        $arr_saved_labs = [];
                        if(app('request')->input('l') != null)
                        $arr_saved_labs = explode(',', app('request')->input('l') );
                        @endphp

                        @foreach ($providers as $provider)
                        @php
                        $is_checked = "" ;
                        if(in_array($provider->id,$arr_saved_labs)) $is_checked = "checked" ;
                        @endphp
                        <fieldset>
                            <input type="checkbox" id="provider{{$provider->id}}" value="{{$provider->id}}" name="filter-providers"
                                {{$is_checked}}>
                            <label for="provider{{$provider->id}}">{{$provider->lab_name}}</label>
                        </fieldset>
                        @endforeach
                        @endif
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn order-sort-filter-btn">Show Result</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal sort -->
<div class="modal animated zoomIn text-left" id="sort-by" tabindex="-1" role="dialog" aria-labelledby="myModalProviderel69"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Sort By</h5>
                <div class="row skin skin-square">
                    <div class="col-md-6 col-sm-12">
                        <fieldset>
                            @php
                            if(app('request')->input('s') != null && app('request')->input('s') == "newset")
                            $arr_saved_customers = explode(',', app('request')->input('d') ) ;
                            @endphp

                            <input type="radio" name="sort_by" id="newset" value="newset" @if(app('request')->input('s')
                            != null && app('request')->input('s') == "newset")checked @endif>
                            <label for="newset">Newest</label>
                        </fieldset>
                        <fieldset>
                            <input type="radio" name="sort_by" id="oldest" value="oldest" @if(app('request')->input('s')
                            != null && app('request')->input('s') == "oldest")checked @endif>
                            <label for="oldest">Oldest</label>
                        </fieldset>
                        <fieldset>
                            <input type="radio" name="sort_by" id="highest" value="highest"
                                @if(app('request')->input('s')
                            != null && app('request')->input('s') == "highest")checked @endif>
                            <label for="highest">Highest Price</label>
                        </fieldset>
                        <fieldset>
                            <input type="radio" name="sort_by" id="lowest" value="lowest" @if(app('request')->input('s')
                            != null && app('request')->input('s') == "lowest")checked @endif>
                            <label for="lowest">Lowest Price</label>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn order-sort-filter-btn" id="order-sort-btn">Show Result</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Date -->
<div class="modal animated zoomIn text-left modal-date1" id="date" tabindex="-1" role="dialog"
    aria-labelledby="myModalProviderel69" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <input type="text" id="filter-date">
                        <div class="two-calendars"></div>
                        <div class="group-btns">
                            <button style="cursor:pointer">Clear</button>
                            <button class="f-right" style="cursor:pointer">Apply</button>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- Modal notifaction center -->
<div class="modal animated zoomIn text-left modal-notify-center" id="zoomIn" tabindex="-1" role="dialog"
    aria-labelledby="myModalProviderel69" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalProviderel69">Notifaction Center</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="scrollbar">
                    <section id="timeline" class="overflow timeline-outer">
                        <div class="container" id="content">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <ul class="timeline">
                                        <li class="event" data-date="May 2 20:30am">
                                            <h3>Order Number</h3>
                                            <p>
                                                This September 2015 I will begin an MSc in Management and
                                                Entrepreneurship at University of Sussex, to broaden my knowledge
                                                and gain skills necessary for my future in business and management.
                                            </p>
                                            <small>#455555</small>
                                        </li>
                                        <li class="event" data-date="May 2 20:30am">
                                            <h3>Order Number</h3>
                                            <p>
                                                This September 2015 I will begin an MSc in Management and
                                                Entrepreneurship at University of Sussex, to broaden my knowledge
                                                and gain skills necessary for my future in business and management.
                                            </p>
                                            <small>#455555</small>
                                        </li>
                                        <li class="event" data-date="May 2 20:30am">
                                            <h3>Order Number</h3>
                                            <p>
                                                This September 2015 I will begin an MSc in Management and
                                                Entrepreneurship at University of Sussex, to broaden my knowledge
                                                and gain skills necessary for my future in business and management.
                                            </p>
                                            <small>#455555</small>
                                        </li>
                                        <li class="event" data-date="May 2 20:30am">
                                            <h3>Order Number</h3>
                                            <p>
                                                This September 2015 I will begin an MSc in Management and
                                                Entrepreneurship at University of Sussex, to broaden my knowledge
                                                and gain skills necessary for my future in business and management.
                                            </p>
                                            <small>#455555</small>
                                        </li>
                                        <li class="event" data-date="May 2 20:30am">
                                            <h3>Order Number</h3>
                                            <p>
                                                This September 2015 I will begin an MSc in Management and
                                                Entrepreneurship at University of Sussex, to broaden my knowledge
                                                and gain skills necessary for my future in business and management.
                                            </p>
                                            <small>#455555</small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>

            </div>

        </div>
    </div>
</div>
@endif



@if(Request::segment(1) == 'admin' && Request::segment(2) == 'customers')
<!-- Modal Filter customers -->
<div class="modal animated zoomIn text-left" id="sort-destist" tabindex="-1" role="dialog"
    aria-labelledby="myModalProviderel69" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Customer Name</h5>
                <div class="row skin skin-square">
                    <div class="col-md-6 col-sm-12">

                        @if(!empty($all_customers))
                        @php
                        $arr_saved_customers = [];
                        if(app('request')->input('d') != null)
                        $arr_saved_customers = explode(',', app('request')->input('d') );
                        @endphp

                        @foreach ($all_customers as $customer)
                        @php
                        $is_checked = "" ;
                        if(in_array($customer->id,$arr_saved_customers)) $is_checked = "checked" ;
                        @endphp
                        <fieldset>
                            <input type="checkbox" id="{{$customer->id}}" value="{{$customer->id}}" name="filter-customers"
                                {{$is_checked}}>
                            <label for="{{$customer->id}}">{{$customer->full_name}}</label>
                        </fieldset>
                        @endforeach
                        @endif
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn order-sort-filter-btn">Show Result</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal sort by -->
<div class="modal animated zoomIn text-left" id="sort-by" tabindex="-1" role="dialog" aria-labelledby="myModalProviderel69"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Sort By</h5>
                <div class="row">
                    <div class="col-md-12 col-sm-12">

                        <label class="radio-container">Newest
                            <input type="radio" name="sort_by" id="newset" value="newset" @if(app('request')->input('s')
                            != null && app('request')->input('s') == "newset")checked @endif>
                            <span class="checkmark"></span>
                        </label>
                        <label class="radio-container">Oldest
                            <input type="radio" name="sort_by" id="oldest" value="oldest" @if(app('request')->input('s')
                            != null && app('request')->input('s') == "oldest")checked @endif>
                            <span class="checkmark"></span>
                        </label>
                        <label class="radio-container">Highest price
                            <input type="radio" name="sort_by" id="highest" value="highest"
                                @if(app('request')->input('s')
                            != null && app('request')->input('s') == "highest")checked @endif>
                            <span class="checkmark"></span>
                        </label>
                        <label class="radio-container">Lowest price
                            <input type="radio" name="sort_by" id="lowest" value="lowest" @if(app('request')->input('s')
                            != null && app('request')->input('s') == "lowest")checked @endif>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn order-sort-filter-btn" data-toggle="modal" data-target="#">Show
                    Result</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal add new customer -->
<div class="modal animated zoomIn" id="add-new-customer" tabindex="-1" role="dialog" aria-labelledby="myModalProviderel69"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h2>Adding New Customer</h2>
                <form method="POST" action='{{ route("admin.customers.add") }}'>
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <label for="fname">First Name</label>
                        </div>
                        <div class="col-7">
                            <fieldset class="form-group">
                                <input type="text" class="form-control" id="fname" name="first_name" value="{{old('first_name')}}">
                                <!-- <p class="text-left"><small class="text-muted">error</small></p> -->
                            </fieldset>

                        </div>
                        <div class="col-3">
                            <label for="lname">Last Name</label>
                        </div>
                        <div class="col-7">
                            <fieldset class="form-group mb-3">
                                <input type="text" class="form-control" id="lname" name="last_name" value="{{old('last_name')}}">
                                <!-- <p class="text-left"><small class="text-muted">error</small></p> -->
                            </fieldset>
                        </div>
                        <br>
                        <div class="col-3">
                            <label for="Phone">Phone N.</label>
                        </div>
                        <div class="col-7">
                            <fieldset class="form-group">
                                <input type="text" class="form-control" id="Phone" name="mobile" value="{{old('mobile')}}">
                                <!-- <p class="text-left"><small class="text-muted">error</small></p> -->
                            </fieldset>
                        </div>
                        <div class="col-3">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-7">
                            <fieldset class="form-group">
                                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                                <!-- <p class="text-left"><small class="text-muted">error</small></p> -->
                            </fieldset>
                        </div>
                        <div class="col-12 text-center">
                            <button type="button" class="btn btn-discard" data-dismiss="modal"
                                aria-label="Close">Discard</button>
                            <button type="submit" class="btn btn-save">Save</button>
                        </div>
                    </div>
                </form>


            </div>


        </div>

    </div>
</div>

<!-- Modal customer info -->
<div class="modal animated zoomIn" id="customer-name" tabindex="-1" role="dialog" aria-labelledby="myModalProviderel69"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h2 id="full_name">Dr.Muhamed Al Ahmed</h2>

                <form method="POST" action='{{ route("admin.customers.update") }}'>
                    @csrf
                    <input type="hidden" class="form-control" id="customer_id" name="id">
                    <div class="row">
                        <div class="col-md-7 col-12">
                            <div class="row">
                                <div class="col-3">
                                    <label for="fname">First Name</label>
                                </div>
                                <div class="col-9">
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" id="fname" name="first_name">
                                        <!-- <p class="text-left"><small class="text-muted">error</small></p> -->
                                    </fieldset>

                                </div>
                                <div class="col-3">
                                    <label for="lname">Last Name</label>
                                </div>
                                <div class="col-9">
                                    <fieldset class="form-group mb-4">
                                        <input type="text" class="form-control" id="lname" name="last_name">
                                        <!-- <p class="text-left"><small class="text-muted">error</small></p> -->
                                    </fieldset>
                                </div>
                                <br>
                                <div class="col-3">
                                    <label for="Phone">Phone N.</label>
                                </div>
                                <div class="col-9">
                                    <fieldset class="form-group">
                                        <input type="text" class="form-control" id="Phone" name="mobile">
                                        <!-- <p class="text-left"><small class="text-muted">error</small></p> -->
                                    </fieldset>
                                </div>
                                <div class="col-3">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-9">
                                    <fieldset class="form-group">
                                        <input type="email" class="form-control" id="email" name="email">
                                        <!-- <p class="text-left"><small class="text-muted">error</small></p> -->
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-12">
                            <div class="summary-table">
                                <div>
                                    <h3>Total Amount</h3>
                                    <p id="totamount">23.300<span>SAR</span></p>
                                </div>
                                <div>
                                    <h3>Transactions</h3>
                                    <p id="tottrans">32<span></span></p>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-discard" data-dismiss="modal"
                                        aria-label="Close">Discard</button>
                                    <button type="submit" class="btn btn-save">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


            </div>


        </div>

    </div>
</div>

@endif


@if(Request::segment(1) == 'admin' && Request::segment(2) == 'providers')

<!-- Modal Filter providers -->
<div class="modal animated zoomIn text-left" id="sort-destist" tabindex="-1" role="dialog"
    aria-labelledby="myModalProviderel69" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Provider Name</h5>
                <div class="row skin skin-square">
                    <div class="col-md-6 col-sm-12">
                        @if(!empty($all_labs))
                        @php
                        $arr_saved_labs = [];
                        if(app('request')->input('l') != null)
                        $arr_saved_labs = explode(',', app('request')->input('l') );
                        @endphp

                        @foreach ($all_labs as $provider)
                        @php
                        $is_checked = "" ;
                        if(in_array($provider->id,$arr_saved_labs)) $is_checked = "checked" ;
                        @endphp
                        <fieldset>
                            <input type="checkbox" id="{{$provider->id}}" value="{{$provider->id}}" name="filter-providers"
                                {{$is_checked}}>
                            <label for="{{$provider->id}}">{{$provider->name}}</label>
                        </fieldset>
                        @endforeach
                        @endif

                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn order-sort-filter-btn">Show Result</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal sort by -->
<div class="modal animated zoomIn text-left" id="sort-by" tabindex="-1" role="dialog" aria-labelledby="myModalProviderel69"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Sort By</h5>
                <div class="row">
                    <div class="col-md-12 col-sm-12">

                        <label class="radio-container">Newest
                            <input type="radio" name="sort_by" id="newset" value="newset" @if(app('request')->input('s')
                            != null && app('request')->input('s') == "newset")checked @endif>
                            <span class="checkmark"></span>
                        </label>
                        <label class="radio-container">Oldest
                            <input type="radio" name="sort_by" id="oldest" value="oldest" @if(app('request')->input('s')
                            != null && app('request')->input('s') == "oldest")checked @endif>
                            <span class="checkmark"></span>
                        </label>
                        <label class="radio-container">Highest price
                            <input type="radio" name="sort_by" id="highest" value="highest"
                                @if(app('request')->input('s')
                            != null && app('request')->input('s') == "highest")checked @endif>
                            <span class="checkmark"></span>
                        </label>
                        <label class="radio-container">Lowest price
                            <input type="radio" name="sort_by" id="lowest" value="lowest" @if(app('request')->input('s')
                            != null && app('request')->input('s') == "lowest")checked @endif>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn order-sort-filter-btn" data-toggle="modal" data-target="#">Show
                    Result</button>
            </div>
        </div>
    </div>
</div>

@endif


@if(Request::segment(1) == 'admin' && Request::segment(2) == 'settings' && Request::segment(3) == 'account')
<!-- Modal change phone -->
<div class="modal animated zoomIn text-center" id="edit-phone" tabindex="-1" role="dialog"
    aria-labelledby="myModalProviderel69" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body card-change">
                <h3>Change Your Phone Number</h3>
                <p class="mob-type">We'll send a code to this phone number</p>
                <div class="row">

                    <div class="col-3 mob-type">
                        <label for="phone">Phone N.</label>
                    </div>
                    <div class="col-9 mob-type">
                        <fieldset class="form-group">
                            <input type="text" class="form-control" id="phone">
                            <small class="text-muted mob-type" id="mob-not-valid" style="display:none"></small>
                        </fieldset>
                    </div>
                    <div class="col-12 mob-type">
                        <button aria-label="Close" type="button" id="send-code11"
                            class="btn btn-secondary btn-block btn-add-tech send-code">
                            Send Code
                        </button>
                    </div>

                    <div class="col-md-12" id="code-loading">
                        <img src="{{ asset('images/loading-icon.gif') }}" style="width: 35px;margin:0px">
                    </div>


                    <div class="col-md-12" id="code-success">
                        <img src="{{ asset('images/saved.png') }}" style="width: 35px;margin:20px 0">
                    </div>


                    <div class="col-4 code-type">
                        <label for="phone">Verification Code</label>
                    </div>
                    <div class="col-5 code-type">
                        <fieldset class="form-group">
                            <input type="text" class="form-control" id="vcode">
                            <small class="text-muted code-type" id="code-not-valid" style="display:block"></small>
                        </fieldset>
                    </div>
                    <div class="col-12 text-center mt-2 code-type">
                        <a href="" id="resend-code" class="send-code">Resend code?</a>
                    </div>
                    <div class="col-12 code-type">
                        <button aria-label="Close" type="button" id="verfiy-code"
                            class="btn btn-secondary btn-block btn-add-tech">
                            Vertify
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endif



@if(Request::segment(1) == 'admin' && Request::segment(2) == 'settings' && Request::segment(3) == 'admins')
<!-- Modal update admin -->
<div class="modal animated zoomIn text-center edit-promo" id="edit-tech" tabindex="-1" role="dialog"
    aria-labelledby="myModalProviderel69" aria-hidden="true">
    <div class="modal-dialog update-admin" role="document">
        <div class="modal-content">
            <div class="modal-body add-tech">
                <h5>Edit Admin</h5>

                <form method="POST" action='{{ route("admin.settings.updateAdmin") }}'>
                    @csrf
                    <div class="row">
                        <input type="hidden" class="form-control" id="admin_id" name="id">
                        <div class="col-3">
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="col-9">
                            <fieldset class="form-group">
                                <input type="text" class="form-control" id="first_name" name="first_name">
                            </fieldset>
                        </div>

                        <div class="col-3">
                            <label for="last_name">Last Name</label>
                        </div>
                        <div class="col-9">
                            <fieldset class="form-group">
                                <input type="text" class="form-control" id="last_name" name="last_name">
                            </fieldset>
                        </div>

                        <div class="col-3">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-9 mb-1">
                            <fieldset class="form-group">
                                <input type="email" class="form-control" id="email" name="email">
                                <!-- <p class="text-left"><small class="text-muted">error</small></p> -->
                            </fieldset>
                        </div>


                        <div class="col-3">
                            <label for="phone">Phone N.</label>
                        </div>
                        <div class="col-9">
                            <fieldset class="form-group">
                                <input type="text" class="form-control" id="mobile" name="mobile">
                            </fieldset>
                        </div>
                        <div class="col-3">
                            <label for="permission">Profile Permissions</label>
                        </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col-4 d-flex">
                                    <input class="styled-checkbox" id="styled-checkbox-e-super" type="radio"
                                        value="super" name="type">
                                    <label for="styled-checkbox-e-super"></label>
                                    <label class="text-small" for="styled-checkbox-e-super">Super admin</label>
                                </div>
                                <div class="col-4 d-flex">
                                    <input class="styled-checkbox" id="styled-checkbox-e-acc" type="radio" value="acc"
                                        name="type">
                                    <label for="styled-checkbox-e-acc"></label>
                                    <label class="text-small" for="styled-checkbox-e-acc">Accounting admin</label>
                                </div>
                                <div class="col-4 d-flex">
                                    <input class="styled-checkbox" id="styled-checkbox-e-cr" type="radio" value="cr"
                                        name="type">
                                    <label for="styled-checkbox-e-cr"></label>
                                    <label class="text-small" for="styled-checkbox-e-cr">Customer Relationship
                                        admin</label>
                                </div>

                            </div>

                        </div>
                        <div class="col-12">
                            <button type="button" class="btn btn-white" data-dismiss="modal"
                                aria-label="Close">Cancel</button>
                            <button type="submit" class="btn btn-secondary">Update</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal remove admin  -->
<div class="modal remove-promo animated zoomIn text-center" id="remove-tech" tabindex="-1" role="dialog"
    aria-labelledby="myModalProviderel69" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Are you sure you want to remove </h5>
                <form method="POST" action='{{ route("admin.settings.deleteAdmin") }}'>
                    @csrf
                    <div class="row">
                        <input type="hidden" class="form-control" id="de_tech_id" name="id">
                        <div class="col-12">
                            <p id="del_tech_name">Mohamed Ahmed ?</p>
                        </div>
                        <div class="col-12">
                            <button type="button" class="btn btn-white" data-dismiss="modal"
                                aria-label="Close">Cancel</button>
                            <button type="submit" class="btn btn-secondary">Remove</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endif



@if(Request::segment(1) == 'admin' && Request::segment(2) == 'settings' && Request::segment(3) == 'promo_code')

<!-- Modal edit promo -->
@if(!empty($promo_codes))
@foreach ($promo_codes as $promo_code)
<!-- Modal edit promo -->
<div class="modal animated zoomIn text-center edit-promo" id="edit-promo-{{$promo_code->id}}" tabindex="-1"
    role="dialog" aria-labelledby="myModalProviderel69" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body add-tech">
                <h5>Edit promo code</h5>

                <form method="POST" action='{{ route("admin.settings.updatePromoCode") }}'>
                    @csrf
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$promo_code->id}}">
                    <div class="row">
                        <div class="col-3">
                            <label for="code">Code</label>
                        </div>
                        <div class="col-9">
                            <fieldset class="form-group">
                                <input type="text" class="form-control" id="code" name="code"
                                    value="{{$promo_code->code}}">
                            </fieldset>
                        </div>

                        <div class="col-3">
                            <label for="discount">Discount</label>
                        </div>
                        <div class="col-9">
                            <fieldset class="form-group">
                                <input type="text" class="form-control" id="discount" name="discount"
                                    value="{{$promo_code->discount}}">
                            </fieldset>
                        </div>
                        <div class="col-3">
                            <label for="exp">Exp.</label>
                        </div>
                        <div class="col-9">
                            <fieldset class="form-group">
                                <input type="text" class="form-control pickadate-exp" id="exp_date" name="exp_date"
                                    value="{{$promo_code->exp_date}}" data-value="{{$promo_code->exp_date}}">
                            </fieldset>
                        </div>

                        <div class="col-3">
                            <label for="customers" class="target-select-edit edt-customers"
                                style="display:none">Customers</label>
                            <label for="providers" class="target-select-edit edt-providers" style="display:none">Providers</label>
                        </div>
                        <div class="col-9">
                            <div class="target-select-edit edt-customers" style="display:none">
                                <select name="customers[]" data-placeholder="Choose Customers" multiple
                                    class="chosen-select edit-promo-customers">
                                    @if(!empty($customers))
                                    @foreach ($customers as $customer)
                                    <option value="{{$customer->id}}" @if(in_array($customer->
                                        id,$promo_code->promoCodeCustomers()->pluck('customer_id')->toArray()))
                                        selected
                                        @endif>
                                        {{$customer->full_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <p class="text-right help" style="left: 0em;text-align:right">
                                    <small class="text-muted select-all-edt-customers"
                                        style="margin:-14px 3px 0;float: right;text-align: right">Select
                                        all</small>
                                    <small class="text-muted deselect-all-edt-customers"
                                        style="margin:0 3px;float: right;text-align: right">Deselect
                                        all</small>
                                </p>
                            </div>
                            <div class="target-select-edit edt-providers" style="display:none">
                                <select name="providers[]" data-placeholder="Choose Providers" multiple
                                    class="chosen-select edit-promo-providers">
                                    @if(!empty($providers))
                                    @foreach ($providers as $provider)
                                    <option value="{{$provider->id}}" @if(in_array($provider->
                                        id,$promo_code->promoCodeProviders()->pluck('lab_id')->toArray()))
                                        selected
                                        @endif>
                                        {{$provider->lab_name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <p class="text-right help" style="left: 0em;text-align:right">
                                    <small class="text-muted select-all-edt-providers"
                                        style="margin:-14px 3px 0;float: right;text-align: right">Select
                                        all</small>
                                    <small class="text-muted deselect-all-edt-providers"
                                        style="margin:0 3px;float: right;text-align: right">Deselect
                                        all</small>
                                </p>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="button" class="btn btn-white" data-dismiss="modal"
                                aria-label="Close">Cancel</button>
                            <button type="submit" class="btn btn-secondary">Save</button>
                        </div>

                    </div>
                    {{-- </div> --}}

                </form>
            </div>

        </div>
    </div>
</div>
@endforeach
@endif

<!-- Modal remove-promo-->
<div class="modal remove-promo animated zoomIn text-center" id="remove-promo" tabindex="-1" role="dialog"
    aria-labelledby="myModalProviderel69" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Are you sure you want To remove</h4>
                <form method="POST" action='{{ route("admin.settings.deletePromoCode") }}'>
                    @csrf
                    <div class="row">
                        <input type="hidden" class="form-control" id="id" name="id" value="">
                        <div class="col-12">
                            <h5>This Promo Code?</h5>
                            <p id="code">#13344</p>
                        </div>
                        <div class="col-12">
                            <button type="button" class="btn btn-white" data-dismiss="modal"
                                aria-label="Close">Cancel</button>
                            <button type="submit" class="btn btn-secondary">Remove</button>
                        </div>
                    </div>
                </form>



                {{-- <div class="row">
                    <div class="col-12">
                        <h5>This Promo Code?</h5>
                        <p>#13344</p>
                    </div>
                    <div class="col-12">
                        <button type="button" class="btn btn-white" data-dismiss="modal"
                            aria-label="Close">Cancel</button>
                        <button type="button" class="btn btn-secondary">Remove</button>
                    </div>
                </div> --}}
            </div>

        </div>
    </div>
</div>

@endif



@if(Request::segment(1) == 'admin' && Request::segment(2) == 'dashboard')

<!-- Modal notifaction center -->
<div class="modal animated zoomIn text-left modal-notify-center" id="zoomIn" tabindex="-1" role="dialog"
    aria-labelledby="myModalProviderel69" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalProviderel69">Notifaction Center</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="scrollbar">
                    <section id="timeline" class="overflow timeline-outer">
                        <div class="container" id="content">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <ul class="timeline">
                                        <li class="event" data-date="May 2 20:30am">
                                            <h3>Order Number</h3>
                                            <p>
                                                This September 2015 I will begin an MSc in Management and
                                                Entrepreneurship at University of Sussex, to broaden my knowledge
                                                and gain skills necessary for my future in business and management.
                                            </p>
                                            <small>#455555</small>
                                        </li>
                                        <li class="event" data-date="May 2 20:30am">
                                            <h3>Order Number</h3>
                                            <p>
                                                This September 2015 I will begin an MSc in Management and
                                                Entrepreneurship at University of Sussex, to broaden my knowledge
                                                and gain skills necessary for my future in business and management.
                                            </p>
                                            <small>#455555</small>
                                        </li>
                                        <li class="event" data-date="May 2 20:30am">
                                            <h3>Order Number</h3>
                                            <p>
                                                This September 2015 I will begin an MSc in Management and
                                                Entrepreneurship at University of Sussex, to broaden my knowledge
                                                and gain skills necessary for my future in business and management.
                                            </p>
                                            <small>#455555</small>
                                        </li>
                                        <li class="event" data-date="May 2 20:30am">
                                            <h3>Order Number</h3>
                                            <p>
                                                This September 2015 I will begin an MSc in Management and
                                                Entrepreneurship at University of Sussex, to broaden my knowledge
                                                and gain skills necessary for my future in business and management.
                                            </p>
                                            <small>#455555</small>
                                        </li>
                                        <li class="event" data-date="May 2 20:30am">
                                            <h3>Order Number</h3>
                                            <p>
                                                This September 2015 I will begin an MSc in Management and
                                                Entrepreneurship at University of Sussex, to broaden my knowledge
                                                and gain skills necessary for my future in business and management.
                                            </p>
                                            <small>#455555</small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>

            </div>

        </div>
    </div>
</div>

<!-- Modal sort customer -->
<div class="modal animated zoomIn text-left" id="sort-destist" tabindex="-1" role="dialog"
    aria-labelledby="myModalProviderel69" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Customer Name</h5>
                <div class="row skin skin-square">
                    <div class="col-md-6 col-sm-12">
                        @if(!empty($customers))
                        @php
                        $arr_saved_customers = [];
                        if(app('request')->input('d') != null)
                        $arr_saved_customers = explode(',', app('request')->input('d') );
                        @endphp

                        @foreach ($customers as $customer)
                        @php
                        $is_checked = "" ;
                        if(in_array($customer->id,$arr_saved_customers)) $is_checked = "checked" ;
                        @endphp
                        <fieldset>
                            <input type="checkbox" id="customer-{{$customer->id}}" value="{{$customer->id}}"
                                name="filter-customers" {{$is_checked}}>
                            <label for="customer-{{$customer->id}}">{{$customer->full_name}}</label>
                        </fieldset>
                        @endforeach
                        @endif

                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn show-result-customer order-sort-filter-btn">Show Result</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal result customer -->
<div class="modal animated zoomIn text-left" id="modal-result-customer" tabindex="-1" role="dialog"
    aria-labelledby="myModalProviderel70" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalProviderel69">Top Customers</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive custom-bar">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Orders</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <tbody id="tpCustomersMdl">

                            <tr>
                                <td>1.Mohamed </td>
                                <td>5050</td>
                                <td>505<small>SAR</small></td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- Modal sort providers -->
<div class="modal animated zoomIn text-left" id="sort-provider" tabindex="-1" role="dialog" aria-labelledby="myModalProviderel69"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Provideroratories Name</h5>
                <div class="row skin skin-square">
                    <div class="col-md-6 col-sm-12">
                        @if(!empty($providers))
                        @php
                        $arr_saved_labs = [];
                        if(app('request')->input('l') != null)
                        $arr_saved_labs = explode(',', app('request')->input('l') );
                        @endphp

                        @foreach ($providers as $provider)
                        @php
                        $is_checked = "" ;
                        if(in_array($provider->id,$arr_saved_labs)) $is_checked = "checked" ;
                        @endphp
                        <fieldset>
                            <input type="checkbox" id="provider-{{$provider->id}}" value="{{$provider->id}}" name="filter-providers"
                                {{$is_checked}}>
                            <label for="provider-{{$provider->id}}">{{$provider->name}}</label>
                        </fieldset>
                        @endforeach
                        @endif
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn show-result-provider order-sort-filter-btn">Show Result</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal result provider -->
<div class="modal animated zoomIn text-left" id="modal-result-provider" tabindex="-1" role="dialog"
    aria-labelledby="myModalProviderel70" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalProviderel69">Top Provideroratories</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive custom-bar">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Provideroratory</th>
                                <th>Orders</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <tbody id="tpProvidersMdl">
                            <tr>
                                <td>1.Mohamed</td>
                                <td>5050</td>
                                <td>505<small>SAR</small></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>


<!-- Modal sort services -->
<div class="modal animated zoomIn text-left" id="sort-service" tabindex="-1" role="dialog"
    aria-labelledby="myModalProviderel69" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Services Name</h5>
                <div class="row skin skin-square">
                    <div class="col-md-11 col-sm-12">
                        @if(!empty($services))
                        @php
                        $arr_saved_srvs = [];
                        if(app('request')->input('sr') != null)
                        $arr_saved_srvs = explode(',', app('request')->input('sr') );
                        @endphp

                        @foreach ($services as $srv)
                        @php
                        // print_r($srv);
                        // exit;
                        $is_checked = "" ;
                        if(in_array($srv['id'],$arr_saved_srvs)) $is_checked = "checked" ;
                        @endphp
                        <fieldset>
                            <input type="checkbox" id="srv-{{$srv['id']}}" value="{{$srv['id']}}" name="filter-srvs"
                                {{$is_checked}}>
                            <label for="srv-{{$srv['id']}}">{{$srv['name']}}</label>
                        </fieldset>
                        @endforeach
                        @endif
                    </div>

                </div>

            </div>



            <div class="modal-footer">
                <button type="button" class="btn show-result-services order-sort-filter-btn">Show Result</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal result services -->
<div class="modal animated zoomIn text-left" id="modal-result-services" tabindex="-1" role="dialog"
    aria-labelledby="myModalProviderel70" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalProviderel69">Top Services</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive custom-bar">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Service</th>
                                <th>Order</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <tbody id="tpSrvsMdl">
                            <tr>
                                <td>1.crown</td>
                                <td>5050</td>
                                <td>505<small>SAR</small></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if(Request::segment(1) == 'admin' && Request::segment(2) == 'payments')
<!-- Modal Filter providers -->
<div class="modal animated zoomIn text-left" id="sort-destist" tabindex="-1" role="dialog"
    aria-labelledby="myModalProviderel69" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Provider Name</h5>
                <div class="row skin skin-square">
                    <div class="col-md-6 col-sm-12">
                        @if(!empty($providers))
                        @php
                        $arr_saved_labs = [];
                        if(app('request')->input('l') != null)
                        $arr_saved_labs = explode(',', app('request')->input('l') );
                        @endphp

                        @foreach ($providers as $provider)
                        @php
                        $is_checked = "" ;
                        if(in_array($provider->id,$arr_saved_labs)) $is_checked = "checked" ;
                        @endphp
                        <fieldset>
                            <input type="checkbox" id="{{$provider->id}}" value="{{$provider->id}}" name="filter-providers"
                                {{$is_checked}}>
                            <label for="{{$provider->id}}">{{$provider->name}}</label>
                        </fieldset>
                        @endforeach
                        @endif

                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn order-sort-filter-btn">Show Result</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal sort by -->
<div class="modal animated zoomIn text-left" id="sort-by" tabindex="-1" role="dialog" aria-labelledby="myModalProviderel69"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Sort By</h5>
                <div class="row">
                    <div class="col-md-12 col-sm-12">

                        {{-- <label class="radio-container">Newest
                            <input type="radio" name="sort_by" id="newset" value="newset" @if(app('request')->input('s')
                            != null && app('request')->input('s') == "newset")checked @endif>
                            <span class="checkmark"></span>
                        </label>
                        <label class="radio-container">Oldest
                            <input type="radio" name="sort_by" id="oldest" value="oldest" @if(app('request')->input('s')
                            != null && app('request')->input('s') == "oldest")checked @endif>
                            <span class="checkmark"></span>
                        </label> --}}
                        <label class="radio-container">Highest price
                            <input type="radio" name="sort_by" id="highest" value="highest"
                                @if(app('request')->input('s')
                            != null && app('request')->input('s') == "highest")checked @endif>
                            <span class="checkmark"></span>
                        </label>
                        <label class="radio-container">Lowest price
                            <input type="radio" name="sort_by" id="lowest" value="lowest" @if(app('request')->input('s')
                            != null && app('request')->input('s') == "lowest")checked @endif>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn order-sort-filter-btn" data-toggle="modal" data-target="#">Show
                    Result</button>
            </div>
        </div>
    </div>
</div>




<!-- Modal make payment -->
{{-- <div class="modal animated zoomIn" id="make-payment" tabindex="-1" role="dialog" aria-labelledby="myModalProviderel69"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content customer-drop">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalProviderel2">New Payment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">Cancel</button>
                <button type="button" class="btn-black">Create payment</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <h5>Payment Information</h5>
                        <div class="row mt-1">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="payment-for">Payment For</label>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="form-group">
                                    <select id="payment-for">
                                        <option value="hide">Samaya Clinic</option>
                                        <option value="1">Ali Clinic</option>
                                        <option value="2">Samaya Clinic</option>
                                        <option value="3">Samaya Clinic</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label for="simple">Date</label>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="row">
                                    <div class="col-6 pr-5">
                                        <div id="sandbox" class="form-group">
                                            <input id="simple" type="text" class="form-control" value=""
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-6 pl-5">
                                        <div class="form-group">
                                            <div class="input-group date" id="datePicker">
                                                <input type="text" class="form-control input-group-addon" name="date"
                                                    value="" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="col-3">
                                <div class="form-group">
                                    <label for="num-trans">Transactions number</label>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="num-trans">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-6 balance-summary">
                        <h5>Balance Summary</h5>
                        <div class="row">
                            <div class="col-10">
                                <p class="d-inline">This Month</p>
                                <p class="d-inline float-right"><small>SAR</small><span>0.00</span></p>
                            </div>
                            <div class="col-10">
                                <p class="d-inline">Last Month</p>
                                <p class="d-inline float-right left"><small>SAR</small><span>600.00</span></p>
                            </div>
                            <div class="col-10">
                                <p class="d-inline">30+Days</p>
                                <p class="d-inline float-right"><small>SAR</small><span>10.00</span></p>
                            </div>
                            <div class="col-10">
                                <p class="d-inline">60+Days</p>
                                <p class="d-inline float-right"><small>SAR</small><span>0.00</span></p>
                            </div>
                            <div class="col-10">
                                <p class="d-inline">90+Days</p>
                                <p class="d-inline float-right"><small>SAR</small><span>0.00</span></p>
                            </div>
                            <div class="col-10">
                                <p class="d-inline">120+Days</p>
                                <p class="d-inline float-right mb-0"><small>SAR</small><span>0.00</span></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-10">
                                <p class="d-inline text-bold-600">Current Balance</p>
                                <p class="d-inline float-right left"><small>SAR</small><span>270.00</span></p>
                            </div>
                            <div class="col-10">
                                <p class="d-inline text-bold-600">Payment Calculator</p>
                                <p class="d-inline float-right left"><small>SAR</small><span>600.00</span></p>
                            </div>
                            <div class="col-11 bg-total">
                                <p class="d-inline text-bold-600">Payment Amount</p>
                                <p class="d-inline float-right total-num"><small>SAR</small><span>270.00</span></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer invoice">
                <div class="row">
                    <div class="col-12">
                        <h3>Invoices</h3>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mb-0 table-invoice">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Provider Name</th>
                                        <th>Invoice N.</th>
                                        <th>Provider Name</th>
                                        <th>Amount</th>
                                        <th>Settlement Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>
                                            <div>
                                                <input class="styled-checkbox" id="styled-checkbox" type="checkbox">
                                                <label for="styled-checkbox"></label>
                                            </div>
                                        </th>
                                        <td>08-07-2019</td>
                                        <td>#134434R</td>
                                        <td>Samaya clinic</td>
                                        <td>5689<small>SAR</small></td>
                                        <td>505<small>SAR</small></td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <div>
                                                <input class="styled-checkbox" id="styled-checkbox-10" type="checkbox">
                                                <label for="styled-checkbox-10"></label>
                                            </div>
                                        </th>
                                        <td>08-07-2019</td>
                                        <td>#134434R</td>
                                        <td>Samaya clinic</td>
                                        <td>5689<small>SAR</small></td>
                                        <td>505<small>SAR</small></td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>



        </div>
    </div>




</div> --}}


@endif