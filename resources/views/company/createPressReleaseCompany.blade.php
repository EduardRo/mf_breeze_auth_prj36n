@extends('layout.menu')
@section('content')

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="showimages"></div>
                </div>
                <div class="col-md-6 offset-3 mt-5">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h6 class="text-white">Comunicat de presa nou</h6>
                        </div>
                        <div class="card-body">
                            <form class="image-upload" method="post" action="/pressrelease/store"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">

                                    <label>Company Id: {{ $company_id }}</label>
                                    <input type="text" value={{ $company_id }} name="title" class="form-control" hidden />
                                </div>
                                <div class="form-group">

                                    <label>Company_name: {{ $company_name }} </label>
                                </div>
                                <div class="form-group">
                                    <label>title</label>
                                    <input type="text" name="title" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label>Continut</label>
                                    <textarea name="text" rows="15" cols="40"
                                        class="form-control tinymce-editor"></textarea>
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Salveaza</button>
                                </div>

                                <div class="form-group">

                                    <input type="text" value={{ $company_id }} name="company_id" class="form-control"
                                        hidden />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('text');

        </script>
    </body>



@endsection
