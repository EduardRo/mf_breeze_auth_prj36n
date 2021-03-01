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
                            <h6 class="text-white">Anunt Job</h6>
                        </div>
                        <div class="card-body">
                            <form class="image-upload" method="post" action="/job/store"
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
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript">
        </script>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script type="text/javascript">
            tinymce.init({
                selector: 'textarea.tinymce-editor',
                height: 100,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_css: '//www.tiny.cloud/css/codepen.min.css'
            });

        </script>
    </body>



@endsection
