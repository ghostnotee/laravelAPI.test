@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload</div>
                    <div class="card-body">
                        <form role="form" class="form" onsubmit="return false;">
                            <div class="form-group">
                                <label for="uploadFile">Select File</label>
                                <input type="file" id="uploadFile" class="form-control">
                            </div>
                            <button type="submit" id="uploadBtn" class="btn btn-primary">Upload!</button>
                        </form>
                        <div id="output"></div>
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
                //uploadFile değişken ismi ile; uploadFile id'li elemandan gelen dosyanın 0'ıncı indexini gönderiyoruz.
                data.append('uploadFile', document.getElementById('uploadFile').files[0]);

                var config = {
                    headers: {'Content-Type': 'multipart/form-data'},
                    onUploadProgress: function (progressEvent) {
                        var percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                    }
                };

                axios.post('http://laravelapi.test/api/upload', data, config)
                    .then(function (res) {
                        output.innerHTML = res.data.url;
                    })
                    .catch(function (err) {
                        output.className = 'text-danger';
                        output.innerHTML = err.message;
                    });
            };
        })();
    </script>
@endsection
