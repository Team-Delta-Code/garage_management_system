<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USHAN Motors - Today Sales</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: system-ui, -apple-system, sans-serif;
        }

        body {
            display: flex;
            background-color: #E6E9F5;
        }

        .sidebar {
            width: 200px;
            background-color: #1a237e;
            min-height: 100vh;
            padding: 20px;
            color: white;
        }

        .logo {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            padding: 12px;
            margin: 8px 0;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .nav-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .nav-item img {
            width: 20px;
            margin-right: 10px;
            filter: invert(1);
        }

        .main-content {
            flex: 1;
            padding: 20px;
        }

        .breadcrumb {
            margin-bottom: 20px;
            color: #666;
        }

        .breadcrumb a {
            color: #1a237e;
            text-decoration: none;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 20px;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        .stat-title {
            color: #666;
            margin-bottom: 10px;
        }

        .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: #1a237e;
            margin-bottom: 5px;
        }

        .stat-change {
            color: #4CAF50;
            font-size: 14px;
        }

        .transactions-section {
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        .transactions-title {
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            color: #666;
            font-weight: normal;
            padding: 10px;
        }

        td {
            padding: 10px;
            border-top: 1px solid #eee;
        }

        .status {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 14px;
        }

        .completed {
            background: #E8F5E9;
            color: #4CAF50;
        }

        .pending {
            background: #FFF3E0;
            color: #FF9800;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            background: #1a237e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
        }

        .add-button {
            background: #E3F2FD;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            color: #1a237e;
            font-size: 24px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">USHAN Motors</div>
        <div class="nav-item">
            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxyZWN0IHg9IjMiIHk9IjMiIHdpZHRoPSIxOCIgaGVpZ2h0PSIxOCIgcng9IjIiIHJ5PSIyIj48L3JlY3Q+PHJlY3QgeD0iNyIgeT0iNyIgd2lkdGg9IjMiIGhlaWdodD0iOSI+PC9yZWN0PjxyZWN0IHg9IjE0IiB5PSI3IiB3aWR0aD0iMyIgaGVpZ2h0PSI1Ij48L3JlY3Q+PC9zdmc+" alt="Dashboard">
            Dashboard
        </div>
        <div class="nav-item">
            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxsaW5lIHgxPSIxOCIgeTE9IjIwIiB4Mj0iMTgiIHkyPSIxMCI+PC9saW5lPjxsaW5lIHgxPSIxMiIgeTE9IjIwIiB4Mj0iMTIiIHkyPSI0Ij48L2xpbmU+PGxpbmUgeDE9IjYiIHkxPSIyMCIgeDI9IjYiIHkyPSIxNCI+PC9saW5lPjwvc3ZnPg==" alt="Monthly Sales">
            Monthly Sales
        </div>
        <div class="nav-item">
            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwYXRoIGQ9Ik00IDEzLjVWNGEyIDIgMCAwIDEgMi0yaDguNUw0IDEzLjV6Ij48L3BhdGg+PHBvbHlsaW5lIHBvaW50cz0iMTQgMiAxNCAxMyAyIDEzIj48L3BvbHlsaW5lPjwvc3ZnPg==" alt="Vehicle to Repair">
            Vehicle to Repair
        </div>
        <div class="nav-item">
            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwYXRoIGQ9Ik0xOCA4QTYgNiAwIDAgMCA2IDhjMCA3LTMgOSAzIDkgNiAwIDMtMiAzLTIiPjwvcGF0aD48cGF0aCBkPSJNMTggOGE2IDYgMCAwIDAgLTYgLTYiPjwvcGF0aD48L3N2Zz4=" alt="Reminders">
            Reminders
        </div>
        <div class="nav-item">
            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxjaXJjbGUgY3g9IjEyIiBjeT0iMTIiIHI9IjMiPjwvY2lyY2xlPjxwYXRoIGQ9Ik0xOS40IDE1YTEuNjUgMS42NSAwIDAgMCAuMzMgMS44MmwuMDYuMDZhMiAyIDAgMCAxIDAgMi44MyAyIDIgMCAwIDEtMi44MyAwbC0uMDYtLjA2YTEuNjUgMS42NSAwIDAgMC0xLjgyLS4zMyAxLjY1IDEuNjUgMCAwIDAtMSAxLjUxVjIxYTIgMiAwIDAgMS0yIDJoLTJhMiAyIDAgMCAxLTItMnYtLjA5QTEuNjUgMS42NSAwIDAgMCA5IDIwLjQiPjwvcGF0aD48L3N2Zz4=" alt="Mechanics">
            Mechanics
        </div>
        <div class="nav-item">
            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxyZWN0IHg9IjMiIHk9IjQiIHdpZHRoPSIxOCIgaGVpZ2h0PSIxOCIgcng9IjIiIHJ5PSIyIj48L3JlY3Q+PGxpbmUgeDE9IjE2IiB5MT0iMiIgeDI9IjE2IiB5Mj0iNiI+PC9saW5lPjxsaW5lIHgxPSI4IiB5MT0iMiIgeDI9IjgiIHkyPSI2Ij48L2xpbmU+PGxpbmUgeDE9IjMiIHkxPSIxMCIgeDI9IjIxIiB5Mj0iMTAiPjwvbGluZT48L3N2Zz4=" alt="Appointment">
            Appointment
        </div>
    </div>

    <div class="main-content">
        <div class="breadcrumb">
            <a href="#">Home</a> > <a href="#">Sales</a> > Today Sales
            <div class="user-profile">
                <div class="user-avatar">SF</div>
                <span>Shank Fury</span>
            </div>
        </div>

        <div class="page-header">
            <h1>Today Sales</h1>
            <button class="add-button">+</button>
        </div>

        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-title">Total Sales</div>
                <div class="stat-value">$12,450</div>
                <div class="stat-change">+13% vs yesterday</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Transactions</div>
                <div class="stat-value">28</div>
                <div class="stat-change">+5 from yesterday</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Average Sale</div>
                <div class="stat-value">$444.64</div>
                <div class="stat-change">+8% vs yesterday</div>
            </div>
        </div>

        <div class="transactions-section">
            <h2 class="transactions-title">Recent Transactions</h2>
            <table>
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Service</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>14:30</td>
                        <td>Oil Change + Brake Check</td>
                        <td>John Smith</td>
                        <td>$180.00</td>
                        <td><span class="status completed">Completed</span></td>
                    </tr>
                    <tr>
                        <td>13:15</td>
                        <td>Engine Tune-up</td>
                        <td>Sarah Johnson</td>
                        <td>$350.00</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>11:45</td>
                        <td>Tire Replacement</td>
                        <td>Mike Brown</td>
                        <td>$420.00</td>
                        <td><span class="status completed">Completed</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>