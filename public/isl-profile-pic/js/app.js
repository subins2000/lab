window.uploadPicture = function(callback, error) {
    cropper.getCroppedCanvas().toBlob(function (blob) {
        var formData = new FormData();

        formData.append('design', $('#fg').data('design'));
        formData.append('image', blob);

        var request = new XMLHttpRequest();
        request.open('POST', 'upload.php', true);

        request.onload = function() {
            if (this.status >= 200 && this.status < 400) {
                // Success!
                callback(this.response);
            } else {
                error();
            }
        };

        if (request.upload) {
            request.upload.addEventListener('progress', function(e) {
                if (e.lengthComputable) {
                    var max = e.total;
                    var current = e.loaded;

                    var percentage = Math.round((current * 100) / max);
                    document.getElementById('download').innerHTML = 'Uploading... Please Wait... ' + percentage + '%';
                }
            }, false);
        }

        request.onerror = error;

        request.send(formData);
    });
}

window.updatePreview = function(url) {
    if (typeof cropper === 'undefined') {
        $('#profile-pic').attr('src', url).attr('id', 'crop-img');
    } else {
        cropper.replace(url);
        return;
    }

    var showFG = function() {
        document.getElementById('fg').style.zIndex = 10;
    };

    window.cropper = new Cropper(document.getElementById('crop-img'), {
        'url': url,
        viewMode: 3,
        dragMode: 'move',
        cropBoxResizable: false,
        cropBoxMovable: false,
        minCropBoxWidth: $('#preview').width(),
        minCropBoxHeight: $('#preview').height(),
        background: false,
        guides: false,
        checkCrossOrigin: false
    });

    $(document).on('mouseover touchstart', function(e) {
        if ($('#fg').is(e.target)) {
            return;
        }

        if (!$('.cropper-crop-box').is(e.target) && $('.cropper-crop-box').has(e.target).length === 0) {
            document.getElementById('fg').style.zIndex = 10;
        }
    });

    $('#fg').on('mouseover click touchstart', function(e) {
        document.getElementById('fg').style.zIndex = -1;
    });

    $('#afterActions').show();

    document.getElementById('download').onclick = function() {
        this.innerHTML = 'Uploading... Please wait...';

        uploadPicture(
            function(r) {
                if (r === '') {
                    document.getElementById('download').innerHTML = 'Download Profile Picture';
                    alert('Some error happened. Reload page or use a different browser.');
                } else {
                    document.getElementById('download').innerHTML = 'Uploaded';
                    window.location = 'download.php?i=' + r;
                }
            }, function(){
                document.getElementById('download').innerHTML = 'Download Profile Picture';
            }
        );
    };
    document.getElementById('download').removeAttribute('disabled');
};

window.onFileChange = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            image = new Image();
            image.onload = function() {
                var width = this.width;
                var height = this.height;
                if (width >= 400 && height >= 400)
                    updatePreview(e.target.result);
                else
                    alert('Image should be atleast have 400px width and 400px height');
            };
            image.src = e.target.result;
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function() {
    $('.design').on('click', function() {
        $('#fg').attr('src', $(this).attr('src')).data('design', $(this).data('design'));
        $('.design.active').removeClass('active');
        $(this).addClass('active');
    });
});
