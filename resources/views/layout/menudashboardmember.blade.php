<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="/dashboardmember" class="nav-link">
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
            Profile
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/dashboardmember/profile/view" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>View Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboardmember/profile/edit" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Edit Profile</p>
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
                <a href="/dashboardmember/cart" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Cart</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dashboardmember/all-transaction" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Transaction</p>
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