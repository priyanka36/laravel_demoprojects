<!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo"><a href="#"><span></span>Capital Admin<span></span></a></div>
<div class="br-sideleft overflow-y-auto">
    <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
    <ul class="br-sideleft-menu">
        <li class="br-menu-item">
            <a href="{{route('dashboard')}}"
               class="br-menu-link {{ (\Illuminate\Support\Facades\Route::currentRouteName() == 'dashboard')? 'active' : '' }}">
                <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
                <span class="menu-item-label">Dashboard</span>
            </a><!-- br-menu-link -->
        </li>


        <li class="br-menu-item">
            <a href="{{route('backend.sliderList')}}"
               class="br-menu-link {{ (\Illuminate\Support\Facades\Route::currentRouteName() == 'backend.sliderList')? 'active' : '' }}">

                <span class="menu-item-label">Slider</span>
            </a><!-- br-menu-link -->
        </li>
        <li class="br-menu-item">
            <a href="{{route('backend.homepageList')}}"
               class="br-menu-link {{ (\Illuminate\Support\Facades\Route::currentRouteName() == 'backend.homepageList')? 'active' : '' }}">

                <span class="menu-item-label">Homepage</span>
            </a><!-- br-menu-link -->
        </li>
        <li class="br-menu-item">
            <a href="{{route('backend.introductionList')}}"
              class="br-menu-link {{ (\Illuminate\Support\Facades\Route::currentRouteName() == 'backend.introductionList')? 'active' : '' }}">

                <span class="menu-item-label">AboutUs</span>
            </a><!-- br-menu-link -->
        </li>
        <li class="br-menu-item">
            <a href="{{route('backend.teamList')}}"
               class="br-menu-link {{ (\Illuminate\Support\Facades\Route::currentRouteName() == 'backend.teamList')? 'active' : '' }}">

                <span class="menu-item-label">Team</span>
            </a><!-- br-menu-link -->
        </li>
        <li class="br-menu-item">
            <a href="{{route('backend.bodList')}}"
               class="br-menu-link {{ (\Illuminate\Support\Facades\Route::currentRouteName() == 'backend.bodList')? 'active' : '' }}">

                <span class="menu-item-label">BOD</span>
            </a><!-- br-menu-link -->
        </li>
        <li class="br-menu-item">
            <a href="{{route('backend.careerList')}}"
               class="br-menu-link {{ (\Illuminate\Support\Facades\Route::currentRouteName() == 'backend.careerList')? 'active' : '' }}">

                <span class="menu-item-label">Career</span>
            </a><!-- br-menu-link -->
        </li>
        <li class="br-menu-item">
            <a href="{{route('backend.enrollList')}}"
               class="br-menu-link {{ (\Illuminate\Support\Facades\Route::currentRouteName() == 'backend.enrollList')? 'active' : '' }}">

                <span class="menu-item-label">Enroll</span>
            </a><!-- br-menu-link -->
        </li>
        <li class="br-menu-item">
            <a href="{{route('backend.eventList')}}"
               class="br-menu-link {{ (\Illuminate\Support\Facades\Route::currentRouteName() == 'backend.eventList')? 'active' : '' }}">

                <span class="menu-item-label">Event</span>
            </a><!-- br-menu-link -->
        </li>
        <li class="br-menu-item">
            <a href="{{route('backend.rumList')}}"
               class="br-menu-link {{ (\Illuminate\Support\Facades\Route::currentRouteName() == 'backend.rumList')? 'active' : '' }}">

                <span class="menu-item-label">Rum</span>
            </a><!-- br-menu-link -->
        </li>
        <li class="br-menu-item">
            <a href="{{route('backend.whiskyList')}}"
               class="br-menu-link {{ (\Illuminate\Support\Facades\Route::currentRouteName() == 'backend.whiskyList')? 'active' : '' }}">

                <span class="menu-item-label">Whisky</span>
            </a><!-- br-menu-link -->
        </li>
        <li class="br-menu-item">
            <a href="{{route('backend.ginList')}}"
               class="br-menu-link {{ (\Illuminate\Support\Facades\Route::currentRouteName() == 'backend.ginList')? 'active' : '' }}">

                <span class="menu-item-label">Gin</span>
            </a><!-- br-menu-link -->
        </li>
        <li class="br-menu-item">
            <a href="{{route('backend.vodkaList')}}"
               class="br-menu-link {{ (\Illuminate\Support\Facades\Route::currentRouteName() == 'backend.vodkaList')? 'active' : '' }}">

                <span class="menu-item-label">Vodka</span>
            </a><!-- br-menu-link -->
        </li>








    </ul>
    <!-- br-sideleft-menu -->


    <br>
</div><!-- br-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->