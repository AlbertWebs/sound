@extends('admin.master')

@section('content')
<div id="wrap" >


        <!-- HEADER SECTION -->
        @include('admin.top')
        <!-- END HEADER SECTION -->



        <!-- MENU SECTION -->
        @include('admin.left')
        <!--END MENU SECTION -->



        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">

                        <center><h2> Edit Product </h2></center>

                    </div>
                </div>
                  <hr />
                 <!--BLOCK SECTION -->
                 <div class="row">
                    <div class="col-lg-12">
                        @include('admin.panel')

                    </div>

                </div>
                  <!--END BLOCK SECTION -->
                <hr />


                  <!-- Inner Content Here -->

            <div class="inner">


              <div class="row">
               <center>
                    @if(Session::has('message'))
                                <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif

                    @if(Session::has('messageError'))
                                <div class="alert alert-danger">{{ Session::get('messageError') }}</div>
                    @endif
                 </center>


                 <form class="form-horizontal" method="post"  action="{{url('/admin/edit_Variation')}}/{{$Variation->id}}" enctype="multipart/form-data">

                 <div class="form-group">
                        <label for="text1" class="control-label col-lg-4">Product Name</label>

                        <div class="col-lg-8">
                            <input autocomplete="off" id="limiter-text" type="text" id="text1" name="name" value="{{$Variation->name}}" placeholder="e.g Studios Website " class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="limiter" class="control-label col-lg-4">Meta Data</label>

                        <div class="col-lg-8">
                            <textarea id="limiter" name="meta" class="form-control">{{$Variation->meta}}</textarea>
                            <p class="help-block">Brief Description of the product for SEO</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="limiter" class="control-label col-lg-4">Youtube iFrame</label>

                        <div class="col-lg-8">
                            <textarea id="liamiter"  name="iframe" class="form-control">{{$Variation->iframe}}</textarea>
                            <p class="help-block">bnfse4NXo0k</p>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-4">Product Price</label>

                        <div class="col-lg-8">
                            <input type="text" name="price" value="{{$Variation->price}}" placeholder="{{$Variation->price}}" class="form-control" />
                        </div>
                    </div>






                     <div class="form-group">
                        <label for="text1" class="control-label col-lg-4">Product Web Code</label>

                        <div class="col-lg-8">
                            <input type="text" id="text1" name="code" value="{{$Variation->code}}" placeholder="e.g REALES2019 " class="form-control" />
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-lg-4">Google Product Category</label>
                        <?php
                            $CatID = $Parent->google_product_category;
                            $TheCategory = DB::table('g_p_c_s')->where('code',$CatID)->get();

                        ?>
                        <div class="col-lg-8">
                            <select name="google_product_category" data-placeholder="Choose Category" class="form-control chzn-select" tabindex="2">

                               <?php $TheCategoryList = DB::table('g_p_c_s')->get(); ?>
                               <option selected value="{{$Parent->google_product_category}}">@foreach($TheCategory as $valuee){{$valuee->category}} - {{$valuee->code}} @endforeach</option>
                               @foreach($TheCategoryList as $value)
                                  <option value="{{$value->code}}">{{$value->category}} - {{$value->code}}</option>
                               @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-4">Category</label>

                        <?php
                                $CatID = $Parent->cat;
                                $TheCategory = DB::table('category')->where('id',$CatID)->get();

                        ?>



                        <div class="col-lg-8">
                            <select name="cat" id="cat" data-placeholder="Choose Category" class="form-control chzn-select" tabindex="2">
                            <option selected="selected" value="{{$Parent->cat}}">@foreach($TheCategory as $valuee){{$valuee->cat}} @endforeach</option>
                            <?php $TheCategoryList = DB::table('category')->get(); ?>
                            @foreach($TheCategoryList as $value)
                                <option value="{{$value->id}}">{{$value->cat}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-4">Sub Category</label>


                        <?php
                                $CatID = $Parent->sub_cat;

                                $TheCategory = DB::table('sub_category')->where('id',$CatID)->get();
                        ?>

                        <div class="col-lg-8">
                            <select name="sub_cat" id="sub_cat"  data-placeholder="Choose Sub Category" class="form-control" tabindex="2">
                                <option selected="selected" value="{{$Parent->sub_cat}}">
                                    @foreach($TheCategory as $valuee)
                                        {{$valuee->name}}
                                    @endforeach
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-4">Tags</label>

                        <?php
                                $TagID = $Variation->tag;
                                $TheCategory = DB::table('tags')->where('id',$TagID)->get();

                        ?>



                        <div class="col-lg-8">
                            <select name="tag" data-placeholder="Choose tag" class="form-control chzn-select" tabindex="2">
                              <option selected="selected" value="{{$Variation->tag}}">@foreach($TheCategory as $valuee){{$valuee->title}} @endforeach</option>
                               <?php $TheCategoryList = DB::table('tags')->get(); ?>
                               @foreach($TheCategoryList as $value)
                                  <option value="{{$value->id}}">{{$value->title}}</option>
                               @endforeach

                            </select>
                        </div>
                        </div>


                    <div class="form-group">
                        <label class="control-label col-lg-4">Replaced With</label>





                        <div class="col-lg-8">
                            <select name="replaced" data-placeholder="Replaced With" class="form-control chzn-select" tabindex="2">
                              <?php
                                    $replacedvalue = $Variation->replaced;
                              ?>
                               @if($replacedvalue == 0)
                               <option selected="selected" value="0">
                                   None
                               </option>
                               @else
                               <option selected="selected" value="{{$replacedvalue}}">
                               <?php $ProductID = app\Product::find($replacedvalue) ?>
                               {{$ProductID->name}}
                               </option>
                               @endif


                               <?php $TheCategoryList = DB::table('product')->get(); ?>
                               @foreach($TheCategoryList as $value)
                                  <option value="{{$value->id}}">{{$value->name}}</option>
                               @endforeach

                            </select>
                        </div>
                        </div>



                    <!-- Brands -->

                    <div class="form-group">
                    <label class="control-label col-lg-4">Brand</label>




                    <div class="col-lg-8">
                        <select name="brand" data-placeholder="Choose Sub Category" class="form-control chzn-select" tabindex="2">
                           <option selected="selected" value="{{$Variation->brand}}">{{$Variation->brand}}</option>

                           <?php $ThebrandList = DB::table('brands')->get(); ?>
                           @foreach($ThebrandList as $brandvalue)
                              <option value="{{$brandvalue->name}}">{{$brandvalue->name}}</option>
                           @endforeach

                        </select>
                    </div>
                    </div>
                    <!-- Brands -->


                    <div class="form-group">
                        <label class="control-label col-lg-4">Combo</label>

                        <div class="col-lg-8">
                        <div class="make-switch" data-on="success" data-off="danger">
                                    <?php
                                       $Stock = $Variation->combo;
                                       if($Stock == '1'){
                                           $stockValue = 'checked';
                                       }else{
                                           $stockValue = 'Out of Stock';
                                       }
                                    ?>
                                    <input name="combo" type="checkbox" {{$stockValue}} />
                                </div>
                        </div>
                        </div>

                    <!-- Stock Control -->
                    <div class="form-group">
                    <label class="control-label col-lg-4">In stock</label>

                    <div class="col-lg-8">
                    <div class="make-switch" data-on="success" data-off="danger">
                                <?php
                                   $Stock = $Variation->stock;
                                   if($Stock == 'In Stock'){
                                       $stockValue = 'checked';
                                   }else{
                                       $stockValue = 'Out of Stock';
                                   }
                                ?>
                                <input name="stock" type="checkbox" {{$stockValue}} />
                            </div>
                    </div>
                    </div>



                        <textarea name="content" id="article_ckeditor" rows="10" cols="80">{{$Variation->content}}</textarea>

                        <script src="https://amanivehiclesounds.co.ke/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
                        <script>
                            CKEDITOR.replace( 'article_ckeditor' );
                        </script>
                          <br><br>
                        <div class="form-group">
                            <label for="limiter" class="control-label col-lg-4">What's in the Box</label>

                            <div class="col-lg-8">
                                <textarea  name="box" class="form-control">{{$Variation->box}}</textarea>
                                <p class="help-block">Brief Description whats in the box</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="limiter" class="control-label col-lg-4">Warranty Statement</label>

                            <div class="col-lg-8">
                                <textarea  name="warranty" class="form-control">{{$Variation->warranty}}</textarea>
                                <p class="help-block">Product Warranty</p>
                            </div>
                        </div>
                        <br><br>



                        {{--  --}}
                        <div class="container">
                            <table class="table table-bordered" id="dynamicAddRemove">
                                <tr>
                                    <th>Extras</th>
                                    <th>Action</th>
                                </tr>



                                @if($Variation->extras == null)
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div class="col-lg-6">
                                                <input type="text" name="addMoreInputFields[0][title]" placeholder="Feature e.g Bluetooth" class="form-control" />
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" name="addMoreInputFields[0][value]" placeholder="BT 2,0" class="form-control" />
                                            </div>
                                        </div>
                                    </td>
                                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Feature</button></td>
                                </tr>
                                @else

                                <?php $ExtraArray = json_decode($Variation->extras,JSON_UNESCAPED_SLASHES);  $CountArray = count($ExtraArray);  $init = 0;  ?>
                                @foreach ($ExtraArray as $key => $value)
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <div class="col-lg-6">
                                                <input type="text" name="addMoreInputFields[{{$init}}][title]" value="{{$value['title']}}" placeholder="Feature e.g Bluetooth" class="form-control" />
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="text" name="addMoreInputFields[{{$init}}][value]" value="{{$value['value']}}" placeholder="BT 2,0" class="form-control" />
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-danger remove-input-field">Delete</button>
                                    </td>
                                </tr>
                                <?php $init = $init+1;  ?>
                                @endforeach
                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                        <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Feature</button>
                                    </td>
                                </tr>
                                @endif



                            </table>
                        </div>




                    <center>
                    <div class="form-group col-lg-12">

                        <div class="form-group col-lg-12">
                            <label class="control-label">Facebook Pixels(1000px by 1000px)</label>
                            <div class="">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="{{url('/')}}/uploads/product/{{$Variation->fb_pixels}}" alt="" /></div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                    <div>
                                        <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input name="fb_pixels" type="file" /></span>
                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="form-group col-lg-12">
                        <label class="control-label">Thumbnail(300*300)</label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="{{url('/')}}/uploads/product/{{$Variation->thumbnail}}" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input name="thumbnail" type="file" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                    </center>
                    <br>
                    <div class="col-lg-12 text-center">
                      <button type="submit" class="btn btn-success"><i class="icon-check icon-white"></i> Save </button>
                      <a onclick="return confirm('Do you want to delete this product?')" href="{{url('/admin')}}/deleteVariation/{{$Variation->id}}" class="btn btn-danger"><i class="icon-trash icon-white"></i> Delete Variation</a>
                    </div>
                    <br>
                    <input type="hidden" name="image_one_cheat" value="{{$Variation->image_one}}">
                    <input type="hidden" name="fb_pixels_cheat" value="{{$Variation->fb_pixels}}">

                    <input type="hidden" name="thumbnail_cheat" value="{{$Variation->thumbnail}}">


                    <input type="hidden" name="image_two_cheat" value="{{$Variation->image_two}}">
                    <input type="hidden" name="image_three_cheat" value="{{$Variation->image_three}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <form>
              </div>

            </div>
                  <!-- Inner Content Ends Here -->




            </div>

        </div>
        <!--END PAGE CONTENT -->

         <!-- RIGHT STRIP  SECTION -->
        @include('admin.right')
         <!-- END RIGHT STRIP  SECTION -->
    </div>

    @if($Variation->extras == null)
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
            var i = 0;
            $("#dynamic-ar").click(function () {
                ++i;
                $("#dynamicAddRemove").append('<tr><td><div class="form-group"><div class="col-lg-6"><input type="text" name="addMoreInputFields[' + i +
                    '][title]" placeholder="Feature" class="form-control" /></div><div class="col-lg-6"><input type="text" name="addMoreInputFields[' + i +
                    '][value]" placeholder="value" class="form-control" /></div></div></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
                    );
            });
            $(document).on('click', '.remove-input-field', function () {
                $(this).parents('tr').remove();
            });
        </script>
    @else
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
            var i = {{$CountArray}};
            $("#dynamic-ar").click(function () {
                ++i;
                $("#dynamicAddRemove").append('<tr><td><div class="form-group"><div class="col-lg-6"><input type="text" name="addMoreInputFields[' + i +
                    '][title]" placeholder="Feature" class="form-control" /></div><div class="col-lg-6"><input type="text" name="addMoreInputFields[' + i +
                    '][value]" placeholder="value" class="form-control" /></div></div></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
                    );
            });
            $(document).on('click', '.remove-input-field', function () {
                $(this).parents('tr').remove();
            });
        </script>
    @endif

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        $(document).ready(function (e) {
            $('#cat').on('change', e => {
                var val = $('#cat').val();
                $('#sub_cat').empty()
                $.ajax({
                    url: `/admin/get-subcategories/${val}`,
                    success: function(data){
                            var toAppend = '';
                            $.each(data,function(i,o){
                            toAppend += '<option value="'+o.id+'">'+o.name+'</option>';

                        });
                        $('#sub_cat').append(toAppend);


                        }
                })
            })
        })
    </script>

{{--  --}}


@endsection
