var editorList = null;
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   Index.init();   
   Index.initDashboardDaterange();
   //Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Tasks.initDashboardWidget();
   ComponentsPickers.init();

   $('.delete_record').on('click', onDelete);
   $('.form_submit').bootstrapValidator().on('success.form.bv', bootstrapValidatorSubmit);
   $('.form_kpi').bootstrapValidator().on('success.form.bv', bootstrapValidatorSubmitKPI);

   $("#mask_date").inputmask("d/m/y", {
        "placeholder": "*"
    });
   $(".mask_date_m_y").inputmask("m/y", {
        "placeholder": "*"
    });
});

function onDelete(id, href)
{
  var status = confirm("Do you want to delete this record has ID " + id + "?");
  if(status)
  {
      location.href = href;
  }
}

function CKupdate(){
    for ( instance in CKEDITOR.instances )
        CKEDITOR.instances[instance].updateElement();
}

function bootstrapValidatorSubmit(e)
{
  CKupdate();
  
  e.preventDefault();
  if(editorList != null && editorList.length > 0)
  {
      editorList.forEach(function(entry) {
          $("#" + entry.k).val(entry.v.html());
      });
  }
  var $form = $(e.target);

  var formData = new FormData($form[0]);
  formData.append("submit", "submit");

  console.log(["bootstrapValidatorSubmit", $form.attr('action'), formData]);

  $.ajax({
      url: $form.attr('action'),
      type: 'POST',
      data: formData,
      cache: false,
      dataType: 'json',
      contentType: false,
      processData: false,
      mimeType:"multipart/form-data",
      timeout: 150000,
      async: true,
      headers: {
        "cache-control": "no-cache"
      },
      success: function (returndata) {
        console.log(returndata);
        if(returndata.status == "success")
        {
          setTimeout(function(){ location.href = returndata.link; }, 1000);
        }
        else
        {
          alert(returndata.message);
        }
        return "";
      },
      error: function(jqXHR, textStatus, errorThrown){
         
         if(!$(".pace").hasClass("pace-inactive"))
         {
            $(".pace").addClass("pace-inactive");
         }
         $(".pace").removeClass("pace-active");
         console.log("error. textStatus: %s  errorThrown: %s", textStatus, errorThrown);
          return alert("There was an error handling your request please try again.");
      },
      complete: function(jqXHR, textStatus) {
        return console.log("complete. textStatus: %s", textStatus);
      },
      xhr: function(){
          //upload Progress
          var xhr = $.ajaxSettings.xhr();
          if (xhr.upload) {
              xhr.upload.addEventListener('progress', function(event) {
                  var percent = 0;
                  var position = event.loaded || event.position;
                  var total = event.total;
                  if (event.lengthComputable) {
                      percent = Math.ceil(position / total * 100);
                  }
                  //console.log(percent);
                  //update progressbar
                  if(!$(".pace").hasClass("pace-active"))
                  {
                     $(".pace").addClass("pace-active");
                  }
                  $(".pace").removeClass("pace-inactive");
                  $(".pace-progress").css("width", + percent +"%");
              }, true);
          }
          return xhr;
      }
  });
}


function bootstrapValidatorSubmitKPI(e)
{
  e.preventDefault();

  var $form = $(e.target);
  var bv = $form.data('bootstrapValidator');

  var formData = new FormData($form[0]);
  //formData.append("submit", "submit");
  $.ajax({
      url: $form.attr('action'),
      type: 'POST',
      dataType: 'json',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      mimeType:"multipart/form-data",
      timeout: 15000,
      async: true,
      headers: {
        "cache-control": "no-cache"
      },
      success: function (returndata) {
         alert(returndata.message);
      },
      error: function(){
         alert('error!');
         if(!$(".pace").hasClass("pace-inactive"))
         {
            $(".pace").addClass("pace-inactive");
         }
         $(".pace").removeClass("pace-active");
      },
      xhr: function(){
          //upload Progress
          var xhr = $.ajaxSettings.xhr();
          if (xhr.upload) {
              xhr.upload.addEventListener('progress', function(event) {
                  var percent = 0;
                  var position = event.loaded || event.position;
                  var total = event.total;
                  if (event.lengthComputable) {
                      percent = Math.ceil(position / total * 100);
                  }
                  //console.log(percent);
                  //update progressbar
                  if(!$(".pace").hasClass("pace-active"))
                  {
                     $(".pace").addClass("pace-active");
                  }
                  $(".pace").removeClass("pace-inactive");
                  $(".pace-progress").css("width", + percent +"%");
              }, true);
          }
          return xhr;
      }
  });
}