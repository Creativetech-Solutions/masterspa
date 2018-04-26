<div class="main-navigation-container">
    <div class="menu-toggle" id="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div><!-- #menu-toggle -->

    <nav id="site-navigation" class="main-navigation">

        <div class="menu-primary-menu-container">
            <ul id="menu-primary-menu" class="menu">
                <li id="menu-item-353" class="{{Request::is('/') ? 'active' : ''}}">
                    <a href="{{ url('/')  }}">Personal Details</a>
                </li>
                <li id="menu-item-330" class="{{Request::is('/masterspa/public/prefrences') ? 'active' : ''}}">
                    <a href="{{ url('prefrences')  }}">Prefrences</a>
                </li>
                <li id="menu-item-357" class="{{Request::is('guests') ? 'active' : ''}}">
                    <a href="{{ url('guests') }}">Guests</a>
                </li>
                <li id="menu-item-358" class="{{Request::is('additional') ? 'active' : ''}}">
                    <a href="{{ url('additional')  }}">Additional Attandees</a>
                </li>
                <li id="menu-item-354" class="{{Request::is('meeting') ? 'active' : ''}}">
                    <a href="{{ url('meeting')  }}">Meetings</a>
                </li>
                <li id="menu-item-359" class="{{Request::is('hotel') ? 'active' : ''}}">
                    <a href="{{ url('hotel')  }}">Hotel</a>
                </li>
                <li id="menu-item-355" class="{{Request::is('flights') ? 'active' : ''}}">
                    <a href="{{ url('flights')  }}">Flights</a>
                </li>
                <li id="menu-item-352" class="{{Request::is('agreement') ? 'active' : ''}}">
                    <a href="{{ url('agreement') }}">Agreement</a>
                </li>
                <li id="menu-item-171" class="{{Request::is('contact_us') ? 'active' : ''}}">
                    <a href="{{ url('contact_us') }}">Contact Us</a>
                </li>
            </ul>
        </div>
    </nav><!-- #site-navigation -->
</div>