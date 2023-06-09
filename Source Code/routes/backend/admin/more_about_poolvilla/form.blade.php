<!DOCTYPE html>
<html lang="en">
<head>
  @include('layout.style')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('ckeditor5/ckeditor.js')}}"></script>
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/inline/ckeditor.js"></script> --}}
</head>



<body>
  <div id="app">
    <div class="main-wrapper">
      @include('layout.nav')
      @include('layout.menu')
   <!-- Main Content -->
   <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Add - Edit More About Poolvilla</h1>
      </div>


   
      <div class="section-body ">      
        <div class="card " >
          <div class="row">
            <div class="col-12">     <label>More About Poolvilla</label></div>
     
          <div class="card-body p-0">
            <div class="col-12">
            <textarea class="text-tiny text-grey my-3 form-control" rows="10" style="height:100%">{{@$hotelEN->about}}</textarea>
            </div>
              
           
            

        
       
    
        

            <div class="col-12">     <label>เกี่ยวกับพูลวิลล่า</label></div>
     

            <div class="col-12">
            <textarea class="text-tiny text-grey my-3 form-control" rows="10" style="height:100%">{{@$hotelEN->about}}</textarea>
            </div>
              
        
        
            
            

        
       
          </div>
        

         
       
       
          </div>
        </div>
        <br>
      
        </div>

      @include('layout.footer')
    </div>
  </div>

  @include('layout.script')
  <script>
   	// DecoupledEditor
		// .create( document.querySelector( '#editor' ), {
    //   toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
		// } )
		// .then( editor => {
		// 	const toolbarContainer = document.querySelector( 'main .toolbar-container' );

		// 	toolbarContainer.prepend( editor.ui.view.toolbar.element );

		// 	window.editor = editor;
		// } )
		// .catch( err => {
		// 	console.error( err.stack );
		// } );
    function MyCustomUploadAdapterPlugin( editor ) {
    editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
        return new MyUploadAdapter( loader );
    };
}
    InlineEditor
            .create( document.querySelector( '#editor' ),{
              extraPlugins: [ MyCustomUploadAdapterPlugin ],

            } )
            .catch( error => {
                console.error( error );
            } );
</script>

  <script>
    $(document).ready(function() {
    $('.select_search').select2();
});
  function success_alert(){
    Swal.fire(
  'Success!',
  'Data is save!',
  'success'
)
  }
  </script>

</body>
</html>
