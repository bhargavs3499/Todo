<!DOCTYPE html>

<html>

    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>TODO APP</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>

        {{-- To Do App Delete-Icon from fontawesome --}}
        <script src="https://kit.fontawesome.com/619e2271f6.js" crossorigin="anonymous"></script>

        {{-- To Do App CSS --}}
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>

    <body>

        {{-- To Do App Header --}}
        <header>
            <b>TO DO APP</b>
        </header>

        <hr>

        {{-- To Do App Container --}}
        <div id="container">

            {{-- To Do App List Header --}}
            <div id="box1">
                <h2>__TODO LIST__</h2>
                <hr>

                {{-- To Do App List Records --}}
                <div>

                    @foreach($todos as $todo)
                        <div class="record">
                            <div>{{$todo->title}}</div>
                            <hr class="line">
                            <div class="line2">{{$todo->date}}</div>
                            <hr class="line">
                            <div class="line3">{{$todo->details}}</div>
                            <div class="line4">
                                <a id="edit" href="{{ route('todos.edit',['id'=>$todo->id])  }}" >Edit&emsp;&emsp;</a>
                                <a id="delete" href="{{ route('todos.delete',['id'=>$todo->id]) }}"><i class="fa-solid fa-trash-can"></i> remove</a>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

            {{-- To Do App --}}
            <div id="box2">

                {{-- To Do App Form Validation Alert --}}
                @if ($errors->any())
                    <div class="alert-box2">
                    <ul>
                         @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                         @endforeach
                    </ul>
                    </div>
                @endif

                {{-- To Do App Success Message Prompt --}}
                @if(Session::has('message'))
                    <div class="alert-box">
                        {{ Session::get('message') }}
                    </div>
                @endif

                {{-- To Do App Form --}}
                <form action="{{  route('todos.create')  }}" method="post" >
                    @csrf
                    <label >Title*</label><br>
                    <input type="text"  name="title" autocomplete="on"><br>
                    <label >Details*</label><br>
                    <textarea name="details" rows="12" cols="50" autocomplete="on"></textarea><br>
                    <label >Date*</label><br>
                    <input type="datetime" name="date"  placeholder="2019-02-20 08:03:47" autocomplete="on"><br>
                    <button type="submit">submit</button>
                </form>

            </div>

        </div>

        {{-- To Do App JS,JQuery --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="{{ asset('js/script.js') }}"></script>

    </body>

</html>
