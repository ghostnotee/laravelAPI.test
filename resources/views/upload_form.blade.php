@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload</div>
                    <div class="card-body">
                        <div id="output"></div>
                        <form role="form" class="form" onsubmit="return false;">
                            <div class="form-group">
                                <label for="uploadFile">Select File</label>
                                <input type="file" id="uploadFile" class="form-control">
                            </div>
                            <button type="submit" id="uploadBtn" class="btn btn-primary">Upload!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        (function () {
            var output = document.getElementById('output');
            document.getElementById('uploadBtn').onclick = function () {
                var data = new FormData();
                // userId değişken adıyla beraber 1 değerini gönderme.
                data.append('userId', '1');
                //uploadFile değişken ismi ile uploadFile id'li dosyayı gönderiyoruz.
                data.append('uploadFile', document.getElementById('uploadFile').files[0]);

                var config = {
                    onUploadProgress: function (progressEvent) {
                        var percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                    }
                };

                axios.put('/upload/server', data, config)
                    .then(function (res) {
                        output.className = 'container';
                        output.innerHTML = res.data;
                    })
                    .catch(function (err) {
                        output.className = 'container text-danger';
                        output.innerHTML = err.message;
                    });
            };
        })();
    </script>
@endsection
