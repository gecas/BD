<!DOCTYPE html>
<html>
<head>
  <title>Eshop | Admin</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/dropzone/dropzone.css">
  <link rel="stylesheet" type="text/css" href="/sweetalert/dist/sweetalert.css">
  <script src="https://code.jquery.com/jquery-2.2.1.js"></script>
  <style type="text/css">
    .dropzone{
      position: absolute;
    }
    .flash {
      background: #F6624A;
      color: #fff;
      width: 200px;
      position: fixed;
      right: 20px;
      bottom: 20px;
      padding: 1em;
      display: none;
     }
    .flash::after{
    content: '';
    position: absolute;
    left: -20px;
    top: 5px;
    border-left: 10px solid transparent;
    border-top: 10px solid transparent;
    border-right: 10px solid #F6624A;
    border-bottom: 10px solid transparent;
    } 
        </style>
</head>
<body style="padding-top: 70px;">
  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Admin panel</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/dashboard">Pradžia</a></li>
            <li><a href="/dashboard/products">Prekės</a></li>
            <li><a href="/dashboard/categories">Kategorijos</a></li>
            <li><a href="/dashboard/brands">Prekiniai ženklai</a></li>
        
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/activity/">Recent activity</a></li>
            <li><a href="/">Į puslapį</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  <div class="container">
    @yield('admin_content')
    </div>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.17/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.7.0/vue-resource.js"></script>
<script src="/dropzone/dropzone.js"></script>

<script>
  $(document).ready(function() {
   $(".nav li").click(function() {
      // remove classes from all
      $(".nav li").removeClass("active");
      // add class to the one we clicked
      $(this).addClass("active");
   });
  });
</script>

<script>
  Dropzone.options.myDropzone = {

  // Prevents Dropzone from uploading dropped files immediately
  autoProcessQueue: false,
  uploadMultiple: true,
  parallelUploads: 100,
  maxFiles: 100,
  acceptedFiles: "image/*",
  clickable: '#dropzonePreview',
  addRemoveLinks: true,
  previewsContainer: '#dropzonePreview',


  init: function() {
    var submitButton = document.querySelector("#submit-all")
        myDropzone = this; // closure

    submitButton.addEventListener("click", function() {
      if (myDropzone.getQueuedFiles().length > 0) {                        
            myDropzone.processQueue();  
        } else {                       
            $("#my-dropzone").submit(); //send empty 
        }  
      //myDropzone.processQueue(); // Tell Dropzone to process all queued files.
    });

    // You might want to show the submit button only when 
    // files are dropped here:
    this.on("successmultiple", function() {
      showMessage("", "Prekė išsaugota!", "success");
      setTimeout(function(){location.href = "/dashboard/products"}, 1500);
    });

  }
};
</script>

<script>
  $('#myProductDeleteModal').on('show.bs.modal', function (event) {
    var product_id = $(event.relatedTarget).attr("product-id");
    var input = $(this).find("#modal-product-delete-form").attr("action", "/dashboard/products/"+product_id);
  });
</script>

<script>
  $('#myCategoryDeleteModal').on('show.bs.modal', function (event) {
    var category_id = $(event.relatedTarget).attr("category-id");
    var input = $(this).find("#modal-category-delete-form").attr("action", "/dashboard/categories/"+category_id);
  });
</script>

<script>
  $('#myBrandDeleteModal').on('show.bs.modal', function (event) {
    var brand_id = $(event.relatedTarget).attr("brand-id");
    var input = $(this).find("#modal-brand-delete-form").attr("action", "/dashboard/brands/"+brand_id);
  });
</script>

<script src="/sweetalert/dist/sweetalert.min.js"></script>
<script src="/sweetalert/dist/sweetalert-dev.js"></script>
<script>
    function showMessage(title, message, type){
            swal({   
                title: title,   
                text: message,   
                type: type,   
                timer:1500,
                showConfirmButton:false
            });
        }

         function flashMessage(message){
             var block = document.createElement("div");
             $(block).addClass("flash").html(message);

             $("body").append(block);

             $(block).fadeIn(1000);
             setTimeout(function(){
                 $(block).fadeOut(1000, function(){
                     $(this).remove();
                 });
             }, 2000);
         }
    </script>
 @include ('flash')
</body>
</html>