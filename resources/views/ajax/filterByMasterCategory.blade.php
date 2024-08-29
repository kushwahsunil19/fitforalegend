 <div class="sidebar-block filter-group-block open ">
                        <div class="sidebar-block_title">
                           <span>Categories</span>
                           <span class="toggle-arrow"><span></span><span></span></span>
                        </div>
                        <div class="sidebar-block_content">
                           <ul class="category-list">
                              @foreach($categories as  $category)
                              @if($master_category_id ==$category->master_category_id)
                              <li>
                                 <p  title="Casual" class="open cat-heading">{{$category->category_name}}</span></p>
                                 <div class="toggle-category js-toggle-category"><span><i class="icon-angle-down"></i></span></div>
                                 <ul class="category-list filterByMasterCategorty custom_checkbox" >
                                    @foreach($subcategories as $key => $subcategory)
                                    @if($subcategory->category->id ==$category->id)
                                    <li><a href="javascript:;" title="Men" class="open "  > <input id="subcategory{{$key}}" data-sub-id="{{ $subcategory->id }}" type="checkbox" class="sub_category_id" name="sub_category_id" value="{{ $subcategory->id }}" > <label for="subcategory{{$key}}"> {{ $subcategory->subcategory_name }} </label> </a></li>
                                    @endif
                                    @endforeach
                                    <!--   <li><a href="javascript:;" title="Women" class="open">Women's jeckets</a></li>
                                       <li><a href="javascript:;" title="Accessories" class="open">Kids's jeckets</a></li>  -->
                                 </ul>
                              </li>
                              @endif
                              @endforeach
                           </ul>
                        </div>
                     </div>