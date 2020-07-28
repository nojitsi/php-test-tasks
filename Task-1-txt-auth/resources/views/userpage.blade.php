<!DOCTYPE html>
<html>
    <head>
        <style>
            .logout-btn {
                background-color: dodgerblue;
                border: 1px solid #636b6f;
                color: white;
                border-radius: 2px;
            }
            .logout-link {
                color: white;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        Hi, {{$username}}
        <a class="logout-link" href="/logout">
            <button class="logout-btn">
                Log out
            </button>
        </a>
    </body>
</html>

