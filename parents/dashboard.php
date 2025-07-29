<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Parent Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../style/dashboard.css">
</head>
<body>
  <div class="container-fluid">
    <div class="row">

      <!-- Sidebar -->
      <nav class="col-md-2 sidebar shadow">
        <div class="text-center mb-4">
          <img src="https://via.placeholder.com/80" class="rounded-circle mb-2 border border-light" alt="Warden">
          <h5>Warden Panel</h5>
          <small>Hostel Management</small>
        </div>
        <a href="#" class="active"> Dashboard</a>
        <a href="#"> Pending Requests</a>
        <a href="#"> Approved Requests</a>
        <a href="#"> Rejected Requests</a>
        <a href="#"> Notifications</a>
        <a href="#"> Settings</a>
        <a href="#"> Logout</a>
      </nav>

      <!-- Main Content -->
      <main class="col-md-10 content">
        <h2 class="mb-4 text-primary">Warden Outpass Dashboard</h2>

        <!-- Dashboard Cards -->
        <div class="row g-4">
          <div class="col-md-4">
            <div class="card p-3 shadow">
              <div class="d-flex align-items-center">
                <div class="me-3 card-icon">⏳</div>
                <div>
                  <h4>12</h4>
                  <p class="mb-0 text-muted">Pending Requests</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card p-3 shadow">
              <div class="d-flex align-items-center">
                <div class="me-3 card-icon">✅</div>
                <div>
                  <h4>8</h4>
                  <p class="mb-0 text-muted">Approved Today</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card p-3 shadow">
              <div class="d-flex align-items-center">
                <div class="me-3 card-icon">📊</div>
                <div>
                  <h4>150</h4>
                  <p class="mb-0 text-muted">Total Requests</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Outpass Request Table -->
        <div class="card mt-4 shadow">
          <div class="card-header">
            Pending Outpass Requests
          </div>
          <div class="card-body table-responsive">
            <table class="table table-hover align-middle">
              <thead class="table-light">
                <tr>
                  <th>Student Name</th>
                  <th>Roll No</th>
                  <th>Reason</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Amit Kumar</td>
                  <td>12018456</td>
                  <td>Family Emergency</td>
                  <td>19 July 2025</td>
                  <td><span class="status-pending">Pending</span></td>
                  <td>
                    <button class="btn btn-success btn-sm">Approve</button>
                    <button class="btn btn-danger btn-sm">Reject</button>
                  </td>
                </tr>
                <tr>
                  <td>Neha Sharma</td>
                  <td>12018460</td>
                  <td>Medical Appointment</td>
                  <td>19 July 2025</td>
                  <td><span class="status-pending">Pending</span></td>
                  <td>
                    <button class="btn btn-success btn-sm">Approve</button>
                    <button class="btn btn-danger btn-sm">Reject</button>
                  </td>
                </tr>
                <tr>
                  <td>Rahul Singh</td>
                  <td>12018470</td>
                  <td>Competition</td>
                  <td>20 July 2025</td>
                  <td><span class="status-pending">Pending</span></td>
                  <td>
                    <button class="btn btn-success btn-sm">Approve</button>
                    <button class="btn btn-danger btn-sm">Reject</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Notifications -->
        <div class="row mt-4">
          <div class="col-md-6">
            <div class="card shadow">
              <div class="card-header">Recent Actions</div>
              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">✅ Approved outpass for Priya Verma</li>
                  <li class="list-group-item">❌ Rejected outpass for Rohan Mehta</li>
                  <li class="list-group-item">✅ Approved outpass for Anjali Gupta</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card shadow">
              <div class="card-header">Notifications</div>
              <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">📢 Hostel meeting scheduled for 22 July 2025</li>
                  <li class="list-group-item">⚠️ Multiple students requested same-day outpass</li>
                  <li class="list-group-item">✅ Weekly report generated</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
