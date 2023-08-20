<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <title>To Do List</title>

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    {{-- MDB --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.9.0/mdb.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>

<body class="bg-info">
    <div class="container w-25 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3>To-Do List</h3>
                <form action="{{route('store')}}" method="POST" autocomplete="off">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="content" class="form-control" placeholder="Add your new to do !">
                        <button type="submit" class="btn btn-dark btn-sm px-4"><i class="fas fa-plus"></i></button>
                    </div>
                </form>
                {{-- if task count --}}
                @if(count($toDoLists))
                <ul class="list-group list-group-flush mt-3">
                    @foreach ($toDoLists as $item)

                    <li class="list-group-item">
                        <form action="{{route('destroy', $item->id)}}" method="POST">
                            {{$item-> content}}
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-link btn-sm float-end"><i
                                    class="fas fa-trash"></i></button>
                        </form>
                    </li>

                    @endforeach
                </ul>
                @endif
            </div>
        </div>

    </div>
</body>

</html>