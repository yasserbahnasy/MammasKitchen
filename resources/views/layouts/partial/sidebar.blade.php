<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('backend/img/sidebar-1.jpg')}}">
  <div class="logo">
    <a href="{{ route('admin.dashboard')}}" class="simple-text logo-normal">
      Mamma's Kitchen
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="@if (Request::is('admin/dashboard')) active @endif">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="@if (Request::is('admin/slider*')) active @endif">
        <a class="nav-link" href="{{ route('slider.index') }}">
          <i class="material-icons">slideshow</i>
          <p>Sliders</p>
        </a>
      </li>
      <li class="@if (Request::is('admin/category*')) active @endif ">
        <a class="nav-link" href="{{ route('category.index') }}">
          <i class="material-icons">content_paste</i>
          <p>Categories</p>
        </a>
      </li>

      <li class="@if (Request::is('admin/item*')) active @endif ">
        <a class="nav-link" href="{{ route('item.index') }}">
          <i class="material-icons">library_books</i>
          <p>Items</p>
        </a>
      </li>

      <li class="@if (Request::is('admin/reservation*')) active @endif ">
        <a class="nav-link" href="{{ route('reservation.index') }}">
          <i class="material-icons">chrome_reader_mode</i>
          <p>Reservation</p>
        </a>
      </li>

      <li class="@if (Request::is('admin/contact*')) active @endif ">
        <a class="nav-link" href="{{ route('contact.index') }}">
          <i class="material-icons">message</i>
          <p>Contact Message</p>
        </a>
      </li>



    </ul>
  </div>
</div>
