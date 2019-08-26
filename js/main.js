'use strict';

 function readFile(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
      reader.onload = function (e) {
        var filePreview = document.createElement('img');
        filePreview.id = 'file-preview';
        //e.target.result contents the base64 data from the image uploaded
        filePreview.src = e.target.result;
        var previewZone = document.getElementById('file-preview-zone');
        while (previewZone.firstChild) {
          previewZone.removeChild(previewZone.firstChild);
        }
        previewZone.appendChild(filePreview);
        document.getElementById('screenshot').value = e.target.result;
      } 
      //const fakePng = new Blob([input.files[0]], {type:'image/png'});
      reader.readAsDataURL(input.files[0]);
      //document.getElementById('screenshot').value = reader.result;
  }
}
 
  var fileUpload = document.getElementById('file-upload');
  fileUpload.onchange = function (e) {
    readFile(e.srcElement);
  }