<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script>
        function checkCredentials() {
            var username = prompt("Enter your username:");

            
            if (username === "admin") {
               
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
        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
</head>
<body class="bg-dark"  id="main-content">
   
    <div class="container">
        <p style="color :white; display:inline-block;">Mall Pani &nbsp</p>
        <a href="{{url("/adminadding")}}"><p style="color :white;display:inline-block;">Admin</p></a>
        
        <div
            class="table-responsive"
        >
            <table
                class="table table-warning"
            >
                <thead>
                    <tr>
                        <th >Title</th>
                        <th >Download</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notes as $item)
                    <tr >
                        <td scope="">{{ $item->title }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $item->file_path) }}" class="btn btn-primary" download>Download</a>
                        </td>
                    </tr>
                @endforeach
                
                </tbody>
            </table>
        </div>
    
    </div>

    <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"
></script>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"
></script>
</body>
</html>


