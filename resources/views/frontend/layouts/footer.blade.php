@if(app()->getLocale() == 'en')
    <footer class="footer text-white bg-main border-0 py-6">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <h3 class="mb-4"><strong>{{ $main->en_footer_about_title }}</strong></h3>
                    <div class="nav flex-column">
                        <p>{{ $main->en_footer_about_text }}</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h3 class="mb-4"><strong>Cateogries</strong></h3>
                    <div class="nav flex-column">
                        @foreach($categories as $category)
                            <div class="nav flex-column">
                                <a class="nav-link" href="{{ route('categories', [$category->brand->en_slug, $category->en_slug]) }}">{{$category->en_name}}</a>
                            </div> 
                        @endforeach
                    </div>
                </div>

                <div class="col-sm-12 col-lg-3 widget-area">
                    <div class="widget flicker_widget clearfix">
                        <h3 class="mb-4">Contact us</h3>
                        <div class="textwidget widget-text">
                                <ul class="list-unstyled">
                                    <li class="mb-1"><i class="fa fa-map mr-2 text-primary" aria-hidden="true"></i>{{ $contact_us->en_address }}</li>
                                    <li class="mb-1"><i class="fa fa-phone-alt mr-2 text-primary" aria-hidden="true"></i>+{{ $contact_us->phone }}</li>
                                    <li class="mb-1"><i class="fa fa-phone-alt mr-2 text-primary" aria-hidden="true"></i>+{{ $contact_us->fax }}</li>
                                    <p>For sales and inquires... Please contact:</p>
                                    <li class="mb-1"><i class="fa fa-envelope mr-2 text-primary" aria-hidden="true"></i>{{ $contact_us->sales_email_1 }}</li>
                                    <li class="mb-1"><i class="fa fa-envelope mr-2 text-primary" aria-hidden="true"></i>{{ $contact_us->sales_email_2 }}</li>
                                    @if($contact_us->sales_email_3 != NULL)
                                    <li class="mb-1"><i class="fa fa-envelope mr-2 text-primary" aria-hidden="true"></i>{{ $contact_us->sales_email_3 }}</li>
                                    @endif
                                </ul>
                                <div class="social">
                                    <a class="social-facebook border rounded-circle" href="{{ $contact_us->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                    <a class="social-twitter border rounded-circle" href="{{ $contact_us->twitter }}"><i class="fab fa-twitter"></i></a>
                                    <a class="social-instagram border rounded-circle" href="{{ $contact_us->instagram }}"><i class="fab fa-instagram"></i></a>
                                </div>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
    </footer>
    <footer class="footer text-white bg-main">
        <div class="row no-gutters align-items-center">

                <div class="col-md-12 text-center">
                    <p class="mb-0 text-center">All copyrights reserved by <a href="http://digitalbondmena.com" class="text-primary">Digital Bond</a> © 2021</p>
                </div>

            </div>
    </footer>
@else
    <footer class="footer text-white bg-main border-0 py-6">
        <div class="container">
            <div class="row">
    
                <div class="col-md-6">
                    <h3 class="mb-4"><strong>{{ $main->ar_footer_about_title }}</strong></h3>
                    <div class="nav flex-column">
                        <p>{{ $main->ar_footer_about_text }}</p>                    
                    </div>
                </div>
    
                <div class="col-lg-3 col-md-6">
                    <h3 class="mb-4"><strong>التصنيفات</strong></h3>
                    @foreach($categories as $category)
                        <div class="nav flex-column">
                            <a class="nav-link" href="{{ route('categories', [$category->brand->ar_slug, $category->ar_slug]) }}">{{$category->ar_name}}</a>
                        </div> 
                    @endforeach
                
                </div>
    
                <div class="col-sm-12 col-lg-3 widget-area">
                    <div class="widget flicker_widget clearfix">
                        <h3 class="mb-4">تواصل معنا </h3>
                        <div class="textwidget widget-text">
                                <ul class="list-unstyled px-0">
                                    <li class="mb-1"><i class="fa fa-map ml-2 text-primary" aria-hidden="true"></i>{{ $contact_us->ar_address }}</li>
                                    <li class="mb-1"><i class="fa fa-phone-alt ml-2 text-primary" aria-hidden="true"></i>+{{ $contact_us->phone }}</li>
                                    <li class="mb-1"><i class="fa fa-phone-alt ml-2 text-primary" aria-hidden="true"></i>+{{ $contact_us->fax }}</li>
                                    <p>للمبيعات والاستفسارات ... يرجى التواصل معنا :</p>
                                    <li class="mb-1"><i class="fa fa-envelope ml-2 text-primary" aria-hidden="true"></i>{{ $contact_us->sales_email_1 }}</li>
                                    <li class="mb-1"><i class="fa fa-envelope ml-2 text-primary" aria-hidden="true"></i>{{ $contact_us->sales_email_2 }}</li>
                                    @if($contact_us->sales_email_3 != NULL)
                                    <li class="mb-1"><i class="fa fa-envelope ml-2 text-primary" aria-hidden="true"></i>{{ $contact_us->sales_email_3 }}</li>
                                    @endif
                                </ul>
                                <div class="social">
                                    <a class="social-facebook border rounded-circle" href="{{ $contact_us->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                    <a class="social-twitter border rounded-circle" href="{{ $contact_us->twitter }}"><i class="fab fa-twitter"></i></a>
                                    <a class="social-instagram border rounded-circle" href="{{ $contact_us->instagram }}"><i class="fab fa-instagram"></i></a>
                                </div>
                        </div>
                    </div>
                </div>
    
            </div>
            
        </div>
    
        
    </footer>
    <footer class="footer text-white bg-main">
        <div class="row no-gutters align-items-center">
    
            <div class="col-md-12 text-center">
                <p class="mb-0 text-center">جميع الحقوق محفوظة لشركة <a href="http://www.digitalbondmena.com/" class="text-primary">ديجيتل بوند  </a>&COPY; 2021</p>
            </div>
    
        </div>
    </footer>


@endif