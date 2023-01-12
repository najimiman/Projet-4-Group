@extends('master')
@section('pagination')
 <body>
  <br />
  <div class="container">
   <div class="row">
    <div class="col-md-9">

    </div>
    <div class="col-md-3">
     <div class="form-group">
      <input type="text" name="serach" id="serach" class="form-control" />
     </div>
    </div>
   </div>
   <div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
             <th>ID</th>
             <th>Title</th>
             <th>Description</th>
            </tr>
           </thead>
           <tbody>
            @include('pagination_data')
           </tbody>
          </table>
          <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
         </div>
        </div>
       </body>
      </html>
      
      <script>
      $(document).ready(function(){
 function fetch_data(page,query)
 {
  $.ajax({
   url:"/pagination/fetch_data?page="+page+"&query="+query,
   success:function(data)
   {
    // console.log(data);
    $('tbody').html('');
    $('tbody').html(data);
   }
  })
 }

 $(document).on('keyup', '#serach', function(){
  var query = $('#serach').val();
  var page = $('#hidden_page').val();
  fetch_data(page,query);
 });


$(document).on('click', '.pagination a', function(event){
 event.preventDefault();
 var page = $(this).attr('href').split('page=')[1];
 $('#hidden_page').val(page);
 var query = $('#serach').val();
 console.log(page);
 console.log(query);
 fetch_data(page,query);
 
//  var str = '/pagination/fetch_data?page=3'
//   var array = str.split("page=")[0];
//   console.log(array); 
});

});
</script>
@endsection