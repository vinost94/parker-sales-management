<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <!-- View Sales Team -->
        <div class="modal" id="viewModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="viewTitle"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body" id="viewBody">
                Loading..
              </div>
            </div>
          </div>
        </div>
        {{-- modal for create Sales Team --}}
        <div class="modal" id="createFormModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">New Sales Representative</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <form method="post" action="/sales-team" id="newform">
                  @csrf
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Full Name</label>
                                <input type="text" name="fullname" value="" required="" class="form-control editcontrol" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Email Address</label>
                                <input type="text" name="email" value="" required="" class="form-control editcontrol" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Telephone</label>
                                <input type="text" name="telephone" value="" required="" class="form-control editcontrol" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Current Route</label>
                                <select name="route_id" required="" class="form-control editcontrol" >
                                    @foreach(App\Models\Route::all() as $route)
                                    <option value="{{$route->id}}">{{$route->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Joined Date</label>
                                <input type="text" name="joined_at" value="{{date('Y-m-d')}}" required="" class="form-control datepicker" readonly="" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Comment</label>
                        <textarea class="form-control editcontrol" name="comment" required=""></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Create</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
        {{-- modal for update Sales Team --}}
        <div class="modal" id="editFormModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit Sales Representative</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              {{-- 'manager_id', 'fullname', '', '', '', '', '' --}}
              <form method="post" action="/sales-team">
                  @csrf
                <input type="hidden" name="_method" value="PUT" />
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">ID</label>
                                <input type="text" name="id" value="" readonly="" required="" class="form-control editcontrol" />
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="control-label">Full Name</label>
                                <input type="text" name="fullname" value="" required="" class="form-control editcontrol" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Email Address</label>
                                <input type="text" name="email" value="" required="" class="form-control editcontrol" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Telephone</label>
                                <input type="text" name="telephone" value="" required="" class="form-control editcontrol" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Current Route</label>
                                <select name="route_id" required="" class="form-control editcontrol" >
                                    @foreach(App\Models\Route::all() as $route)
                                    <option value="{{$route->id}}">{{$route->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Joined Date</label>
                                <input type="text" name="joined_at" value="" required="" class="form-control datepicker" readonly="" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Comment</label>
                        <textarea class="form-control editcontrol" name="comment" required=""></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
              </form>
            </div>
          </div>
        </div>


        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function(){
                @error('error')
                  __toast('error', '{{$message}}');
                @enderror
                @if(Session::has('message'))
                     __toast('success', '{{Session::get('message')}}');
                @endif
                $('.datepicker').datepicker({
                    // format: 'yyyy-mm-dd',
                    // endDate: '+1d'
                    dateFormat: "yy-mm-dd",
                    maxDate: 0,
                });
            });

            function __toast(type, message) {
                const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                })

                Toast.fire({
                  icon: type,
                  title: message
                })
                // alert(message);
            }
            {{-- get sales team by id --}}
            function getSalesTeam(id) {
                return new Promise((resolve, reject) => {
                    $.get(`/sales-team/${id}`)
                    .done((data) => {
                        resolve(data);
                    })
                    .fail((error) => {
                        reject(error);
                    });
                });
            }

            function viewSalesTeam(id) {
                $('#viewBody').html('Loading...');
                $('#viewTitle').html('');
                getSalesTeam(id)
                .then((data) => {
                    $('#viewTitle').html(data.fullname);
                    $('#viewBody').html(`
                        <table class="table-auto border-collapse border border-green-800 w-full">
                            <tr><th>ID:</th><td>${data.id}</td></tr>
                            <tr><th>Full Name:</th><td>${data.fullname}</td></tr>
                            <tr><th>Email Address:</th><td>${data.email}</td></tr>
                            <tr><th>Telephone:</th><td>${data.telephone}</td></tr>
                            <tr><th>Joined Date:</th><td>${data.joined_at}</td></tr>
                            <tr><th>Current Route:</th><td>${data.route.name}</td></tr>
                            <tr><th>Comments:</th><td>${data.comment}</td></tr>
                        </table>
                    `);
                })
                .catch((error) => {
                    __toast('error', error);
                    console.log(error)
                });
            }
            // edit sales team
            function editSalesTeam(id) {
                $('.editcontrol').val('');
                getSalesTeam(id)
                .then((data) => {
                    $('input[name="id"]').val(data.id);
                    $('input[name="fullname"]').val(data.fullname);
                    $('input[name="email"]').val(data.email);
                    $('input[name="telephone"]').val(data.telephone);
                    $('select[name="route_id"]').val(data.route_id);
                    $('input[name="joined_at"]').val(data.joined_at);
                    $('textarea[name="comment"]').val(data.comment);
                })
                .catch((error) => {
                    __toast('error', error);
                    console.log(error)
                });
            }
            {{-- delete sales team by id --}}
            function deleteSalesTeam(id) {
                Swal.fire({
                  title: 'Do you want to delete the sales team member?',
                  showDenyButton: true,
                  showCancelButton: true,
                  showConfirmButton: false,
                  // confirmButtonText: 'Delete',
                  denyButtonText: `Delete`,
                }).then((result) => {
                  /* Read more about isConfirmed, isDenied below */
                  if (result.isDenied) {
                    $.ajax({
                        type:'DELETE',
                        url:`/sales-team/${id}`,
                        beforeSend:function(){
                            $(`#row${id}`).css('background', 'pink');
                        },
                        success:function(data){
                            __toast('success', data.message);
                            $(`#row${id}`).remove();
                        },
                        error:function(xhr,status,error) {
                         // status+" "+xhr.status+" ("+error+")";
                            $(`#row${id}`).css('background', 'transparent');
                            __toast('error', 'Error occurred! Try Again');
                        }
                    });
                            
                  }
                })
            }

            function newform() {
                $('#newform')[0].reset();
            }
        </script>
    </body>
</html>
