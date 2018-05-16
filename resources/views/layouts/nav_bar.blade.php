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
                    <a href="{{ url('/')  }}" data-href="/" class="selecturl">Personal Details</a>
                </li>
                <li id="menu-item-330" class="@if (\Request::is('preferences')) {{ 'active-menu'}} @endif">
                    <a href="{{ url('prefrences')  }}" data-href="prefrences" class="selecturl">Preferences</a>
                </li>
                <li id="menu-item-357" class="@if (\Request::is('guests')) {{ 'active-menu'}} @endif">
                    <a href="{{ url('guests') }}" data-href="guests" class="selecturl">Guests</a>
                </li>
                <li id="menu-item-358" class="@if (\Request::is('additional')) {{ 'active-menu'}} @endif">
                    <a href="{{ url('additional')  }}" data-href="additional" class="selecturl">Additional Attendees</a>
                </li>
                <li id="menu-item-354" class="@if (\Request::is('meeting')) {{ 'active-menu'}} @endif">
                    <a href="{{ url('meeting')  }}" data-href="meeting" class="selecturl">Meetings</a>
                </li>
                <li id="menu-item-359" class="@if (\Request::is('hotel')) {{ 'active-menu'}} @endif">
                    <a href="{{ url('hotel')  }}" data-href="hotel" class="selecturl">Hotel</a>
                </li>
                <li id="menu-item-355" class="@if (\Request::is('flights')) {{ 'active-menu'}} @endif">
                    <a href="{{ url('flights')  }}" data-href="flights" class="selecturl">Flights</a>
                </li>
                <li id="menu-item-352" class="@if (\Request::is('agreement')) {{ 'active-menu'}} @endif">
                    <a href="{{ url('agreement') }}" data-href="agreement" class="selecturl">Agreement</a>
                </li>
                <li id="menu-item-171" class="@if (\Request::is('contact_us')) {{ 'active-menu'}} @endif">
                    <a href="{{ url('contact_us') }}" data-href="contact_us">Contact Us</a>
                </li>
            </ul>
        </div>
    </nav><!-- #site-navigation -->
</div>