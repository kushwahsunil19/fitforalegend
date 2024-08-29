
<style>
.nav-sidebar>.nav-item {
    margin-bottom: 0;
    margin-top: 5px;
}
.nav-treeview>.nav-item>.nav-link.active {
    background-color: #ececec !important;
}
</style>


<aside class="main-sidebar sidebar-dark-primary elevation-4">

	<a href="#" class="brand-link">
		<!--<img src="{{asset('public/assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
		<span class="brand-text font-weight-light"> <img style="width: 100%; max-width: 170px; margin-bottom: 0; display: block; margin: auto" src="https://cloudwapptechnologies.com/TM/Fitforalegend/images/skins/fashion/logo5.png" /> </span>
	</a>
	<div class="sidebar">
	    
                    <?php 
                    $url = request()->path();
                    $url = explode('/',$url);
                       $endurl = end($url);
                     $url = $_SERVER['REQUEST_URI'];
                      
                     ?>
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

				<li class="nav-item menu-open">
					<a href="{{route('dashboard.index')}}" class="nav-link {{($endurl =='dashboard') ? 'active' : '' }} ">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard 
						</p>
					</a>

				</li>
		        <li class="nav-item menu-open">
					<a href="{{ route('users.index') }}" class="nav-link {{($endurl =='users') ? 'active' : '' }}">
						<i class="nav-icon fas fa-user-alt"></i>
						<p>
							Users
						</p>
					</a>

				</li>
				
			
			 <li class="nav-item {{( (stripos($url, 'master-categories' )!==false)  || (stripos($url, 'categories' )!==false) || (stripos($url, 'categories' )!==false) ) ? 'menu-is-opening menu-open' : '' }}">
				<a href="#" class="nav-link ( (stripos($url, 'master-categories' )!==false)  || (stripos($url, 'categories' )!==false) || (stripos($url, 'categories' )!==false) ) ? 'active' : '' }}">
					<!--<i class="nav-icon fas fa-copy"></i>-->
					<i class="nav-icon fas fa-layer-group"></i>
					<p>
							Manage Categories
						<i class="fas fa-angle-left right"></i>
						
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="{{route('master-categories.index')}}" class="nav-link {{($endurl =='master-categories') ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>Master Categories</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{route('categories.index')}}" class="nav-link {{($endurl =='categories') ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>Categories</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{route('sub-categories.index')}}" class="nav-link {{($endurl =='sub-categories') ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>Sub Category</p>
						</a>
					</li>
					
				</ul>
			</li>
			
			<li class="nav-item {{( (stripos($url, 'brands' )!==false) || (stripos($url, 'products' )!==false) || (stripos($url, 'sizes' )!==false) || (stripos($url, 'colors' )!==false) ) ? 'menu-is-opening menu-open' : '' }}">
				<a href="#" class="nav-link {{( (stripos($url, 'brands' )!==false) || (stripos($url, 'products' )!==false) || (stripos($url, 'sizes' )!==false) || (stripos($url, 'colors' )!==false) ) ? 'active' : '' }}">
					<i class="nav-icon fas fa-copy"></i>
					<p>
							Manage Products
						<i class="fas fa-angle-left right"></i>
						
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="{{route('brands.index')}}" class="nav-link {{(stripos($url, 'brands' )!==false) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>Brands</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{route('colors.index')}}" class="nav-link {{(stripos($url, 'colors' )!==false) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>Colors</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{route('sizes.index')}}" class="nav-link {{(stripos($url, 'sizes' )!==false) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>Size</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{route('products.index')}}" class="nav-link {{(stripos($url, 'products' )!==false) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>Products</p>
						</a>
					</li>
				
					
					
				</ul>
			</li>
			 <li class="nav-item menu-open">
					<a href="{{route('orders.index')}}" class="nav-link {{($endurl =='orders') ? 'active' : '' }}">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Orders
						</p>
					</a>

				</li>
					 
				<li class="nav-item menu-open">
					<a href="{{route('coupons.index')}}" class="nav-link {{($endurl =='coupons') ? 'active' : '' }}">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Coupons
						</p>
					</a>

				</li>
				<li class="nav-item menu-open">
					<a href="{{route('all-notifications')}}" class="nav-link {{($endurl =='all-notifications') ? 'active' : '' }}">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Notifications
						</p>
					</a>
				</li>
				
					<li class="nav-item {{( (stripos($url, 'aboutus' )!==false) || (stripos($url, 'contactus' )!==false) || (stripos($url, 'returns-exchanges' )!==false) || (stripos($url, 'shipping-delivery' )!==false) || (stripos($url, 'terms-conditions' )!==false) ) ? 'menu-is-opening menu-open' : '' }}">
				<a href="#" class="nav-link {{( (stripos($url, 'aboutus' )!==false) || (stripos($url, 'contactus' )!==false) || (stripos($url, 'returns-exchanges' )!==false) || (stripos($url, 'shipping-delivery' )!==false) || (stripos($url, 'terms-conditions' )!==false) ) ? 'active' : '' }}">
					<i class="nav-icon fas fa-copy"></i>
					<p>
							Manage Pages
						<i class="fas fa-angle-left right"></i>
						
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="{{route('aboutus.index')}}" class="nav-link {{(stripos($url, 'aboutus' )!==false) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>About us</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{route('contactus.index')}}" class="nav-link {{(stripos($url, 'contactus' )!==false) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>Contact us</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{route('terms-conditions.index')}}" class="nav-link {{(stripos($url, 'terms-conditions' )!==false) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>Terms and conditions</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{route('returns-exchanges.index')}}" class="nav-link {{(stripos($url, 'returns-exchanges' )!==false) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>Returns and exchanges</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{route('shipping-delivery.index')}}" class="nav-link {{(stripos($url, 'shipping-delivery' )!==false) ? 'active' : '' }}">
							<i class="far fa-circle nav-icon"></i>
							<p>Shipping and delivery</p>
						</a>
					</li>
				
					
					
				</ul>
			</li>
			
			
				<!--<li class="nav-item">-->
				<!--	<a href="{{route('coupons.index')}}" class="nav-link {{($url =='coupons') ? 'active' : '' }}">-->
				<!--		<i class="far fa-circle nav-icon"></i>-->
				<!--		<p>Coupons</p>-->
				<!--	</a>-->
				<!--</li>-->
			<!-- 	<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="nav-icon fas fa-copy"></i>
					<p>
						Setting
						<i class="fas fa-angle-left right"></i>
						
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Panel Setting</p>
						</a>
					</li>
				
					<li class="nav-item">
						<a href="" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Api Keys</p>
						</a>
					</li>
					
				</ul>
			</li> -->
				<!-- <li class="nav-item">
				<a href="#" class="nav-link">
					<i class="nav-icon fas fa-chart-pie"></i>
					<p>
						Charts
						<i class="right fas fa-angle-left"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="pages/charts/chartjs.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>ChartJS</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/charts/flot.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Flot</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/charts/inline.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Inline</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/charts/uplot.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>uPlot</p>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="nav-icon fas fa-tree"></i>
					<p>
						UI Elements
						<i class="fas fa-angle-left right"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="pages/UI/general.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>User</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/UI/icons.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Icons</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/UI/buttons.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Buttons</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/UI/sliders.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Sliders</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/UI/modals.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Modals & Alerts</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/UI/navbar.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Navbar & Tabs</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/UI/timeline.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Timeline</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/UI/ribbons.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Ribbons</p>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="nav-icon fas fa-edit"></i>
					<p>
						Forms
						<i class="fas fa-angle-left right"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="pages/forms/general.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>General Elements</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/forms/advanced.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Advanced Elements</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/forms/editors.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Editors</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/forms/validation.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Validation</p>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="nav-icon fas fa-table"></i>
					<p>
						Tables
						<i class="fas fa-angle-left right"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="pages/tables/simple.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Simple Tables</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/tables/data.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>DataTables</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/tables/jsgrid.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>jsGrid</p>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-header">EXAMPLES</li>
			<li class="nav-item">
				<a href="pages/calendar.html" class="nav-link">
					<i class="nav-icon far fa-calendar-alt"></i>
					<p>
						Calendar
						<span class="badge badge-info right">2</span>
					</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="pages/gallery.html" class="nav-link">
					<i class="nav-icon far fa-image"></i>
					<p>
						Gallery
					</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="pages/kanban.html" class="nav-link">
					<i class="nav-icon fas fa-columns"></i>
					<p>
						Kanban Board
					</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="nav-icon far fa-envelope"></i>
					<p>
						Mailbox
						<i class="fas fa-angle-left right"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="pages/mailbox/mailbox.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Inbox</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/mailbox/compose.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Compose</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/mailbox/read-mail.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Read</p>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="nav-icon fas fa-book"></i>
					<p>
						Pages
						<i class="fas fa-angle-left right"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="pages/examples/invoice.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Invoice</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/examples/profile.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Profile</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/examples/e-commerce.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>E-commerce</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/examples/projects.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Projects</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/examples/project-add.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Project Add</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/examples/project-edit.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Project Edit</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/examples/project-detail.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Project Detail</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/examples/contacts.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Contacts</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/examples/faq.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>FAQ</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/examples/contact-us.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Contact us</p>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="nav-icon far fa-plus-square"></i>
					<p>
						Extras
						<i class="fas fa-angle-left right"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>
								Login & Register v1
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="pages/examples/login.html" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Login v1</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="pages/examples/register.html" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Register v1</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="pages/examples/forgot-password.html" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Forgot Password v1</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="pages/examples/recover-password.html" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Recover Password v1</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>
								Login & Register v2
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="pages/examples/login-v2.html" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Login v2</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="pages/examples/register-v2.html" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Register v2</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="pages/examples/forgot-password-v2.html" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Forgot Password v2</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="pages/examples/recover-password-v2.html" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Recover Password v2</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="pages/examples/lockscreen.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Lockscreen</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/examples/legacy-user-menu.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Legacy User Menu</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/examples/language-menu.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Language Menu</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/examples/404.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Error 404</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/examples/500.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Error 500</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/examples/pace.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Pace</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/examples/blank.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Blank Page</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="starter.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Starter Page</p>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="nav-icon fas fa-search"></i>
					<p>
						Search
						<i class="fas fa-angle-left right"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="pages/search/simple.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Simple Search</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="pages/search/enhanced.html" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Enhanced</p>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-header">MISCELLANEOUS</li>
			<li class="nav-item">
				<a href="iframe.html" class="nav-link">
					<i class="nav-icon fas fa-ellipsis-h"></i>
					<p>Tabbed IFrame Plugin</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="https://adminlte.io/docs/3.1/" class="nav-link">
					<i class="nav-icon fas fa-file"></i>
					<p>Documentation</p>
				</a>
			</li>
			<li class="nav-header">MULTI LEVEL EXAMPLE</li>
			<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="fas fa-circle nav-icon"></i>
					<p>Level 1</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="nav-icon fas fa-circle"></i>
					<p>
						Level 1
						<i class="right fas fa-angle-left"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Level 2</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>
								Level 2
								<i class="right fas fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="far fa-dot-circle nav-icon"></i>
									<p>Level 3</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="far fa-dot-circle nav-icon"></i>
									<p>Level 3</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="far fa-dot-circle nav-icon"></i>
									<p>Level 3</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>Level 2</p>
						</a>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="fas fa-circle nav-icon"></i>
					<p>Level 1</p>
				</a>
			</li>
			<li class="nav-header">LABELS</li>
			<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="nav-icon far fa-circle text-danger"></i>
					<p class="text">Important</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="nav-icon far fa-circle text-warning"></i>
					<p>Warning</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="nav-icon far fa-circle text-info"></i>
					<p>Informational</p>
				</a>
			</li> -->
		</ul>
	</nav>

</div>
</aside>

