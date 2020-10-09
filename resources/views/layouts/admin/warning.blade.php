@push('scripts')

<script>
  swal({
 
  text: "Do you want to delete for this?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {

    swal("Success", {
                   
      icon: "success",
    });

  } else {
    swal("Your action is cancel!");
  }
});

</script>
@endpush