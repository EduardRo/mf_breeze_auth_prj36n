@extends('layout.menu')
@section('content')
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="showimages"></div>
                </div>
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h6 class="text-white">Anunt Job</h6>
                        </div>
                        <div class="card-body">
                            <form class="image-upload" method="post" action="/job/store"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    @if ($errors->any())
                                    
                                    <div class="alert alert-danger">
                                        <p>Campuri obligatorii nu au fost competate corect:</p>
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                    </div>
                                    @endif

                                    <label>Company Id: {{ $company_id }}</label>
                                    <input type="text" value={{ $company_id }} name="title" class="form-control" hidden />
                                </div>
                                <div class="form-group">

                                    <label>Company_name: {{ $company_name }} </label>
                                </div>
                                <div class="form-group">
                                    <label>Denumire pozitie</label>
                                    <input type="text" name="job_name" class="form-control" />
                                </div>

                                
                                <div class="form-group">
                                    <label>Tip job</label>
                                    <input type="text" name="job_type" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Nivel de pregatire</label>
                                    <input type="text" name="job_level" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Descriere job</label>
                                    <textarea name="job_description" rows="15" cols="40"
                                        class="form-control tinymce-editor"></textarea>
                                        @if($errors->has('job_description'))
                                        <span class="text-danger">{{ $errors->first('job_description') }}</span>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <label>Responsabilitati</label>
                                    <textarea name="job_responsabilities" rows="15" cols="40"
                                        class="form-control tinymce-editor"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Pregatire</label>
                                    <textarea name="job_skills" rows="15" cols="40"
                                        class="form-control tinymce-editor"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Abilitati dorite dar neobligatorii</label>
                                    <textarea name="job_things_nice_to_have" rows="15" cols="40"
                                        class="form-control tinymce-editor"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Ce oferim</label>
                                    <textarea name="job_offer" rows="15" cols="40"
                                        class="form-control tinymce-editor"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Email de contact</label>
                                    <input type="text" name="email" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Telefon de contact</label>
                                    <input type="text" name="phone" class="form-control" />
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
            CKEDITOR.replace('job_description');
            CKEDITOR.replace('job_responsabilities');
            CKEDITOR.replace('job_offer');
            CKEDITOR.replace('job_things_nice_to_have');
            CKEDITOR.replace('job_skills');

        </script>
    </body>



@endsection
