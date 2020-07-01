/*
var FormDropzone = function () {


    return {
        //main function to initiate the module
        init: function (div) {  
            Dropzone.autoDiscover = false;
            $(div).dropzone({
                acceptedFiles: $(div).data("accept"),
                maxFilesize:100,
                init: function() {
                    this.on("addedfile", function(file) {
                        // Create the remove button
                        var removeButton = Dropzone.createElement("<button class='btn_remove btn btn-sm btn-block'>Remove file</button>");
                        
                        // Capture the Dropzone instance as closure.
                        var _this = this;

                        // Listen to the click event
                        removeButton.addEventListener("click", function(e) {
                          // Make sure the button click doesn't submit the form:
                          e.preventDefault();
                          e.stopPropagation();

                          // Remove the file preview.
                          _this.removeFile(file);
                          // If you want to the delete the file on the server as well,
                          // you can do the AJAX request here.
                          onRemoveFileToServer(_this, this);
                        });

                        // Add the button to the file preview element.
                        file.previewElement.appendChild(removeButton);
                    });
                },
                success: function (file, response) {
                    if(response.status == false)
                    {
                      file.previewElement.classList.add("dz-error");
                    }
                    else
                    {
                      $(file.previewTemplate).find(".btn_remove").attr("data-id", response.id);
                      file.previewElement.classList.add("dz-success");
                    }
                },
                error: function (file, response) {
                    file.previewElement.classList.add("dz-error");
                }
            });
        }
    };
}();
*/
function initDropzone (div) {  
      Dropzone.autoDiscover = false;
      abc = new Dropzone(div, {
          acceptedFiles: $(div).data("accept"),
          maxFilesize:100,
          init: function() {
              this.on("addedfile", function(file) {
                  // Create the remove button
                  var removeButton = Dropzone.createElement("<button class='btn_remove btn btn-sm btn-block'>Remove file</button>");
                  
                  // Capture the Dropzone instance as closure.
                  var _this = this;

                  // Listen to the click event
                  removeButton.addEventListener("click", function(e) {
                    // Make sure the button click doesn't submit the form:
                    e.preventDefault();
                    e.stopPropagation();

                    // Remove the file preview.
                    _this.removeFile(file);
                    // If you want to the delete the file on the server as well,
                    // you can do the AJAX request here.
                    onRemoveFileToServer(_this, this);
                  });

                  // Add the button to the file preview element.
                  file.previewElement.appendChild(removeButton);
              });
          },
          success: function (file, response) {
              if(response.status == false)
              {
                file.previewElement.classList.add("dz-error");
              }
              else
              {
                $(file.previewTemplate).find(".btn_remove").attr("data-id", response.id);
                file.previewElement.classList.add("dz-success");
              }
          },
          error: function (file, response) {
              file.previewElement.classList.add("dz-error");
          }
      });
  }
function onRemoveFileToServer(zone, btn){
  link_remove = $(zone.element).data("remove");
  id = $(btn).data("id");
  if(id)
  {
    var data = $(zone.element).serializeArray();
    data.push({name: 'id', value: id});

    $.post( link_remove, data, function( data ) {
      console.log(data);
    });
  }
}