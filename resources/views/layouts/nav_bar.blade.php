<div class="main-navigation-container">
    <div class="menu-toggle" id="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div><!-- #menu-toggle -->

    <nav id="site-navigation" class="main-navigation">

        <div class="menu-primary-menu-container">
            <ul id="menu-primary-menu" class="menu">
                <li id="menu-item-353" class="@if (\Request::is('/')) {{ 'active-menu'}} @endif">
                    <a href="{{ url('/')  }}">Personal Details</a>
                </li>
                <li id="menu-item-330" class="@if (\Request::is('prefrences')) {{ 'active-menu'}} @endif">
                    <a href="{{ url('prefrences')  }}">Prefrences</a>
                </li>
                <li id="menu-item-357" class="@if (\Request::is('guests')) {{ 'active-menu'}} @endif">
                    <a href="{{ url('guests') }}">Guests</a>
                </li>
                <li id="menu-item-358" class="@if (\Request::is('additional')) {{ 'active-menu'}} @endif">
                    <a href="{{ url('additional')  }}">Additional Attandees</a>
                </li>
                <li id="menu-item-354" class="@if (\Request::is('meeting')) {{ 'active-menu'}} @endif">
                    <a href="{{ url('meeting')  }}">Meetings</a>
                </li>
                <li id="menu-item-359" class="@if (\Request::is('hotel')) {{ 'active-menu'}} @endif">
                    <a href="{{ url('hotel')  }}">Hotel</a>
                </li>
                <li id="menu-item-355" class="@if (\Request::is('flights')) {{ 'active-menu'}} @endif">
                    <a href="{{ url('flights')  }}">Flights</a>
                </li>
                <li id="menu-item-352" class="@if (\Request::is('agreement')) {{ 'active-menu'}} @endif">
                    <a href="{{ url('agreement') }}">Agreement</a>
                </li>
                <li id="menu-item-171" class="@if (\Request::is('contact_us')) {{ 'active-menu'}} @endif">
                    <a href="{{ url('contact_us') }}">Contact Us</a>
                </li>
            </ul>
        </div>
    </nav><!-- #site-navigation -->
</div>