<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Advanced Syllabus</title>
    <style>
        body {
            font-family: 'Baloo 2', cursive;
            background: linear-gradient(135deg, #e3fcec 0%, #c8f7c5 50%, #b8f2c0 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }
/*         
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: 
                radial-gradient(circle at 20% 20%, rgba(76, 175, 80, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(139, 195, 74, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 60%, rgba(102, 187, 106, 0.05) 0%, transparent 50%);
            animation: float 20s ease-in-out infinite;
            z-index: -1;
        } */
        
        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(30px, -30px) rotate(120deg); }
            66% { transform: translate(-20px, 20px) rotate(240deg); }
        }
        
        .container {
            max-width: 700px;
            margin: 40px auto;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            box-shadow: 
                0 20px 40px rgba(0,0,0,0.1),
                0 0 0 1px rgba(255, 255, 255, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
            padding: 50px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #4caf50, #8bc34a, #cddc39, #4caf50);
            background-size: 200% 100%;
            animation: shimmer 3s ease-in-out infinite;
        }
        
        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }
        
        h1 {
            background: linear-gradient(135deg, #4caf50, #8bc34a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 25px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
            animation: glow 2s ease-in-out infinite alternate;
        }
        
        @keyframes glow {
            from { filter: drop-shadow(0 0 5px rgba(76, 175, 80, 0.3)); }
            to { filter: drop-shadow(0 0 15px rgba(76, 175, 80, 0.5)); }
        }
        
        ul {
            text-align: left;
            /* margin: 0 auto 40px auto; */
            display: inline-block;
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.05), rgba(139, 195, 74, 0.05));
            padding: 30px;
            border-radius: 20px;
            border: 1px solid rgba(76, 175, 80, 0.1);
        }
        
        li {
            font-size: 1.3rem;
            margin-bottom: 15px;
            color: #2e7d32;
            position: relative;
            padding-left: 30px;
            transition: all 0.3s ease;
        }
        
        li::before {
            content: '✨';
            position: absolute;
            left: 0;
            top: 0;
            font-size: 1.2rem;
            animation: sparkle 2s ease-in-out infinite;
        }
        
        li:hover {
            transform: translateX(10px);
            color: #1b5e20;
        }
        
        @keyframes sparkle {
            0%, 100% { transform: scale(1) rotate(0deg); }
            50% { transform: scale(1.2) rotate(180deg); }
        }
        
        .note {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 40px;
            font-style: italic;
            opacity: 0.8;
        }
        
        .continue-btn {
            background: linear-gradient(135deg, #4caf50 0%, #8bc34a 50%, #4caf50 100%);
            color: white;
            border: none;
            padding: 18px 40px;
            font-size: 1.3rem;
            font-family: 'Baloo 2', cursive;
            font-weight: bold;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 
                0 8px 25px rgba(76, 175, 80, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-transform: uppercase;
            letter-spacing: 2px;
            position: relative;
            overflow: hidden;
            background-size: 200% 100%;
        }
        
        .continue-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }
        
        .continue-btn:hover {
            background-position: 100% 0;
            transform: translateY(-3px) scale(1.05);
            box-shadow: 
                0 15px 35px rgba(76, 175, 80, 0.5),
                0 0 0 1px rgba(255, 255, 255, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.4);
        }
        
        .continue-btn:hover::before {
            left: 100%;
        }
        
        .continue-btn:active {
            transform: translateY(-1px) scale(1.02);
            box-shadow: 
                0 8px 20px rgba(76, 175, 80, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Advanced Syllabus</h1>
    <p>Congratulations on your great score! Here are your advanced activities:</p>
    <ul>
        <li>Creative drawing and coloring challenges</li>
        <li>Story creation and comprehension</li>
        <li>Advanced matching and memory games</li>
        <li>Math puzzles and logic games</li>
        <li>Science experiments and fun facts</li>
    </ul>
    <p class="note">Keep up the great work and explore new challenges!</p>
    <button class="continue-btn" onclick="window.location.href='../pre-maths/lessons/level8.php'">Get Start</button>
</div>
</body>
</html>