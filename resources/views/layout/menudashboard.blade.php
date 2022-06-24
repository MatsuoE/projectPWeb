<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="/dashboard" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-folder-open"></i>
          <p>
            Product
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/dashboard/products/all" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>All Product</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/products/create" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Create Product</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/products/allcategory" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>All Category</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-shopping-cart"></i>
          <p>
            Transaction
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>New Transaction</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>All Transaction</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-list"></i>
          <p>
            Data
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Sales Report</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/admin" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Users</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <form action="/logout" method="post">
          @csrf
          <button type="submit" class="nav-link"><i class="nav-icon fas fa-sign-out-alt"></i> Logout</button>
        </form>
      </li>
    </ul>
  </nav>