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

                        <center><h2> Add Product </h2></center>
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


                 <form class="form-horizontal" method="post"  action="{{url('/admin/add_Product')}}" enctype="multipart/form-data">

                 <div class="form-group">
                        <label for="text1" class="control-label col-lg-4">Product Name</label>

                        <div class="col-lg-8">
                            <input id="limiter-text" type="text" id="text1" name="name" value="" placeholder="e.g Studios Website " class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-4">Product Price</label>

                        <div class="col-lg-8">
                            <input type="number" id="text1" name="price" value="" placeholder="e.g 12500" class="form-control" />
                        </div>
                    </div>

                    {{-- Varaitions Available --}}
                    {{-- <div class="form-group">
                        <label for="text1" class="control-label col-lg-4">Variations</label>

                        <div class="col-lg-8">


                                <table class="table table-bordered" id="dynamicAddRemoves">
                                    <tr>
                                        <th>Variations</th>
                                        <th>Action</th>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <div class="col-lg-4">
                                                    <input type="text" name="addVariations[0][title]" placeholder="Variation" class="form-control" />
                                                </div>
                                                <div class="col-lg-4">
                                                    <input type="text" name="addVariations[0][key]" placeholder="Key" class="form-control" />
                                                </div>
                                                <div class="col-lg-4">
                                                    <input type="text" name="addVariations[0][value]" placeholder="Value" class="form-control" />
                                                </div>
                                                <br><br>
                                                <div class="col-lg-12">
                                                    <select name="addVariations[0][image]"  data-placeholder="Choose Image" class="form-control chzn-select" tabindex="2">
                                                        <br><br>
                                                        <option value="0"></option>
                                                        <?php $Photos = DB::table('photos')->get(); ?>
                                                        @foreach($Photos as $photos)
                                                            <option value="{{$photos->name}}">
                                                                <a  href="{{$photos->name}}">{{$photos->name}}</a>
                                                            </option>

                                                        @endforeach
                                                    </select>



                                                </div>
                                            </div>
                                        </td>
                                        <td><button type="button" name="add" id="dynamic-ars" class="btn btn-outline-primary">Add Variation</button></td>
                                    </tr>
                                </table>


                        </div>
                    </div> --}}



                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-4">Product Web Code</label>

                        <div class="col-lg-8">
                            <input type="text" id="text1" name="code" value="" placeholder="e.g REALES2019 " class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="limiter" class="control-label col-lg-4">Meta Data</label>

                        <div class="col-lg-8">
                            <textarea id="limiter" name="meta" class="form-control"></textarea>
                            <p class="help-block">Brief Description of the product for SEO</p>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="limiter" class="control-label col-lg-4">Youtube iFrame</label>

                        <div class="col-lg-8">
                            <textarea id="liamiter" name="iframe" class="form-control"></textarea>
                            <p class="help-block">bnfse4NXo0k</p>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-lg-4">Google Product Category</label>

                        <div class="col-lg-8">
                            <select name="google_product_category" data-placeholder="Choose Category" class="form-control chzn-select" tabindex="2">

                               <?php $TheCategoryList = DB::table('g_p_c_s')->get(); ?>
                               @foreach($TheCategoryList as $value)
                                  <option value="{{$value->code}}">{{$value->category}} - {{$value->code}}</option>
                               @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-lg-4">Category</label>




                    <div class="col-lg-8">
                        <select name="cat" id="cat" data-placeholder="Choose Category" class="form-control chzn-select" tabindex="2">
                            <option  value="{{$value->id}}" selected>Select Category</option>
                            <?php $TheCategoryList = DB::table('category')->get(); ?>
                           @foreach($TheCategoryList as $value)
                              <option value="{{$value->id}}">{{$value->cat}}</option>
                           @endforeach

                        </select>
                    </div>
                    </div>



                   <div class="form-group">
                        <label class="control-label col-lg-4">Sub Category</label>




                        <div class="col-lg-8">
                            <select name="sub_cat" id="sub_cat"  data-placeholder="Choose Sub Category" class="form-control" tabindex="2">



                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-4">Tags</label>




                        <div class="col-lg-8">
                            <select name="tag" data-placeholder="Choose tag" class="form-control chzn-select" tabindex="2">

                               <?php $TheCategoryList = DB::table('tags')->get(); ?>
                               @foreach($TheCategoryList as $value)
                                  <option value="{{$value->id}}">{{$value->title}}</option>
                               @endforeach

                            </select>
                        </div>
                        </div>


                    <!-- Brands -->

                    <div class="form-group">
                    <label class="control-label col-lg-4">Brand</label>




                    <div class="col-lg-8">
                        <select name="brand" data-placeholder="Choose Sub Category" class="form-control chzn-select" tabindex="2">


                           <?php $ThebrandList = DB::table('brands')->get(); ?>
                           @foreach($ThebrandList as $brandvalue)
                              <option value="{{$brandvalue->name}}">{{$brandvalue->name}}</option>
                           @endforeach

                        </select>
                    </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-4">Combo</label>

                        <div class="col-lg-8">
                        <div class="make-switch" data-on="success" data-off="danger">

                                    <input name="combo" type="checkbox" />
                                </div>
                        </div>
                    </div>
                    <!-- Brands -->

                    {{-- Has Variatis --}}
                    <div class="form-group">
                        <label class="control-label col-lg-4">Has Variants</label>

                        <div class="col-lg-8">
                            <div class="make-switch" data-on="success" data-off="danger">
                                <input name="has_variants" type="checkbox"  />
                            </div>
                        </div>
                    </div>
                    {{-- Has Variants --}}



                        <textarea name="content" id="article_ckeditor" rows="10" cols="80"></textarea>

                        <script src="https://amanivehiclesounds.co.ke/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
                        <script>
                            CKEDITOR.replace( 'article_ckeditor' );
                        </script>
                        <br><br>
                        <div class="form-group">
                            <label for="limiter" class="control-label col-lg-4">What's in the Box</label>

                            <div class="col-lg-8">
                                <textarea  name="box" class="form-control"></textarea>
                                <p class="help-block">Brief Description whats in the box</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="limiter" class="control-label col-lg-4">Warranty Statement</label>

                            <div class="col-lg-8">
                                <textarea  name="warranty" class="form-control"></textarea>
                                <p class="help-block">Product Warranty</p>
                            </div>
                        </div>
                        <br><br>
                        {{-- Specs JSON --}}
                        <div class="container">
                            <table class="table table-bordered" id="dynamicAddRemove">
                                <tr>
                                    <th>Extras</th>
                                    <th>Action</th>
                                </tr>

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
                            </table>
                        </div>




                    <center>
                    <div class="form-group col-lg-12">
                    <div class="form-group col-lg-12">
                        <label class="control-label">Thumb(300 by 300)</label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input name="thumbnail" type="file" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-lg-12">
                        <label class="control-label">Facebook Pixels</label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn-file btn-primary"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input name="fb_pixels" type="file" /></span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>



                    </div>
                    </center>
                    <br><br>
                    <div class="col-lg-12 text-center">
                      <button type="submit" class="btn btn-success"><i class="icon-plus icon-white"></i> Add Product</button>
                    </div>


                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <br><br>

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

    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ars").click(function () {
            ++i;
            $("#dynamicAddRemoves").append('<tr><td><div class="form-group"><div class="col-lg-4"><input type="text" name="addVariations[' + i +
                '][title]" placeholder="Variation" class="form-control" /></div><div class="col-lg-4"><input type="text" name="addVariations[' + i +
                '][key]" placeholder="Key" class="form-control" /></div><div class="col-lg-4"><input type="text" name="addVariations[' + i +
                '][value]" placeholder="Price" class="form-control" /></div><div class="col-lg-12"> <select name="addVariations[0][image]" data-placeholder="Choose Image" class="form-control chzn-select" tabindex="2"> <br><br> <option value="0"></option> <?php $Photos = DB::table('photos')->get(); ?> @foreach($Photos as $photos) <option value="{{$photos->name}}"> <a href="{{$photos->name}}">{{$photos->name}}</a> </option> @endforeach </select> </div></div></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
                );
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).parents('tr').remove();
        });
    </script>


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





{{-- success: data => {
    data.sub_cats.forEach(sub_cats =>
        $('#sub_cat').append(`<option value="${sub_cats.id}">${sub_cats.name}</option>`)
    )
} --}}





@endsection
