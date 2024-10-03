<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Logs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #ffffff;
            border-right: 1px solid #dee2e6;
            padding-top: 20px;
        }
        .log-viewer {
            padding: 20px;
        }
        .file-list {
            max-height: 80vh;
            overflow-y: auto;
        }
        .file-list .file-item {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #dee2e6;
        }
        .file-item:hover {
            background-color: #f8f9fa;
        }
        .log-content {
            background-color: #343a40;
            color: white;
            padding: 20px;
            height: 80vh;
            overflow-y: auto;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar">
                <h4>Log files on Local</h4>
                <div class="file-list">
                    <!-- Example log files, replace with dynamic content -->
                    <div class="file-item">laravel.log (82.78 KB)</div>
                </div>
            </div>
            
            <!-- Log Viewer -->
            <div class="col-md-9 log-viewer">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Log Viewer</h4>
                    <!-- <input type="search" class="form-control w-25" placeholder="Search all files"> -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                    <button id="clearLogsBtn" class="btn btn-danger">Clear Logs</button>
                </div>

                </div>
                <div class="log-content">
                    <pre>{{ $logContent }}</pre>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('clearLogsBtn').addEventListener('click', function() {
     if (confirm('Are you sure you want to clear the logs?')) {
        fetch("{{ route('clear.logs') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                document.querySelector('.log-content pre').innerText = ''; // Clear the log content on the page
            } else {
                alert('Failed to clear logs: ' + data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    }
});
</script>


</body>
</html>
