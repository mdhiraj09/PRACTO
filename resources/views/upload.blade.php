<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous"
/>

<script>
    function checkCredentials() {
        var username = prompt("Paasword");

        
        if (username === "7900106616") {
           
            document.getElementById('main-content').style.display = 'block';
        } else {
            alert("Access denied. Incorrect username or password.");
            window.location.reload();
        }
    }
    window.onload = checkCredentials;
</script>
<style>
    /* Initially hide the main content */
    #main-content {
        display: none;
    }
</style>
</head>
<body id="main-content">
    <center>
        <a href="{{url("/")}}"><p style="display:inline-block;">Home</p></a>
    <form action="/upload" method="POST" enctype="multipart/form-data">
        @csrf
     

      
        <table>
            <tr>
                <td><label for="title">Title:</label></td>
            <td><input type="text" name="title" required></td>
            </tr>
            <tr>
                <div class="mb-3">
                <td>    <label for="f" class="form-label">Choose file</label></td>
            <td>  <input
                type="file"
                class="form-control"
                name="file"
                id="f"
                aria-describedby="fileHelpId"
            /></td>
            </tr>
        </div>
            <td></td>
            <td>     <button type="submit" class="btn btn-success">Upload</button></td>
        </table>
</form>



  


</center>

    <div class="container">
        <h4>Uploaded File</h4>
        <div
            class="table-responsive"
        >
            <table
                class="table table-primary"
            >    
                              <thead>
                        <tr>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notes as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $item->file_path) }}" class="btn btn-primary" download>Download</a>
                                <form action="{{ route('notes.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this file?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            
        </div>
    
    </div>

</body>
</html>