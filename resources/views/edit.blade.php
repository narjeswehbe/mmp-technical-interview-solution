

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
    <img id="logo" src="{{'/1560.png'}}"  alt="logo" >
    <ul>
        <li ><a href="">Home</a></li>
        <li><a href="">My Tasks</a></li>
        <li><a href="">Contact us</a></li>

    </ul>

</navbar>

<main>
<div class="form-container">
    <h3 class="form-title">Edit your task:</h3>
    <form   method="post" action="{{route('tasks.update' , $task->id)}}" >
        @csrf
        @method('PUT')

        <input type="hidden" value="{{$task->id}}">
        <div class="input-group">
            <input   class="from-element" name="title" placeholder="Task title" value="{{$task->title}}">
            @error('title')
            <p class="bg-danger">{{$message}}</p>
            @enderror
        </div>
        <div    class="input-group">
            <input  class="from-element" name="description" placeholder="Task description" value="{{$task->description}}"/>
            @error('description')
            <p class="bg-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="input-group">
            <input   class="from-element" name="order" placeholder="Task order" type="number" value="{{$task->order}}">
            @error('order')
            <p class="bg-danger">{{$message}}</p>
            @enderror
        </div>
        <p class="form-title" >Due date/Time:</p>
        <div class="input-group">
            <input   class="from-element" name="due_date"  type="datetime-local" value="{{$task->due_date}}">
            @error('due_date')
            <p class="bg-danger">{{$message}}</p>
            @enderror
        </div>
        <select name="status" class="from-element">
            @if($task->status=='complete')
                <option selected value="complete">complete</option>
            @else
                <option value="complete">complete</option>
            @endif
            @if($task->status=='incomplete')
                <option selected value="incomplete">incomplete</option>
            @else
                <option value="incomplete">incomplete</option>
            @endif

        </select>
        @error('status')
        <p class="bg-danger">{{$message}}</p>
        @enderror

      <button  type="submit" class="btn btn-primary">Save</button>
    </form>
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




