	<div class="col-md-4 aside aside--left">
				<div class="list-group">
				     <ul class="side-ulist mb-2">
				        
				      <li>
					    <a href="javascript:;" class="list-group-item d-flex">
					        <span>
					        <img src="https://static-assets-web.flixcart.com/fk-p-linchpin-web/fk-cp-zion/img/profile-pic-male_4811a1.svg" />
					        </span>
					        <div class="d-flex">
					        <span class="pro-name">Hello <span class="dash-nm"> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} </span></span> 
					        </div>
					        </a>
					  </li>
					  </ul>
				    <ul class="side-ulist side-ulist2">
				        <li>
					<a href="{{route('account-history.index')}}" class="list-group-item">
					    <i class="fa fa-shopping-cart mr-1" aria-hidden="true"></i> My Orders </a>
					</li>
					
				    <li>
					    <a href="javascript:;" class="list-group-item">
					        <i class="icon-user mr-1" ></i> Account Setting</a>
					        <div>
					    <ul class="profile-list">
					        <li> <a href="{{route('user.dashboard')}}">Profile Information </a> </li>
					    </ul>
					</div>
					</li>
				 <li>
					    <a href="javascript:;" class="list-group-item">
					        <i class="fas fa-id-card-alt mr-1" ></i> My Stuff</a>
					        <div>
					    <ul class="profile-list">
					        <li> <a href="{{route('account-review.index')}}">My reviews and ratings </a> </li>
					        <li> <a href="{{route('account-notification.index')}}">All Notifications</a> </li>
					        <li> <a href="{{route('account-wishlist.index')}}">My Wishlist</a> </li>
					    </ul>
					</div>
					</li>
					<li>
					    <a href="{{route('user.logout')}}" class="list-group-item">
					        <i class="fa fa-sign-out mr-1" ></i> Logout</a>
					       
					</li>
					</ul>
				</div>
			</div>