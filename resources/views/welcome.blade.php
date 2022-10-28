<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="{{ '/css/app.css' }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>TO-DO</title>
</head>
<body>

<navbar class="row mynav">
    <img id="logo" src="./1560.png"  alt="logo" >
    <ul>
        <li ><a href="">Home</a></li>
        <li><a href="">My Tasks</a></li>
        <li><a href="">Contact us</a></li>

    </ul>
    <form class="col-lg-4 mx-auto" >
        <input class="col-9" id="searchbar" name="search" placeholder="Search">
        <button id="searchbtn" type="submit"><i class="fa fa-search"></i></button>
    </form>
</navbar>

<main>
<h3 class="mt-2 ml-4" >Welcome , continue what you started :</h3>
    <button class="btn btn-primary"><a href="{{route('tasks.create')}}">Add task</a></button>
<div class="tasks-container">

    <table  class=" table mytable">
        <thead>
        <tr>
            <th scope="col">Order</th>
            <th scope="col">title</th>
            <th scope="col">due date</th>
            <th scope="col">status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <th scope="row">{{$task->order}}</th>
                <td>{{$task->title}}</td>
                <td>{{$task->due_date}}</td>
                <td>{{$task->status}}</td>
                <td>
                    <button class="btn btn-secondary"><a href="{{route('tasks.edit' , $task->id)}}">Edit</a></button>
                </td>
                <td>
                   <form method="post" action="{{route('tasks.delete' , $task->id)}}" onsubmit="return confirm('are you sure?')">
                       @csrf
                       @method('DELETE')
                        <button class="btn btn-danger type="submit">delete</button>

                   </form>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>


</div>

</main>
<footer>

</footer>
</body>
<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex-1].style.display = "block";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>
</html>

