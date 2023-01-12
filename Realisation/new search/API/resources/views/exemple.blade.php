@extends('master')
@section('exemple')
<body>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>{{__('message.title')}}</h1>
              </div>
              {{-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
    
                </ol>
              </div> --}}
            </div>
          </div>
        </section>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2>{{__('message.task')}}</h2></div>
    
                    </div>
                    <div class="col-sm-12 d-flex justify-content-between p-3">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('task.create') }}" class="btn btn-primary">{{__('message.+add task')}}</a>
    
    
                            {{-- <select class="btn btn-secondary dropdown-toggle ml-2" name="filter" id="filter">
                                <option value="">{{__('message.all_briefs')}}</option>
                                @foreach ($brief as $value)
                                <option value="{{$value->id}}">{{$value->Nom_du_brief}}</option>
                                @endforeach
                            </select> --}}
    
                        </div>
    
                        <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="text" class="form-control" id="searche" name="searche" >
                        </div>
                    </div>
                </div>
    <div class="mytable">
        <table class="table table-striped table-hover table-bordered">
          <thead>
              <tr>
                  <th>{{__('message.name')}}</th>
                  <th>{{__('message.duration')}}</th>
                  <th>{{__('message.actions')}}</th>
              </tr>
          </thead>
          <tbody >
              @foreach ($tache as $task )
              <tr>
                  <td>{{ $task->Nom_tache }}</td>
                  <td>{{ $task->Duree }}</td>
                  <td>
                      <a  href="{{ route('task.edit', $task->id)}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                      <form action="{{ route('task.destroy', $task->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button id="trash-icon">
                              <a  class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                          </button>
                      </form>
                  </td>
              </tr>
              @endforeach
    
          </tbody>
      </table>
      {!! $tache->links() !!}
    </div>
    
    
      <div class="d-flex justify-content-between">
         
          <div>
              <a href="{{route('generate')}}" class="btn btn-outline-secondary" >{{__('message.export_pdf')}}</a>
              <a href="/exportexcel" class="btn btn-outline-secondary" >{{__('message.export_excel')}}</a>
              <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal">
                {{__('message.import_excel')}}
                </button>
           </div>
    
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('message.modal_title')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="/importexcel" method="POST" enctype="multipart/form-data">
                  @csrf
    
                  <div class="modal-body">
                          <div class="form-group">
                              <input type="file" name="file" required>
                          </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('message.close_btn')}}</button>
                    <button type="submit" class="btn btn-primary">{{__('message.save')}}</button>
                  </div>
                </div>
              </form>
              </div>
            </div>
      </div>
    </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>

        $(document).on('keyup',function(e){
            e.preventDefault();
            let value=$('#searche').val();
            console.log(value);
            $.ajax({
                url:'{{route("search")}}',
                method:'GET',
                data:{'searchtask':value},
                success:function(data){
                    console.log(data);
                    $('.mytable').html(data);
                    if(data.status=='nothing_found'){
                        $('.mytable').html('<span class="text-danger">'+'not found'+'</span>');
                    }
                }
            });
        })
    </script>
</body>
@endsection
