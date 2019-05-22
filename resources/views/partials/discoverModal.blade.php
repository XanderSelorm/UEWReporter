<div class="modal fade " data-backdrop="static" data-keyboard="false"   id="discoverModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Discover Announcement Categories</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      @include('inc.messages')
      
      <div class="modal-body">
        
        @foreach ($categories as $category)
          <div class="media shadow border p-3 mb-3">
            <div class="col">
              <div class="media-heading row">
                  <a class="h4">{{$category->display_name}}</a>
                  <span class="ml-auto">
                    <button type="button" id="sendEmail" class="btn btn-primary btn-sm">Subscribe <i class="fa fa-rss"></i></button>
                  </span>
              </div>
              <div class="media-body row mt-3">
                <p>{{$category->description}}</p>
              </div>
            </div>
          </div>
        @endforeach 
        
      </div>

    </div>
  </div>

</div>

<script>
$(document).ready(function() {
  function sendEmail(callback) {
  callback();
}

$('#SendEmail').on('click', function() {
  //save this to var
  var thisContext = this;
  //console.log(thisContext);
  $('#sendEmail').html('wait <i class="fa fa-sync fa-spin"></i>');
  sendEmail(function() {
    callback("4", thisContext);
    console.log(thisContext);
  });
});

function callback(id, context) {
  console.log(id);
  var serverURL = "/echo/json/";
  $.ajax({
    url: serverURL,
    type: "POST",
    success: function(result) {
     
      setTimeout(function() {
        $('#sendEmail').removeClass('btn-primary').addClass('btn-success').html('Subscribed <i class="fa fa-check"></i>');
      }, 1000);
    },
    error: function(error) {
      $("#loading").hide();
    }
  });
};
});
</script>    