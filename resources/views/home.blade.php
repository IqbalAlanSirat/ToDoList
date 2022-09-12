@extends('layouts.layout')

@section('content')
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row d-flex justify-content-center">

        <div class="col-xl-8 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">To Do List</h6>
                </div>

                <div class="card-body">

                    <div class="AddButton">
                        <span data-toggle="modal" data-target="#addModal">
                            <button id="example" class="btn btn-primary btn-circle" data-toggle="tooltip" data-placement="top" title="Add">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </span>
                    </div>

                    <div class="Table">
                        
                        <table class="table table-hover" id="ToDoListTable">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No.</th>
                                    <th>To Do List</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>

                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formNewTask">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New To Do List</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        Subject :
                        <input type="text" class="form-control" name="Subject" id="Subject" required="true">
                        <div class="invalid-feedback">
                            This field is required.
                        </div>
                    </div>
                    <br>
                    <div class="col">
                        Description :
                        <textarea class="form-control" name="Description" id="Description" required="true"></textarea>
                        <div class="invalid-feedback">
                            This field is required.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="addList">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="#" method="POST">
        @method('DELETE')
        @csrf
        <div class="modal-header">
            <h5 class="modal-title">Delete To Do List</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p class="text-center text-secondary">Are you sure?</p>
            <input type="hidden" id="iddeletetask" name="id" value="">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" id="delete">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="doneModal" tabindex="-1" aria-labelledby="doneModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formDoneTask">
        <div class="modal-header">
            <h5 class="modal-title">Done To Do List</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p class="text-center text-secondary">Are you done?</p>
            <input type="hidden" id="iddonetask" name="id" value="">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" id="done">Done</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEditTask">
                <div class="modal-header">
                    <h5 class="modal-title">Edit To Do List</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col">
                        Subject :
                        <input type="text" class="form-control" name="Subject" id="editSubject" required="true">
                        <div class="invalid-feedback">
                            This field is required.
                        </div>
                    </div>
                    <br>
                    <div class="col">
                        Description :
                        <textarea class="form-control" name="Description" id="editDescription" required="true"></textarea>
                        <div class="invalid-feedback">
                            This field is required.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="idTask" id="idTask" value="">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="editList">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- The Modal -->
    <script type="text/javascript">
        $(function () {
            var table = $('#ToDoListTable').DataTable({
                        searching: false,
                        lengthChange: false,
                        processing: true,
                        serverSide: true,
                        ajax: '{{ route('ListToDoList') }}',
                        columns: [
                                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                                { data: 'Task', name: 'Task', orderable: false, searchable: false},
                                { data: 'Status', name: 'Status',  orderable: false, searchable: false},
                                { data: 'Action', name: 'Action', orderable: false, searchable: false}
                            ]
                        });
            table.on('draw.dt', function() {
                $('[data-toggle="tooltip"]').tooltip();
                $(".btn-edit").hover(function(){
                    $(this).addClass("btn-warning");
                    }, function(){
                    $(this).removeClass("btn-warning");
                });

                $(".btn-delete").hover(function(){
                    $(this).addClass("btn-danger");
                    }, function(){
                    $(this).removeClass("btn-danger");
                });

                $(".btn-done").hover(function(){
                    $(this).addClass("btn-success");
                    }, function(){
                    $(this).removeClass("btn-success");
                });
            });
            $('[data-toggle="tooltip"]').tooltip()

            $('#addList').click(function(){
                let err = 'No';
                let sub = document.getElementById("Subject").value;
                let des = document.getElementById("Description").value;
                if (sub == '') {
                    $( "#Subject" ).addClass( "is-invalid" );
                    err = 'Yes';
                }
                if (des == '') {
                    $( "#Description" ).addClass( "is-invalid" );
                    err = 'Yes';
                }
                if (err == 'No') {
                    // e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url:"{{route('NewTask')}}",
                        method: 'post',
                        data:{
                            Sub: sub,
                            Des: des
                        },
                        success: function(data){
                            if (data.alert == 'success') {
                                table.draw();
                                toastr.success('New Task has added');
                                console.log(data);
                                $('#addModal').modal('toggle');
                            }
                        }
                    });
                }else{
                    toastr.error('Something went wrong');
                }
            });

            $('#editList').click(function(){
                let err = 'No';
                let sub = document.getElementById("editSubject").value;
                let des = document.getElementById("editDescription").value;
                let id = document.getElementById("idTask").value;
                if (sub == '') {
                    $( "#Subject" ).addClass( "is-invalid" );
                    err = 'Yes';
                }
                if (des == '') {
                    $( "#Description" ).addClass( "is-invalid" );
                    err = 'Yes';
                }
                if (err == 'No') {
                    // e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url:"{{route('EditTask')}}",
                        method: 'post',
                        data:{
                            Sub: sub,
                            Des: des,
                            id: id
                        },
                        success: function(data){
                            if (data.alert == 'success') {
                                table.draw();
                                toastr.success('Task has been edited');
                                console.log(data);
                                $('#editModal').modal('toggle');
                            }
                        }
                    });
                }else{
                    toastr.error('Something went wrong');
                }
            });

            $('#done').click(function(){
                let id = document.getElementById("iddonetask").value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:"{{route('DoneTask')}}",
                    method: 'post',
                    data:{
                        id: id
                    },
                    success: function(data){
                        if (data.alert == 'success') {
                            table.draw();
                            toastr.success('Task has done');
                            $('#doneModal').modal('toggle');
                        }
                    }
                });
                
            });

            $('#delete').click(function(){
                let id = document.getElementById("iddeletetask").value;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:"{{route('DeleteTask')}}",
                    method: 'delete',
                    data:{
                        id: id
                    },
                    success: function(data){
                        if (data.alert == 'success') {
                            table.draw();
                            toastr.success('Task has deleted');
                            $('#deleteModal').modal('toggle');
                        }
                    }
                });
                
            });
        });
        
        $('#doneModal').on('show.bs.modal', function(event) {
            var span = $(event.relatedTarget);
            var IdTask = span.data("idtask");
            var modal = $(this);
            modal.find("#iddonetask").val(IdTask);
        });
        $('#editModal').on('show.bs.modal', function(event) {
            var span = $(event.relatedTarget);
            var Sub = span.data("sub");
            var Des = span.data("des");
            var IdTask = span.data("idtask");
            var modal = $(this);
            modal.find("#editSubject").val(Sub);
            modal.find("#editDescription").val(Des);
            modal.find("#idTask").val(IdTask);
        });
        $('#deleteModal').on('show.bs.modal', function(event) {
            var span = $(event.relatedTarget);
            var IdTask = span.data("idtask");
            var modal = $(this);
            modal.find("#iddeletetask").val(IdTask);
        });
        $('#addModal').on('hidden.bs.modal', function () {
            $('#addModal form')[0].reset();
            $( "#Subject" ).removeClass( "is-invalid" );
            $( "#Description" ).removeClass( "is-invalid" );
        });
    </script>

@endsection
