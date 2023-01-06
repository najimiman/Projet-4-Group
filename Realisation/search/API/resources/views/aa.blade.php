<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>
<body>
    
    @if ($showinput)
    <input type="text" class="form-control input" id="searche"  value="{{$searchtask}}" >
    @endif
    <div class="mytable">
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th>{{__('message.name')}}</th>
                    <th>{{__('message.duration')}}</th>
                    <th>{{__('message.actions')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tache as $key=>$task )
                <tr>
                    <th>{{$key+1}}</th>
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
    <script>
    $(document).ready(function(){
        $(document).on('keyup',function(e){
            
            e.preventDefault();
            let value=$('#searche').val();
            console.log(value);
            $.ajax({
                url:"{{route('exemple')}}",
                method:'GET',
                data:{'searchtask':value},
                success:function(data){
                    // if(data){
                    //     var element =document.getElementById("searche");
                    //         element.classList.remove('input');
                    // }
                    console.log(data);
                    $('.mytable').html(data);
                    // $('.input').hide();
                    if(data.status=='nothing_found'){

                        $('.mytable').html('<span class="text-danger">'+'not found'+'</span>');
                    }
                }
            });
        })
    });
    </script>
</body>
</html>