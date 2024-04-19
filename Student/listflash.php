<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!--<link rel="stylesheet" href="../admin/css/dashboard.css"> -->
    <link rel="stylesheet" href="./css/listflash.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
   
<?php include 'dropdown2.php'; ?>   
    <button onclick="goBack()">Go to Dashboard</button>
    <div class="content">
    <h1>The Flash Card List That Created By You</h1>

    <table id="myTable">
        <thead>
          <tr>
            <th>Topic</th>
            <th>Created Date</th>
            <th>Created Time</th>
            <th>Other Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Science</td>
            <td>2024-01-02</td>
            <td>12:08 PM</td>
            <td>
              <button onclick="shareAgain()">Share Again</button>
              <button onclick="deleteEntry()">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>

    </div>

    <script>
        function goBack() {
                window.history.back();
            }
    
        
                    function shareAgain() {
        alert("Share action triggered!");
        // Add your code for share action here
        }

        function deleteEntry() {
        alert("Delete action triggered!");
        // Add your code for delete action here
        }

    </script>

    </body>
</html>