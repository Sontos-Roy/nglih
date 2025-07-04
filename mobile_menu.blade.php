<!--<form class="d-flex p-3 shadow-sm" action="{{ route('shop')}}">-->
<!--  <input class="form-control border-0" type="text" placeholder="Search" name="q">-->
<!--  <button class="btn my-2 my-sm-0" type="submit">-->
<!--    <i class="fa fa-search"></i>-->
<!--  </button>-->
<!--</form>-->

<style>
    /*.nav_mobile li:first-child > a {*/
    /*    width: 70%;*/
    /*}*/
</style>


<ul class="navbar-nav nav_mobile">
    <!--<li><i class="fa fa-close" style="font-size: 30px;"></i></li>-->
    <li class="nav-item"><a href="{{ route('home')}}" class="nav-link active">Home</a></li>
    <li class="nav-item">
        <a href=" {{ route('shop')}} " class="nav-link text-warning semi font-14">SHOP PRODUCT</a>
    </li>
    @foreach($cats as $cat)
    @php
        $count=$cat->sub_categories->count();
    @endphp
    <li class="nav-item {{$count?'has_menu':''}}">
        <a href="{{ route('shop',['cat_id'=> $cat->id])}}" class="nav-link">
            {{ $cat->name}}
        </a>
        @if($count)
        <ul class="inner_menu">
            @foreach($cat->sub_categories as $sub)
            <li class="nav-item">
                <a href="{{ route('shop',['cat_id'=> $cat->id, 'sub_cat_id'=> $sub->id])}}" class="nav-link">{{$sub->name}}</a>
            </li>
            @endforeach
        </ul>
        @endif
    </li>
    @endforeach
</ul>
<div class="menu_sidebar" id="menu_sidebar">
    <h3 class="menu_sidebar_dismiss"><i class="fas fa-times"></i></h3>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs w-100 sidebar_tab" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                Categories
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false" tabindex="-1">
                Menu
            </button>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0 main_m_menu">
                @foreach($cats as $cat)
                    @php
                        $count=$cat->sub_categories->count();
                    @endphp
                    <li class="nav-item {{ $count ? 'dropdown' : '' }} ">
                        <a class="nav-link text-dark hed_2 header_font" href="{{ route('shop',['cat_id'=> $cat->id])}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $cat->name}}
                            @if($count)
                            <span class="dp_id"></span>
                            @endif
                        </a>
                        @if($count)
                        <ul class="dropdown_menu">
                            <li><a class="dropdown-item hed_2 font_line" href="{{ route('shop',['cat_id'=> $cat->id])}}">View All</a></li>
                            @foreach($cat->sub_categories as $sub)
                            <li><a class="dropdown-item hed_2 font_line" href="{{ route('shop',['cat_id'=> $cat->id, 'sub_cat_id'=> $sub->id])}}">{{ $sub->name }}</a></li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0 main_m_menu">

                <li class="nav-item">
                    <a class="nav-link  text-dark hed_2 header_font" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-flex font-16 gap-2">
                            <i class="fas fa-search font-20 me-3" style="width: 20px;"></i> Search
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  text-dark hed_2 header_font" href="{{ route('shop')}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-flex font-16 gap-2">
                             Shop
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  text-dark hed_2 header_font" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-flex font-16 gap-2">
                             Blog
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  text-dark hed_2 header_font" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-flex font-16 gap-2">
                            <i class="far fa-heart font-20 me-3" style="width: 20px;"></i> Wishlist
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  text-dark hed_2 header_font" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="d-flex font-16 gap-2">
                            <i class="far fa-user font-20 me-3" style="width: 20px;"></i> Login / Register
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="nav-link font-15 d-block">
                        <div class="mt-1">Need Help?</div>
                        <span class="d-flex gap-1 mt-3 align-items-center font-12 text-muted segoe">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 32 32" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <path d="M23.407 30.394c-2.431 0-8.341-3.109-13.303-9.783-4.641-6.242-6.898-10.751-6.898-13.785 0-2.389 1.65-3.529 2.536-4.142l0.219-0.153c0.979-0.7 2.502-0.927 3.086-0.927 1.024 0 1.455 0.599 1.716 1.121 0.222 0.442 2.061 4.39 2.247 4.881 0.286 0.755 0.192 1.855-0.692 2.488l-0.155 0.108c-0.439 0.304-1.255 0.869-1.368 1.557-0.055 0.334 0.057 0.684 0.342 1.068 1.423 1.918 5.968 7.55 6.787 8.314 0.642 0.6 1.455 0.685 2.009 0.218 0.573-0.483 0.828-0.768 0.83-0.772l0.059-0.057c0.048-0.041 0.496-0.396 1.228-0.396 0.528 0 1.065 0.182 1.596 0.541 1.378 0.931 4.487 3.011 4.487 3.011l0.050 0.038c0.398 0.341 0.973 1.323 0.302 2.601-0.695 1.327-2.85 4.066-5.079 4.066zM9.046 2.672c-0.505 0-1.746 0.213-2.466 0.728l-0.232 0.162c-0.827 0.572-2.076 1.435-2.076 3.265 0 2.797 2.188 7.098 6.687 13.149 4.914 6.609 10.532 9.353 12.447 9.353 1.629 0 3.497-2.276 4.135-3.494 0.392-0.748 0.071-1.17-0.040-1.284-0.36-0.241-3.164-2.117-4.453-2.988-0.351-0.238-0.688-0.358-0.999-0.358-0.283 0-0.469 0.1-0.532 0.14-0.104 0.111-0.39 0.405-0.899 0.833-0.951 0.801-2.398 0.704-3.424-0.254-0.923-0.862-5.585-6.666-6.916-8.459-0.46-0.62-0.641-1.252-0.538-1.877 0.187-1.133 1.245-1.866 1.813-2.26l0.142-0.099c0.508-0.363 0.4-1.020 0.316-1.242-0.157-0.414-1.973-4.322-2.203-4.781-0.188-0.376-0.336-0.533-0.764-0.533z" fill="currentColor"></path>
                            </svg>
                            <a href="tel:{{ $ecomm_setting->contact }}" class="text-muted font-15">{{ $ecomm_setting->contact }}</a>
                        </span>
                        <span class="d-flex gap-1 mt-3 align-items-center font-12 text-muted segoe">
                            <svg class="ml__15" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 32 32" xmlns:xlink="http://www.w3.org/1999/xlink ">
                                <path d="M28.244 7.47h-25.572v17.060h26.656v-17.060h-1.084zM27.177 8.536l-10.298 10.298c-0.47 0.47-1.289 0.47-1.759 0l-10.3-10.298h22.356zM3.738 8.961l6.923 6.922-6.923 6.923v-13.846zM4.589 23.464l6.827-6.826 2.951 2.95c0.436 0.436 1.016 0.677 1.633 0.677s1.197-0.241 1.633-0.677l2.951-2.951 6.826 6.826h-22.822zM28.262 22.807l-6.923-6.924 6.923-6.924v13.848z" fill="currentColor"></path>
                            </svg>
                            <a href="#" class="text-muted font-15">{{ $ecomm_setting->email }}</a>
                        </span>
                    </div>
                </li>

            </ul>
        </div>
    </div>

</div>
