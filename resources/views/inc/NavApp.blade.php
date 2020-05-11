<nav>
    <div class="container">
      <div class="navbar-left">
        <a href="/producten">ShopKuijpers</a>
      </div> <!--end navbar-left -->
  
      <div class="navbar-right">
        <a href="/winkelwagen" id="cart"><i class="fa fa-shopping-cart"></i> Cart @if(count($headerData) != 0)<span class="badge">{{count($headerData)}}</span>@endif</a>
        <div class="shopping-cart">
          <div class="shopping-cart-header">
            <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">{{count($headerData)}}</span>
            <div class="shopping-cart-total">
              <span class="lighter-text">Total:</span>
                <span class="main-color-text total">€{{$totalprijs}}</span>
            </div>
          </div> <!--end shopping-cart-header -->
  
          <ul class="shopping-cart-items">
            @foreach ($headerData as $item)
            <li class="clearfix">
                <img src="https://www.qispackaging.com.au/getmetafile/fefe4afb-dd4d-495e-ad59-209f29b47052/XMREDTREE.aspx" alt="item1" />
                <span class="item-name">{{$item->product_naam}}</span>
                <span class="item-detail">{{$item->product_omschrijving}}</span>
                <span class="item-price">€{{$item->product_prijs}}</span>
                <span class="item-quantity">Aantal:{{$item->aantal}}</span>
            </li>
            @endforeach
          </ul>
  
          <a href="/winkelwagen" class="button button-diff">Checkout <i class="fa fa-chevron-right"></i></a>
        </div> <!--end shopping-cart -->
      </div> <!--end navbar-right -->
      
    </div> <!--end container -->
  </nav>