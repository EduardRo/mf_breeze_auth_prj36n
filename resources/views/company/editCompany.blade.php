
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
                        <h6 class="text-white">Introduceti datele companiei</h6>
                    </div>
                    <div class="card-body">
                        <form class="image-upload" method="post" action="/company/update" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input name="id" value={{$company->id}} rows="15" cols="40" class="form-control" hidden/>
                                <input name="user_id" value={{$company->user_id}} rows="15" cols="40" class="form-control" hidden/>
                            </div>
                            <div class="form-group">
                                <label>Nume Companie:</label>
                                <input name="company_name" value={{$company->company_name}} rows="15" cols="40" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Registrul Comertului:</label>
                                <input name="company_regcom" value={{$company->company_regcom}} rows="15" cols="40" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Cod Fiscal:</label>
                                <input name="company_fiscalcode" value={{$company->company_fiscalcode}} rows="15" cols="40" class="form-control"/>
                            </div>
                            
                            <div class="form-group">
                                <label>Localitate:</label>
                                <input name="company_city" value={{$company->company_city}} rows="15" cols="40" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Adresa:</label>
                                <textarea name="company_address"  rows="5" cols="40" class="form-control tinymce-editor">{{$company->company_address}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Persoana Contact</label>
                                <input name="company_contact" value={{$company->company_contact}} rows="5" cols="40" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" name="company_email" value={{$company->company_email}} class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Telefon:</label>
                                <input type="text" name="company_phone" value={{$company->company_phone}} class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Nume Banca</label>
                                <input type="text" name="company_bank" value={{$company->company_bank}} class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>IBAN</label>
                                <input type="text" name="company_bank_account" value={{$company->company_bank_account}} class="form-control"/>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-danger btn-sm">Salveaza</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
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

@endsection
