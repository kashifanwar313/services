<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('dashboard-assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ ucfirst(auth()->user()->name) }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="{{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
        <a href="{{ route('dashboard.index') }}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="{{ request()->routeIs('services.index') ? 'active' : '' }}"><a href="{{ route('services.index') }}"><i class="fa fa-circle-o text-red"></i> <span>Services</span></a></li>
      <li class="{{ request()->routeIs('square.foot.index') ? 'active' : '' }}"><a href="{{ route('square.foot.index') }}"><i class="fa fa-circle-o text-yellow"></i> <span>Square Foots</span></a></li>
      <li class="{{ request()->routeIs('story.index') ? 'active' : '' }}"><a href="{{ route('story.index') }}"><i class="fa fa-circle-o text-aqua"></i> <span>Story</span></a></li>
      <li class="{{ request()->routeIs('plans.index') ? 'active' : '' }}"><a href="{{ route('plans.index') }}"><i class="fa fa-circle-o text-red"></i> <span>Plans</span></a></li>
      <li class="{{ request()->routeIs('price.sheet.index') ? 'active' : '' }}"><a href="{{ route('price.sheet.index') }}"><i class="fa fa-circle-o text-yellow"></i> <span>Price Sheets</span></a></li>
      {{-- <li class="{{ request()->routeIs('questions.index') ? 'active' : '' }}"><a href="{{ route('questions.index') }}"><i class="fa fa-circle-o text-aqua"></i> <span>Questions</span></a></li> --}}
      <li class="{{ request()->routeIs('questions.index') ? 'active' : '' }}"><a href="{{ route('drive.way.index') }}"><i class="fa fa-circle-o text-aqua"></i> <span>Driveway, Sidewalks and Patios</span></a></li>
      <li class="{{ request()->routeIs('questions.index') ? 'active' : '' }}"><a href="{{ route('nu.of.cars.index') }}"><i class="fa fa-circle-o text-red"></i> <span>Number Of Cars</span></a></li>
      <li class="{{ request()->routeIs('driveway.price.sheet.index') ? 'active' : '' }}"><a href="{{ route('driveway.price.sheet.index') }}"><i class="fa fa-circle-o text-yellow"></i> <span>Driveway Price Sheets</span></a></li>
      <li class="{{ request()->routeIs('quotes') ? 'active' : '' }}"><a href="{{ route('quotes') }}"><i class="fa fa-circle-o text-yellow"></i> <span>Quotes</span></a></li>
    </ul>
</section>
<!-- /.sidebar -->
