@extends('layout.menu')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="showimages"></div>
        </div>
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header bg-info">
                    <h6 class="text-white">Introduceti prezentarea companiei</h6>
                </div>
                <div class="card-body">
                    <form class="image-upload" method="post" action="/companypresentation/store" enctype="multipart/form-data">
                        @csrf
                        <input name="user_id"  value="{{$user_id}}" rows="15" cols="40" class="form-control" hidden/>
                        <input name="company_id"  value="{{$company_id}}" rows="15" cols="40" class="form-control" hidden />
                        
                        <div class="form-group">
                            <label>Nume Companie:</label>
                            <input name="company_name"  value="{{$company_name}}" rows="15" cols="40" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Descriere:</label>
                            <textarea name="company_description" rows="15" cols="40" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Servicii:</label>
                            <textarea name="company_services" rows="15" cols="40" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Management:</label>
                            <textarea name="company_management_team" value="10000" rows="15" cols="40" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Adresa:</label>
                            <textarea name="company_address" rows="15" cols="40" class="form-control"/></textarea>
                        </div>
                        <div class="form-group">
                            <label>Contact:</label>
                            <textarea name="company_contact" rows="5" cols="40" class="form-control tinymce-editor"></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Salveaza</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('company_description');
        CKEDITOR.replace('company_services');
        CKEDITOR.replace('company_management_team');
        CKEDITOR.replace('company_address');
        CKEDITOR.replace('company_contact');

    </script>

@endsection
