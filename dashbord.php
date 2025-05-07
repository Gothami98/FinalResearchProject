<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kids Learning Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .goals-status p span {
    color: #666;
    margin-left: 10px;
    font-size: 0.9em;
}


        .header-nav {
            background: linear-gradient(to right, #6a0dad, #9932cc);
            padding: 15px 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            color: white;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-logo {
            display: flex;
            align-items: center;
        }

        .header-logo h2 {
            margin: 0;
            font-size: 1.8rem;
            font-weight: bold;
            color: white;
        }

        .header-logo img {
            height: 40px;
            margin-right: 10px;
        }

        .header-menu {
            display: flex;
            align-items: center;
        }

        .header-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .header-menu ul li {
            margin: 0 10px;
        }

        .header-menu ul li a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
            display: flex;
            align-items: center;
            padding: 8px 15px;
            border-radius: 20px;
            transition: background-color 0.3s;
        }

        .header-menu ul li a:hover, .header-menu ul li a.active {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .header-menu ul li a i {
            margin-right: 8px;
        }

        .profile-section {
            display: flex;
            align-items: center;
        }

        .profile-pic {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            background-color: #FFD700;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 20px;
            cursor: pointer;
        }

        .profile-pic i {
            font-size: 20px;
            color: #6a0dad;
        }

        .upgrade-btn {
            background-color: #FFD700;
            color: #6a0dad;
            border: none;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: bold;
            margin-left: 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .upgrade-btn:hover {
            background-color: #f0c000;
        }

        .main-content {
            padding: 20px;
            max-height: 100vh; /* Set a maximum height */
            overflow-y: auto; 

        }

        .header {
            margin-bottom: 20px;
        }

        .header h2 {
            font-size: 2rem;
            color: #333;
        }

        .header p {
            font-size: 1rem;
            color: #666;
        }

        .goals-section {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        .goals-status {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            width: calc(50% - 20px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .goals-status:hover {
            transform: translateY(-5px);
        }

        .goals-status h3 {
            font-size: 1.2rem;
            color: #333;
        }

        .progress-bar {
            background: #e9ecef;
            border-radius: 5px;
            overflow: hidden;
            margin: 10px 0;
        }

        .progress-fill {
            background: #6a0dad;
            height: 10px;
            border-radius: 5px;
            transition: width 1s ease-in-out;
        }

        .goals-status p {
            font-size: 1rem;
            color: #666;
            margin-bottom: 0;
        }

        .progress-chart-section {
            margin-top: 40px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .progress-chart-section h3 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        .table-container {
            margin-top: 40px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .table-container h3 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        .table-container table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-container th, .table-container td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: left;
        }

        .table-container th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .table-container .btn {
            padding: 5px 10px;
            border-radius: 5px;
        }

        .table-container tr:hover {
            background-color: #f8f9fa;
        }

        .course-section {
            margin-top: 40px;
        }

        .course-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.3s;
        }

        .course-card:hover {
            transform: translateY(-5px);
        }

        .course-img {
            background-color: #6a0dad;
            width: 100%;
            height: 150px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .course-img i {
            font-size: 48px;
            color: #fff;
        }

        .course-card h4 {
            font-size: 1.5rem;
            color: #333;
            margin: 10px 0;
        }

        .course-card p {
            font-size: 1rem;
            color: #666;
        }

        .course-card button {
            margin-top: 10px;
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #6a0dad;
            border: none;
        }

        .course-card button:hover {
            background-color: #5a0b8e;
        }

        .right-sidebar {
            background: #fff;
            padding: 20px;
            border-left: 1px solid #e9ecef;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
            height: 100vh;
            overflow-y: auto; 
        }

        .search-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .search-bar input {
            width: 70%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .search-bar button {
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #6a0dad;
            border: none;
        }

        .search-bar button:hover {
            background-color: #5a0b8e;
        }

        .new-courses h3 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        .course-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .course-item {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            cursor: pointer;
        }

        .course-item:hover {
            transform: translateY(-3px);
            background-color: #f0f0f0;
        }

        .course-item-content {
            display: flex;
            align-items: center;
        }

        .course-item-img {
            width: 50px;
            height: 50px;
            border-radius: 5px;
            background-color: #6a0dad;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }

        .course-item-img i {
            font-size: 24px;
            color: #fff;
        }

        .course-item-text h4 {
            font-size: 1rem;
            color: #333;
            margin: 0 0 5px 0;
        }

        .course-item-text p {
            font-size: 0.9rem;
            color: #666;
            margin: 0;
        }

        .course-item-text .join-text {
            color: #6a0dad;
            font-weight: bold;
            margin-top: 5px;
        }

        .calendar-section {
            margin-top: 30px;
        }

        .calendar-section h3 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        .calendar {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .calendar-header h4 {
            margin: 0;
            font-size: 1.2rem;
        }

        .calendar-nav {
            display: flex;
            gap: 10px;
        }

        .calendar-nav button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
        }

        .calendar-days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
        }

        .calendar-day-name {
            text-align: center;
            font-weight: bold;
            font-size: 0.8rem;
            padding: 5px;
        }

        .calendar-day {
            text-align: center;
            padding: 5px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .calendar-day:hover {
            background-color: #e9ecef;
        }

        .calendar-day.active {
            background-color: #6a0dad;
            color: #fff;
        }

        .calendar-day.disabled {
            color: #adb5bd;
            cursor: default;
        }

        .calendar-day.has-event {
            border: 1px solid #6a0dad;
        }

        @media (max-width: 992px) {
            .goals-status {
                width: 100%;
            }
            
            .right-sidebar {
                height: auto;
            }
            
            .header-menu ul {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .header-content {
                flex-direction: column;
                gap: 15px;
            }
            
            .profile-section {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="header-nav">
                    <div class="header-content">
                        <div class="header-logo"><h2>
                        <i class="fa fa-book-reader me-3"></i> PathBloomers</h2>
                        </div>
                        <div class="header-menu">
                            <ul>
                                <li><a href="#" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                                <li><a href="#"><i class="fas fa-chart-line"></i> Progress</a></li>
                                <li><a href="#"><i class="fas fa-calendar-alt"></i> Calendar</a></li>
                                <li><a href="#"><i class="fas fa-hands-helping"></i> Support</a></li>
                                <li><a href="#"><i class="fas fa-comment-dots"></i> Feedback</a></li>
                            </ul>
                        </div>
                        <div class="profile-section">
                            <button class="upgrade-btn">Kasun Shamilka</button>
                            <div class="profile-pic">
                            <div class="profile-pic">
    <img src="images/image.png" alt="Profile Picture" style="width: 40px; height: 40px; border-radius: 50%;">
</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 main-content mx-auto mt-4">
                <div class="header">
                    <h2>Your Learning Journey</h2>
                    <p>Based on your preferences</p>
                </div>
                <div class="goals-section">
    <div class="goals-status">
        <h3>Initial Testing Score</h3>
        <div class="progress-bar">
            <div class="progress-fill" style="width: 60%;"></div>
        </div>
        <p>60% <span>(8/10)</span></p>
    </div>
    <div class="goals-status">
        <h3>Total Assigned Activity</h3>
        <div class="progress-bar">
            <div class="progress-fill" style="width: 75%;"></div>
        </div>
        <p>75% <span>(20)</span></p>
    </div>
    <div class="goals-status">
        <h3>Current Level</h3>
        <div class="progress-bar">
            <div class="progress-fill" style="width: 50%;"></div>
        </div>
        <p>50% <span>(8)</span></p>
    </div>
    <div class="goals-status">
        <h3>Total Remaining Activity</h3>
        <div class="progress-bar">
            <div class="progress-fill" style="width: 40%;"></div>
        </div>
        <p>40% <span>(16)</span></p>
    </div>
</div>

                <div class="progress-chart-section">
                    <h3>Skill Progress</h3>
                    <canvas id="skillProgressChart"></canvas>
                </div>
                <div class="table-container">
                    <h3>Summary of Activities</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Activity Code</th>
                                <th>Activity Name</th>
                                <th>Date</th>
                                <th>Spent Time</th>
                                <th>Performance</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ACT-001</td>
                                <td>Cognitive Exercise</td>
                                <td>01 Jan 2025</td>
                                <td>30 min</td>
                                <td>85%</td>
                                <td><span class="badge badge-success">Completed</span></td>
                                <td><button class="btn btn-primary">Detail</button></td>
                            </tr>
                            <tr>
                                <td>ACT-002</td>
                                <td>Auditory Training</td>
                                <td>02 Jan 2025</td>
                                <td>45 min</td>
                                <td>90%</td>
                                <td><span class="badge badge-success">Completed</span></td>
                                <td><button class="btn btn-primary">Detail</button></td>
                            </tr>
                            <tr>
                                <td>ACT-003</td>
                                <td>Visual Skills Practice</td>
                                <td>03 Jan 2025</td>
                                <td>20 min</td>
                                <td>78%</td>
                                <td><span class="badge badge-warning">In Progress</span></td>
                                <td><button class="btn btn-primary">Detail</button></td>
                            </tr>
                            <tr>
                                <td>ACT-004</td>
                                <td>Reading Comprehension</td>
                                <td>04 Jan 2025</td>
                                <td>60 min</td>
                                <td>88%</td>
                                <td><span class="badge badge-success">Completed</span></td>
                                <td><button class="btn btn-primary">Detail</button></td>
                            </tr>
                            <tr>
                                <td>ACT-005</td>
                                <td>Math Puzzles</td>
                                <td>05 Jan 2025</td>
                                <td>50 min</td>
                                <td>92%</td>
                                <td><span class="badge badge-success">Completed</span></td>
                                <td><button class="btn btn-primary">Detail</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="course-section">
                    <div class="course-card">
                        <div class="course-img">
                            <i class="fas fa-paint-brush"></i>
                        </div>
                        <h4>Fun Drawing Tips</h4>
                        <p>Learn how to create amazing drawings that will make your artwork stand out. This course covers essential tips and tricks to enhance your projects and case studies.</p>
                        <p><strong>121 kids enrolled so far!</strong></p>
                        <button class="btn btn-primary">Join Now!</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 right-sidebar">
                <div class="search-bar">
                    <input type="text" placeholder="Search for courses...">
                    <button class="btn btn-primary">Go</button>
                </div>
                <div class="new-courses">
                    <h3>New Courses</h3>
                    <div class="course-list">
                        <div class="course-item">
                            <div class="course-item-content">
                                <div class="course-item-img">
                                    <i class="fas fa-laptop-code"></i>
                                </div>
                                <div class="course-item-text">
                                    <h4>Master Figma</h4>
                                    <p>Learn Figma in 30 days</p>
                                    <p class="join-text">Join Now!</p>
                                </div>
                            </div>
                        </div>
                        <div class="course-item">
                            <div class="course-item-content">
                                <div class="course-item-img">
                                    <i class="fas fa-palette"></i>
                                </div>
                                <div class="course-item-text">
                                    <h4>UI With Mikey</h4>
                                    <p>Learn design basics in 30 days</p>
                                    <p class="join-text">Join Now!</p>
                                </div>
                            </div>
                        </div>
                        <div class="course-item">
                            <div class="course-item-content">
                                <div class="course-item-img">
                                    <i class="fas fa-book-reader"></i>
                                </div>
                                <div class="course-item-text">
                                    <h4>Reading Adventure</h4>
                                    <p>Improve reading skills with fun</p>
                                    <p class="join-text">Join Now!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calendar-section">
                    <h3>Calendar</h3>
                    <div class="calendar">
                        <div class="calendar-header">
                            <div class="calendar-nav">
                                <button id="prevMonth"><i class="fas fa-chevron-left"></i></button>
                            </div>
                            <h4 id="currentMonth">May 2025</h4>
                            <div class="calendar-nav">
                                <button id="nextMonth"><i class="fas fa-chevron-right"></i></button>
                            </div>
                        </div>
                        <div class="calendar-days" id="calendarDays">
                            <!-- Day names will be added by JS -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize interactive elements
            initializeCalendar();
            initializeChart();
            setupEventListeners();
        });

        function initializeChart() {
            const ctx = document.getElementById('skillProgressChart').getContext('2d');
            const skillProgressChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [
                        {
                            label: 'Cognitive Skill',
                            data: [300, 280, 250, 220, 240, 260, 280, 300, 290, 270, 260, 250],
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderWidth: 2,
                            fill: true,
                        },
                        {
                            label: 'Auditory',
                            data: [250, 260, 270, 280, 290, 300, 310, 320, 310, 300, 290, 280],
                            borderColor: 'rgba(255, 99, 132, 1)',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderWidth: 2,
                            fill: true,
                        },
                        {
                            label: 'Visual Skill',
                            data: [280, 290, 300, 310, 320, 330, 340, 350, 340, 330, 320, 310],
                            borderColor: 'rgba(153, 102, 255, 1)',
                            backgroundColor: 'rgba(153, 102, 255, 0.2)',
                            borderWidth: 2,
                            fill: true,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Progress Score'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Skill Progress Over Time'
                        }
                    }
                }
            });
        }

        function initializeCalendar() {
            const calendarDays = document.getElementById('calendarDays');
            const dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            
            // Add day names
            dayNames.forEach(day => {
                const dayNameElement = document.createElement('div');
                dayNameElement.className = 'calendar-day-name';
                dayNameElement.textContent = day;
                calendarDays.appendChild(dayNameElement);
            });
            
            // Current date
            const currentDate = new Date();
            const currentMonth = currentDate.getMonth();
            const currentYear = currentDate.getFullYear();
            
            // Set month display
            document.getElementById('currentMonth').textContent = new Date(currentYear, currentMonth).toLocaleString('default', { month: 'long', year: 'numeric' });
            
            // Generate days
            const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
            const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();
            
            // Add empty cells for days before the first day of the month
            for (let i = 0; i < firstDayOfMonth; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.className = 'calendar-day disabled';
                calendarDays.appendChild(emptyDay);
            }
            
            // Add days of the month
            for (let day = 1; day <= daysInMonth; day++) {
                const dayElement = document.createElement('div');
                dayElement.className = 'calendar-day';
                dayElement.textContent = day;
                
                // Mark today
                if (day === currentDate.getDate()) {
                    dayElement.classList.add('active');
                }
                
                // Mark days with events (example)
                if (day === 10 || day === 15 || day === 22) {
                    dayElement.classList.add('has-event');
                }
                
                dayElement.addEventListener('click', function() {
                    // Remove active class from all days
                    document.querySelectorAll('.calendar-day').forEach(d => {
                        d.classList.remove('active');
                    });
                    
                    // Add active class to clicked day
                    this.classList.add('active');
                });
                
                calendarDays.appendChild(dayElement);
            }
        }

        function setupEventListeners() {
            // Course card button
            document.querySelectorAll('.course-card button').forEach(button => {
                button.addEventListener('click', function() {
                    alert('Join button clicked! Enrolling in "Fun Drawing Tips" course.');
                });
            });
            
            // Course item click
            document.querySelectorAll('.course-item').forEach(item => {
                item.addEventListener('click', function() {
                    const courseName = this.querySelector('h4').textContent;
                    alert(`You selected the "${courseName}" course!`);
                });
            });
            
            // Detail buttons
            document.querySelectorAll('.table-container .btn').forEach(button => {
                button.addEventListener('click', function() {
                    const activityName = this.closest('tr').querySelector('td:nth-child(2)').textContent;
                    alert(`Viewing details for "${activityName}"`);
                });
            });
            
            // Search button
            document.querySelector('.search-bar button').addEventListener('click', function() {
                const searchTerm = document.querySelector('.search-bar input').value;
                if (searchTerm) {
                    alert(`Searching for "${searchTerm}" courses...`);
                } else {
                    alert('Please enter a search term');
                }
            });
            
            // Calendar navigation
            document.getElementById('prevMonth').addEventListener('click', function() {
                alert('Navigating to previous month');
            });
            
            document.getElementById('nextMonth').addEventListener('click', function() {
                alert('Navigating to next month');
            });
            
            // Upgrade button
            document.querySelector('.upgrade-btn').addEventListener('click', function() {
                alert('Redirecting to upgrade page...');
            });
            
            // Header menu
            document.querySelectorAll('.header-menu ul li a').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all links
                    document.querySelectorAll('.header-menu ul li a').forEach(l => {
                        l.classList.remove('active');
                    });
                    
                    // Add active class to clicked link
                    this.classList.add('active');
                    
                    const page = this.textContent.trim();
                    alert(`Navigating to ${page} page`);
                });
            });
            
            // Profile pic click
            document.querySelector('.profile-pic').addEventListener('click', function() {
                alert('Opening profile menu');
            });
        }
    </script>
</body>
</html>