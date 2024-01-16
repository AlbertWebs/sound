@extends('admin.masters')

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
                        <center><h2> Admin Dashboard </h2></center>
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
                   <!-- CHART & CHAT  SECTION -->

                 <!--END CHAT & CHAT SECTION -->
                 <!-- COMMENT AND NOTIFICATION  SECTION -->
                 {{--  --}}
                 <div class="container mt-2">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="mt-2 mb-2">Drag & Drop File Uploading</h1>

                            <form action="{{ route('dropzone.store') }}" method="post" enctype="multipart/form-data" id="image-upload" class="dropzone">
                                @csrf
                                <div>
                                    <h3>Drop Images Here</h3>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                        Dropzone.options.imageUpload = {
                            maxFilesize         :       1,
                            acceptedFiles: ".jpeg,.jpg,.png,.gif"
                        };
                </script>
                 {{--  --}}





            </div>

        </div>
        <!--END PAGE CONTENT -->

         <!-- RIGHT STRIP  SECTION -->
         @include('admin.right')
         <!-- END RIGHT STRIP  SECTION -->
    </div>

@endsection
