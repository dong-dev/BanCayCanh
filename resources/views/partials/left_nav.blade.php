<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src=" {{ asset('dist/img/user2-160x160.jpg') }} " class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        @if(!Auth::guest())
          <p> {{ Auth::user()->name }}</p>
        @endif
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
   {{--  <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form --> --}}
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li>
          <a href="{{ url('admin/user') }}"><span>User</span></a> 
      </li>
      <li>
          <a href="{{ url("admin/category") }}" ><span>Categories</span></a>
      </li>
      <li>
        <a href="{{ url("admin/product") }}" ><span>Product</span></a>
      </li>
      <li>
        <a href="{{ url("admin/order") }}" ><span>Order</span></a>
      </li>
  </section>
  <!-- /.sidebar -->
</aside>