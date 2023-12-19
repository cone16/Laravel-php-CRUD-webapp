@if ($dataArray === 'true')
    @extends('content')

    @section('messages')
        <div class="modal fade" data-bs-theme="dark" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="color: white">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Error: No entries selected</h5>
                        <button type="button" class="close bg-dark " data-dismiss="modal" aria-label="Close"
                            onclick="closeModal()"
                            style="border:solid; border-width: 1px; border-radius: 5px; color: rgb(178, 177, 177)">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Error: You have to check one, or some more entrys first. Please refresh the Page on the top menue
                        'Refresh Entrys' button and make one or more hooks.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                            onclick="closeModal()">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fügen Sie die Bootstrap- und jQuery-Links hier ein -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
        <script>
            // Öffnen Sie die Modal-Dialogbox, wenn die Seite geladen ist
            $(document).ready(function() {
                $('#exampleModalCenter').modal('show');
            });

            function closeModal() {
                $('#exampleModalCenter').modal('hide');
            }
        </script>
    @endsection
@endif
